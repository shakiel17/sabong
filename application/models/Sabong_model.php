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
        public function save_deposit(){
            $refno="DRN".date('YmdHis');
            $id=$this->session->customer_id;
            $amount=$this->input->post('amount');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("INSERT INTO cash_in(`refno`,`customer_id`,`amount`,`datearray`,`timearray`) VALUES('$refno','$id','$amount','$date','$time')");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getDepositHistory($id){
            $result=$this->db->query("SELECT * FROM cash_in WHERE customer_id='$id' ORDER BY datearray DESC, timearray DESC");
            return $result->result_array();
        }

        public function getCustomerAccount($id){
            $result=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$id'");
            return $result->row_array();
        }

        public function admin_authenticate($username,$password){
            $result=$this->db->query("SELECT * FROM admin WHERE username='$username' AND `password`='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }

        public function getAllDepositRequest(){
            $result=$this->db->query("SELECT ci.*,c.fullname FROM cash_in ci INNER JOIN customer c ON c.customer_id=ci.customer_id WHERE ci.`status`='pending' ORDER BY ci.datearray ASC, ci.timearray ASC");
            return $result->result_array();
        }

        public function approve_deposit($refno){
            $querydep=$this->db->query("SELECT * FROM cash_in WHERE refno='$refno'");
            $item=$querydep->row_array();
            $queryacc=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$item[customer_id]'");
            $row=$queryacc->row_array();

            $dept_amount=$item['amount'];
            $prev_amount=$row['amount'];

            $new_amount=$dept_amount+$prev_amount;
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("UPDATE customer_account SET amount='$new_amount' WHERE customer_id='$item[customer_id]'");
            if($result){
                $this->db->query("UPDATE cash_in SET `status`='approved',date_received='$date',time_received='$time' WHERE refno='$refno'");
                return true;
            }else{
                return false;
            }
        }

        public function cancel_deposit($refno){
            $result=$this->db->query("UPDATE cash_in SET `status`='cancelled' WHERE refno='$refno'");
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function save_withdraw(){
            $refno="DRN".date('YmdHis');
            $id=$this->session->customer_id;
            $balance=$this->input->post('avail_balance');
            $amount=$this->input->post('amount');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            if($balance >= $amount){
                $result=$this->db->query("INSERT INTO cash_out(`refno`,`customer_id`,`amount`,`datearray`,`timearray`) VALUES('$refno','$id','$amount','$date','$time')");
            }else{
                return false;
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function approve_withdrawal($refno){            
            $querydep=$this->db->query("SELECT * FROM cash_out WHERE refno='$refno'");
            $item=$querydep->row_array();
            $queryacc=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$item[customer_id]'");
            $row=$queryacc->row_array();

            $dept_amount=$item['amount'];
            $prev_amount=$row['amount'];

            $new_amount=$prev_amount-$dept_amount;

            $result=$this->db->query("UPDATE customer_account SET amount='$new_amount' WHERE customer_id='$item[customer_id]'");
            if($result){
                $this->db->query("UPDATE cash_out SET `status`='approved' WHERE refno='$refno'");
                return true;
            }else{
                return false;
            }
        }

        public function cancel_withdrawal($refno){
            $result=$this->db->query("UPDATE cash_out SET `status`='cancelled' WHERE refno='$refno'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getWithdrawalHistory($id){
            $result=$this->db->query("SELECT * FROM cash_out WHERE customer_id='$id' ORDER BY datearray DESC, timearray DESC");
            return $result->result_array();
        }

        public function getAllWithdrawalRequest(){
            $result=$this->db->query("SELECT ci.*,c.fullname FROM cash_out ci INNER JOIN customer c ON c.customer_id=ci.customer_id WHERE ci.`status`='pending' ORDER BY ci.datearray ASC, ci.timearray ASC");
            return $result->result_array();
        }
        public function fetchCustomerAccount($id){
            $result=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$id'");
            return $result->result_array();
        }

        public function fetchDepositRequest(){
            $result=$this->db->query("SELECT COUNT(ci.customer_id) as totalcount FROM cash_in ci WHERE ci.`status`='pending' ORDER BY ci.datearray ASC, ci.timearray ASC");
            return $result->result_array();
        }

        public function fetchWithdrawRequest(){
            $result=$this->db->query("SELECT COUNT(ci.customer_id) as totalcount FROM cash_out ci WHERE ci.`status`='pending' ORDER BY ci.datearray ASC, ci.timearray ASC");
            return $result->result_array();
        }
    }
?>