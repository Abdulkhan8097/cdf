<?php namespace App\Models;

use CodeIgniter\Model;

class URL_model extends Model{
    
     protected $table = 'gen_url';
     protected $primaryKey = 'url_id';
     protected $allowedFields = ['url_id', 'file_name', 'name'];

    

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
            $sql .= " AND ( ad.name LIKE '%".$searchArray['txtsearch']."%' ) ";
        }
         if(isset($searchArray['cases_name']) && $searchArray['cases_name'])
        {
            $sql .= " AND ( ad.cases_name LIKE '%".$searchArray['cases_name']."%' ) ";
        }
        
        if(isset($searchArray['url_id']) && $searchArray['url_id'])
        {
            $sql .= " AND  ad.url_id =".$searchArray['url_id'];
        }
        
        

         // $sql .= " AND ad.cat_status=1";
       
      $sql .= " ORDER BY ad.$this->primaryKey"; 

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
