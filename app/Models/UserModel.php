<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    
     protected $table = 'donation_details';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','donation_id','admin_id','name','email','phone','citizenship','recieptno_count','address','pan_no','date_of_birth','create_at','donation_amount','payment_status','txnid','posted_hash','unmappedstatus','error_Message','payment_source','addedon','bank_ref_num','bankcode','PG_TYPE','field1','field2','field3','field4','field5','field6','field7','field8','field9','mode','cases_id','payment_type','payment_mode','receipt_type','donation_id','receipt_no','create_by'];

    
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

    public function getData($searchArray = array(), $offset = '', $limit = '', $countOnly = '', $showQuery = '')
    {
        if ($countOnly) {
            $sql = "SELECT COUNT(ad.$this->primaryKey) as total_count FROM $this->table AS ad ";
        } else {
            $sql = "SELECT ad.*, R.name as createname FROM $this->table AS ad ";
        }
        $sql .= "LEFT JOIN login as R ON (ad.admin_id = R.id) ";
        $sql .= " ";
        $sql .= "WHERE 1 ";
    
        if (isset($searchArray['id']) && $searchArray['id']) {
            $sql .= "AND ad.id = '" . $searchArray['id'] . "' ";
        }
    
        if (isset($searchArray['txtsearch']) && $searchArray['txtsearch']) {
            $searchTerm = $this->db->escapeLikeString($searchArray['txtsearch']);
            $sql .= "AND (ad.phone LIKE '%$searchTerm%' ";
            $sql .= "OR ad.email LIKE '%$searchTerm%' ";
            $sql .= "OR ad.donation_id LIKE '%$searchTerm%' ";
            $sql .= "OR ad.name LIKE '%$searchTerm%' ";
            $sql .= "OR ad.receipt_no LIKE '%$searchTerm%') ";
        }
    
        if (isset($searchArray['payment_status'])) {
            $sql .= "AND ad.payment_status = '" . $searchArray['payment_status'] . "' ";
        }
        if (isset($searchArray['receipt_type'])) {
            $sql .= "AND ad.receipt_type = '" . $searchArray['receipt_type'] . "' ";
        }
    
        if (isset($searchArray['admin_id'])) {
            $sql .= "AND ad.admin_id = '" . $searchArray['admin_id'] . "' ";
        }

    
        if (isset($searchArray['start_date']) && isset($searchArray['end_date'])) {
            $sql .= "AND (DATE_FORMAT(ad.create_at, '%Y-%m-%d') >= '" . $searchArray['start_date'] . "' ";
            $sql .= "AND DATE_FORMAT(ad.create_at, '%Y-%m-%d') <= '" . $searchArray['end_date'] . "') ";
        }
    
        if (isset($searchArray['order_by'])) {
            $sql .= "ORDER BY ad." . $searchArray['order_by'];
        } else {
            $sql .= "ORDER BY ad." . $this->primaryKey . " DESC";
        }
        if ($countOnly) {
        $sql .= ";";
        }
        if ($limit) {
            $sql .= " LIMIT $offset, $limit";
        }
        if ($showQuery) {
            echo $sql;
        }
    
        $query = $this->db->query($sql);
        $result = $query->getResult();
    
        if ($countOnly) {
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



    public function checkEmailExist($username)
    {
        $arrResult =  $this->asArray()
                    ->where(['phone' => $username])
                    ->countAllResults();

        return $arrResult;
    }

    public function updateStatus($id,$data){
        return $this->db
                        ->table('donation_details')
                        ->where(['id' => $id])
                        ->set($data)
                        ->update();
    }
     public function updatePdfStatus($id ,$dataPdf){
        return $this->db
                        ->table('donation_details')
                        ->where(['id' => $id])
                        ->set($dataPdf)
                        ->update();
    }

    /**
     * function for generate donation id
     */
    public function getNewDonationId()
    {
        $lastDonationEntry = 0000;
        $donationStart = date("Ymd");
        $donationId =0;
       $objUserDetail  = $this->where('donation_id !=', '')->where('donation_id IS NOT NULL')->orderBy('id', 'desc')->limit(1)->first();
      
       if($objUserDetail) {
        $lastDonationNumber = $objUserDetail['donation_id'];
        $lastDonationEntry = substr($lastDonationNumber,8);
       }
        $nextDonationEntry = $lastDonationEntry +1;
        $donationId = $donationStart ."0".$nextDonationEntry;
        // print_r($donationId);exit;
      
      
      return $donationId;
      
    }

    public function getNewRecieptNo()
    {
        $lastRecieptEntry = '0000';
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
