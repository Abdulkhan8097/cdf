<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model{
    
     protected $table = 'login';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','created_by', 'name', 'email', 'phone', 'password', 'status','loginType','uniqueKey','temp_password'];

	// public function savedata($arrSaveData){

    //     $this->save($arrSaveData);
        
    //     return $this->getInsertID();
    // }

    function checkAdminLogin($username,$password){

		$txtreturn = false;

        $objResult =  $this->asObject()
	                        ->where(['email' => $username])
	                        ->first();

			if($objResult) {
                       
			$dbPassword = $objResult->password;
			
            if(password_verify($password,$dbPassword))
				{
                    if($objResult->status)
                    {
                        $adminSession = array(
                            'id' => $objResult->id,
                            'email'   => $objResult->email,
                            'name'   => $objResult->name,
                            'type'   => $objResult->loginType,
                            'isAdminLoggedIn' 	=> TRUE,
                            'adminLoggedIn'   => TRUE,
                        );
                                            
                    $session = session();
                    $session->set($adminSession);
                    
                        $txtreturn = 1;
                    }
                    else
                    {
                        $txtreturn = 2;
                    }
				}
				
			}

			return $txtreturn;
		}

    public function getData($searchArray=array(), $offset='', $limit='',$coutOnly='')
   {
        if($coutOnly)
        {
            $sql = "SELECT COUNT($this->primaryKey) as total_count FROM $this->table AS ad ";
        }
        else
        {
            $sql = "SELECT ad.* FROM $this->table AS ad ";
        }
        $sql .= " ";
        $sql .= " WHERE 1 ";
        if(isset($searchArray['txtsearch']) && $searchArray['txtsearch'])
        {
            $sql .= " AND ( ad.email LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " OR ad.phone LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " OR ad.name LIKE '".$searchArray['txtsearch']."%' )";
        }
        if(isset($searchArray['user_type']) && $searchArray['user_type'])
        {
         $sql .= " AND  ad.loginType = '".$searchArray['user_type']."' ";
        }
        


        $sql .= " AND  ad.loginType != 'admin' ";

       $sql .= " ORDER BY ".$this->primaryKey." DESC";
       

        if($limit)
        {
            $sql .= " LIMIT $offset,$limit";
        }

       // echo  $sql;

        $query = $this->db->query($sql);
        $result = $query->getResult();
        
        if($coutOnly)
        {
            return $result[0]->total_count;
        }

        return $result;
    }

    public function getSubAdmindetail($id)
    {
        $arrResult =  $this->asArray()
                    ->where(['id' => $id])
                    ->first();

        return $arrResult;
    }

    public function getchilds($userid)
    {

            $sql = "SELECT ad.id FROM $this->table AS ad ";
            
            $sql .= " ";
            $sql .= " WHERE 1 ";
           
            $sql .= " AND  ad.created_by =".$userid;
            $sql .= " AND  ad.admin_type = 'salesexecutive' ";

            $query = $this->db->query($sql);
            $result = $query->getResult('array');
        return  $result ;
    }




}

?>
