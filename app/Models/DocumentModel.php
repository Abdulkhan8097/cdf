<?php namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model{
    
     protected $table = 'cases_docs';
     protected $primaryKey = 'doc_id';
     protected $allowedFields = ['doc_id', 'doc_name', 'doc_image', 'cases_id'];

    

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
            $sql .= " AND ( ad.cat_name LIKE '%".$searchArray['txtsearch']."%' ) ";
        }
        
        if(isset($searchArray['id']) && $searchArray['id'])
        {
            $sql .= " AND  ad.cases_id =".$searchArray['id'];
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

}

?>
