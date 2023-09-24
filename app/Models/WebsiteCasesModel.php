<?php namespace App\Models;

use CodeIgniter\Model;

class WebsiteCasesModel extends Model{
    
     protected $table = 'cases';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id', 'image_name', 'reach', 'goal','title', 'description', 'details_description', 'cases_name'];

    
// EMREGENCY CASES
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
         if(isset($searchArray['cases_name']) && $searchArray['cases_name'])
        {
            $sql .= " AND ( ad.cases_name LIKE '%".$searchArray['cases_name']."%' ) ";
        }
        
        if(isset($searchArray['id']) && $searchArray['id'])
        {
            $sql .= " AND  ad.id =".$searchArray['id'];
        }
        
        

          $sql .= " AND ad.cases_name= '1'";
          $sql .= " AND ad.status= '1'";
       
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
    // SUCCSSESS CASES
        public function getDataSuccessfull($searchArray=array(), $offset='', $limit='',$coutOnly='')
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
         if(isset($searchArray['cases_name']) && $searchArray['cases_name'])
        {
            $sql .= " AND ( ad.cases_name LIKE '%".$searchArray['cases_name']."%' ) ";
        }
        
        if(isset($searchArray['id']) && $searchArray['id'])
        {
            $sql .= " AND  ad.id =".$searchArray['id'];
        }
        
        

          $sql .= " AND ad.cases_name= '2'";
          $sql .= " AND ad.status= '1'";
       
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
    public function listData($id)
    {
      
      
    $this->join('cases_docs', 'cases_docs.cases_id = cases.id', 'LEFT');
    $this->select('cases_docs.*');
    $this->select('cases.id');
    $this->where('cases.id ',$id);
    $result = $this->get()->getResult();
    return $result;  
    }



}

?>
