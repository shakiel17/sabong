<?php
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url('main'));
            }
            $this->load->view('pages/'.$page);            
        }
        
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function authenticate(){ 
            $username=$this->input->post('username');
            $password=$this->input->post('password');           
            $data=$this->Sabong_model->authenticate($username,$password);
            if($data){
                $userdata=array(
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'user_login' => true
                );

                $this->session->set_userdata($userdata);
                redirect(base_url('main'));
            }else{
                $this->session->set_flashdata('error','Invalid username and password!');
                redirect(base_url());
            }
        }
        
        public function registration(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $save=$this->Sabong_model->registration();
            if($save){
                $data=$this->Sabong_model->authenticate($username,$password);
                if($data){
                    $userdata=array(
                        'username' => $username,
                        'fullname' => $data['fullname'],
                        'user_login' => true
                    );

                    $this->session->set_userdata($userdata);
                    redirect(base_url('main'));
                }else{
                    $this->session->set_flashdata('error','Invalid username and password!');
                    redirect(base_url());
                }
            }else{
                $this->session->set_flashdata('error','Unable to save registration!');
                redirect(base_url());
            }
        }

        public function logout(){
            $userdata=array('username','fullname','user_login');
            $this->session->unset_userdata($userdata);
            $this->session->set_flashdata('success','You successfully logged out!');
            redirect(base_url());
        }
    }
?>
