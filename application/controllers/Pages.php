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
                    'customer_id' => $data['customer_id'],
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
                    'customer_id' => $data['customer_id'],
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
            $userdata=array('customer_id','username','fullname','user_login');
            $this->session->unset_userdata($userdata);
            $this->session->set_flashdata('success','You successfully logged out!');
            redirect(base_url());
        }

        public function deposit(){
            $page = "deposit";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $data['title'] = 'Deposit';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function deposit_history(){
            $page = "deposit_history";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $data['items'] = $this->Sabong_model->getDepositHistory($this->session->customer_id);
            $data['title'] = 'Deposit Records';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_deposit(){
            $deposit=$this->Sabong_model->save_deposit();
            if($deposit){
                $this->session->set_flashdata('success','Deposit request successfully submitted!');
            }else{
                $this->session->set_flashdata('failed','Unable to submit deposit request!');
            }
                redirect(base_url('deposit'));                
        }
        public function withdraw(){
            $page = "withdraw";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }            
            $data['title'] = 'Withdrawal';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function withdraw_history(){
            $page = "withdraw_history";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $data['items'] = $this->Sabong_model->getWithdrawalHistory($this->session->customer_id);
            $data['title'] = 'Withdrawal Records';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_withdraw(){
            $deposit=$this->Sabong_model->save_withdraw();
            if($deposit){
                $this->session->set_flashdata('success','Withdrawal request successfully submitted!');
            }else{
                $this->session->set_flashdata('failed','Unable to submit withdrawal request!');
            }
                redirect(base_url('withdraw'));                
        }
        public function fetch_user_account(){
            $id=$this->input->post('id');
            $data=$this->Sabong_model->fetchCustomerAccount($id);
            echo json_encode($data);
        }
        public function fetchDepositRequest(){            
            $data=$this->Sabong_model->fetchDepositRequest();
            echo json_encode($data);
        }
        public function fetchWithdrawRequest(){            
            $data=$this->Sabong_model->fetchWithdrawRequest();
            echo json_encode($data);
        }
        //=====================================Admin Module==========================================
        public function admin(){
             $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                redirect(base_url('adminmain'));
            }
            $this->load->view('pages/admin/'.$page); 
        }
        public function adminmain(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function admin_authenticate(){ 
            $username=$this->input->post('username');
            $password=$this->input->post('password');           
            $data=$this->Sabong_model->admin_authenticate($username,$password);
            if($data){
                $userdata=array(                    
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'admin_login' => true
                );

                $this->session->set_userdata($userdata);
                redirect(base_url('adminmain'));
            }else{
                $this->session->set_flashdata('error','Invalid username and password!');
                redirect(base_url('admin'));
            }
        }
        public function admin_logout(){
            $userdata=array('username','fullname','admin_login');
            $this->session->unset_userdata($userdata);            
            redirect(base_url('admin'));
        }
        public function manage_deposit(){
            $page = "manage_deposit";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "Deposit Manager";
            $data['items'] = $this->Sabong_model->getAllDepositRequest();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function approve_deposit($refno){
            $approve=$this->Sabong_model->approve_deposit($refno);
            if($approve){
                $this->session->set_flashdata('success','Deposit request successfully approved!');
            }else{
                $this->session->set_flashdata('failed','Deposit request cannot be approved!');
            }
            redirect(base_url('manage_deposit'));
        }
        public function cancel_deposit($refno){
            $approve=$this->Sabong_model->cancel_deposit($refno);
            if($approve){
                $this->session->set_flashdata('success','Deposit request successfully cancelled!');
            }else{
                $this->session->set_flashdata('failed','Deposit request cannot be cancelled!');
            }
            redirect(base_url('manage_deposit'));
        }
        public function manage_withdrawal(){
            $page = "manage_withdrawal";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "Withdrawal Manager";
            $data['items'] = $this->Sabong_model->getAllWithdrawalRequest();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function approve_withdrawal($refno){
            $approve=$this->Sabong_model->approve_withdrawal($refno);
            if($approve){
                $this->session->set_flashdata('success','Withdrawal request successfully approved!');
            }else{
                $this->session->set_flashdata('failed','Withdrawal request cannot be approved!');
            }
            redirect(base_url('manage_withdrawal'));
        }
        public function cancel_withdrawal($refno){
            $approve=$this->Sabong_model->cancel_withdrawal($refno);
            if($approve){
                $this->session->set_flashdata('success','Withdrawal request successfully cancelled!');
            }else{
                $this->session->set_flashdata('failed','Withdrawal request cannot be cancelled!');
            }
            redirect(base_url('manage_withdrawal'));
        }
        //=====================================Admin Module==========================================
    }
?>
