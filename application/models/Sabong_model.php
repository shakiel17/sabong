 <?php   
    date_default_timezone_set('Asia/Manila');
    class Sabong_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function authenticate($username,$password){
            $result=$this->db->query("SELECT * FROM customer WHERE username='$username' AND `password`='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }

        public function registration(){
            $fullname=$this->input->post('fullname');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $customerid=date('YmdHis');
            $check=$this->db->query("SELECT * FROM customer WHERE username='$username'");
            if($check->num_rows()>0){
                return false;
            }else{
                $result=$this->db->query("INSERT INTO customer(customer_id,fullname,username,`password`) VALUES('$customerid','$fullname','$username','$password')");
                if($result){
                    $this->db->query("INSERT INTO customer_account(customer_id,amount) VALUES('$customerid','0')");
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
?>