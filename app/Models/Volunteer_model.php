<?php namespace App\Models;

use CodeIgniter\Model;

class Volunteer_model extends Model{
    
     protected $table = 'volunteer';
     protected $primaryKey = 'volunteer_id';
     protected $allowedFields = ['volunteer_id', 'volunteer_name', 'volunteer_email','mob_number', 'volunteer_gender', 'volunteer_address', 'v_pincode', 'v_city', 'volunteer_message', 'doc_upload', 'v_created'];

    

    public function getData($searchArray=array(), $offset='', $limit='',$coutOnly='')
    {
        if($coutOnly)
        {
            $sql = "SELECT COUNT(ad.$this->primaryKey) as total_count FROM $this->table AS ad ";
        }
        else
        {
            $sql = "SELECT ad.* FROM $this->table AS ad ";
        }
        $sql .= " ";
        $sql .= " WHERE 1 ";
        
        if(isset($searchArray['txtsearch']) && $searchArray['txtsearch'])
        {
            $sql .= " AND ( ad.volunteer_name LIKE '%".$searchArray['txtsearch']."%'  ";
            $sql .= " OR ad.mob_number LIKE '%".$searchArray['txtsearch']."%' ) ";
        }
         if(isset($searchArray['cases_name']) && $searchArray['cases_name'])
        {
            $sql .= " AND ( ad.cases_name LIKE '%".$searchArray['cases_name']."%' ) ";
        }
        
        if(isset($searchArray['id']) && $searchArray['id'])
        {
            $sql .= " AND  ad.volunteer_id =".$searchArray['id'];
        }
        
        

         // $sql .= " AND ad.cat_status=1";
       
      $sql .= " ORDER BY ad.$this->primaryKey DESC"; 

        if($limit)
        {
            $sql .= " LIMIT $offset,$limit";
        }
//   echo $sql;die;
        $query = $this->db->query($sql);
        $result = $query->getResult();
        
        if($coutOnly)
        {
            return  $result[0]->total_count;
        }

        return $result;
    }
    // public function listData()



}

?>
