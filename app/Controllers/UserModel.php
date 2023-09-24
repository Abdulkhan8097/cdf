<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    
     protected $table = 'users';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','admin_id','name','email','phone','country','state','city','pin_code','citizenship','address','pan_no','date_of_birth','create_at','donation_amount','status','payment_status','txnid','posted_hash','unmappedstatus','error_Message','payment_source','addedon','bank_ref_num','bankcode','PG_TYPE','field1','field2','field3','field4','field5','field6','field7','field8','field9','mode','pdf_status','cases_id','payment_type','payment_mode','receipt_type','donation_id','receipt_no','recieptno_count','support_for_cause','create_by'];

    
    function checkUserLogin($username,$password){

        $txtreturn = false;

        $objResult =  $this->asObject()
                            ->where(['phone' => $username])
                            ->first();
            if($objResult) {
                       
            $dbPassword = $objResult->password;
            
            if(password_verify($password,$dbPassword))
            {
                $userSession = array(
                    'user_id' => $objResult->id,
                    'email'   => $objResult->email,
                    'name'   => $objResult->fname,
                    'phone'   => $objResult->phone,
                    'address'   => $objResult->address,
                    'isUserLoggedIn'   => TRUE
                );

                if($objResult->user_status)
                { 
                    $session = session();
                    $session->set($userSession);
                    $txtreturn = 1;
                }
                else
                {
                    $txtreturn =2; // user exist but his account not active
                }
                
            }
            
        }

            return $txtreturn;
    }

	public function getData($searchArray=array(), $offset='', $limit='',$coutOnly='',$showquery='')
    {
        if($coutOnly)
        {
            $sql = "SELECT COUNT(ad.$this->primaryKey) as total_count FROM $this->table AS ad ";
        }
        else
        {
            $sql = "SELECT ad.*,R.fname,R.lname FROM $this->table AS ad ";
        }
         $sql .= " LEFT JOIN admin as R ON (ad.admin_id = R.id) ";
     
        
        $sql .= " ";
        $sql .= " WHERE 1 ";
        
        if(isset($searchArray['id']) && $searchArray['id'])
        {
            $sql .= " AND ad.id = '".$searchArray['id']."' ";
           
        }
       
        if(isset($searchArray['txtsearch']) && $searchArray['txtsearch'])
        {
            $sql .= " AND (ad.phone LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " OR ad.email LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " OR ad.donation_id LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " OR ad.name LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " OR ad.receipt_no LIKE '".$searchArray['txtsearch']."%' )";
        }
       
        
        if(isset($searchArray['user_status']))
        {
            $sql .= " AND ad.user_status = '".$searchArray['user_status']."' ";
        }
        if(isset($searchArray['payment_status']))
        {
            $sql .= " AND ad.payment_status = '".$searchArray['payment_status']."' ";
        }
        if(isset($searchArray['receipt_type']))
        {
            $sql .= " AND ad.create_by = '".$searchArray['receipt_type']."' ";
        }

        if(isset($searchArray['admin_id']))
        {
            $sql .= " AND ad.admin_id = '".$searchArray['admin_id']."' ";
        }
         if(isset($searchArray['branch_data']))
        {
            $sql .= " AND ad.admin_id = '".$searchArray['branch_data']."' ";
        }

        

        if(isset($searchArray['start_date']) && isset($searchArray['end_date']))
        {
            $sql .= " AND ( DATE_FORMAT(ad.create_at, '%Y-%m-%d') >= '".$searchArray['start_date']."' ";
            $sql .= " AND DATE_FORMAT(ad.create_at, '%Y-%m-%d') <= '".$searchArray['end_date']."' ) ";
           
        }
        if(isset($searchArray['order_by']) && isset($searchArray['order_by']))
        {
            $sql .= " ORDER BY ad.".$searchArray['order_by']; 
        }
        else{
            $sql .= " ORDER BY ad.".$this->primaryKey." DESC"; 
        }

        if($limit)
        {
            $sql .= " LIMIT $offset,$limit";
        }
        if($showquery)
        {
            echo $sql;
        }
       
        $query = $this->db->query($sql);
        $result = $query->getResult();
        
        if($coutOnly)
        {
            return $result[0]->total_count;
        }

        return $result;
    }

    public function getUserdetail($id)
    {
        $arrResult =  $this->asArray()
                    ->where(['id' => $id])
                    ->first();

        return $arrResult;
    }


    function UserLoginApi($username,$password)
    {

        $txtreturn = false;

        $objResult =  $this->asObject()
                            ->where(['phone' => $username])
                            ->first();

        if($objResult) {
                   
            $dbPassword = $objResult->password;
            
            if(password_verify($password,$dbPassword))
            {
                $userSession = array(
                    'user_id' => $objResult->id,
                    'email'   => $objResult->email,
                    'name'   => $objResult->fname,
                   
                    'isUserLoggedIn'   => TRUE
                );
                                    
                $session = session();
                $session->set($userSession);
            
                $txtreturn = array(
                    'id' => $objResult->id,
                   
                );
            }
            
        }

        return $txtreturn;
    }

    public function checkEmailExist($username)
    {
        $arrResult =  $this->asArray()
                    ->where(['phone' => $username])
                    ->countAllResults();

        return $arrResult;
    }

    public function updateStatus($id,$data){
        return $this->db
                        ->table('users')
                        ->where(['id' => $id])
                        ->set($data)
                        ->update();
    }
     public function updatePdfStatus($id ,$dataPdf){
        return $this->db
                        ->table('users')
                        ->where(['id' => $id])
                        ->set($dataPdf)
                        ->update();
    }

    /**
     * function for generate donation id
     */
    public function getNewDonationId()
    {
        $lastDonationEntry = 21909670;
        $donationStart = date("Ymd");
        $donationId =0;
       $objUserDetail  = $this->where('donation_id !=', '')->where('donation_id IS NOT NULL')->orderBy('id', 'desc')->limit(1)->first();
      
       if($objUserDetail) {
        $lastDonationNumber = $objUserDetail['donation_id'];
        $lastDonationEntry = substr($lastDonationNumber,8);
       }
        $nextDonationEntry = $lastDonationEntry +1;
        $donationId = $donationStart ."0".$nextDonationEntry;
      
      
      return $donationId;
      
    }

    public function getNewRecieptNo()
    {
        $lastRecieptEntry = '81314';
        $recieptNo =0;
       $objUserDetail  = $this->orderBy('recieptno_count', 'desc')->limit(1)->first();
       $query = $this->getLastQuery();
     
     $lastRecieptNumber = '';
    // $string = '';
       if($objUserDetail) {
     //   $string = "last id - ". $objUserDetail['id']." name- ".$objUserDetail['name']." donation_id- ".$objUserDetail['donation_id']." last recipet no -".$objUserDetail['recieptno_count'];
        $lastRecieptNumber = $objUserDetail['recieptno_count'];
        $lastRecieptEntry = $lastRecieptNumber;
       }
        $nextRecieptEntry = $lastRecieptEntry +1;
        $recieptNo = $nextRecieptEntry;

        // $stringData = $string." -- new number - ".$nextRecieptEntry;
      
        // $this->writeinFile($stringData);
        
      return $recieptNo;
      
    }

    public function writeinFile($stringData='')
    {
        if($stringData) {
        $fh = fopen(PUBLIC_PATH.'query.txt', 'a');
        $stringData = "\n\n".date('d-m-y H:i')." - ".$stringData;
        fwrite($fh, $stringData);
       fclose($fh);
        }

    }

 


}

?>
