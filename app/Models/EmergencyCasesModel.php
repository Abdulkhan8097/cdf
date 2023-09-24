<?php namespace App\Models;

use CodeIgniter\Model;

class EmergencyCasesModel extends Model{
    
     protected $table = 'cases';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id', 'image_name', 'reach',  'goal','title', 'description', 'details_description', 'cases_name','status'];

  

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
        
        
      $sql .= " ORDER BY ad.".$this->primaryKey." DESC"; 

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
    // {
      
    //    $this->join('essentials_category ', 'essentials_category.category_id = essentials.category_id', 'LEFT');
    // $this->join('admin', 'admin.id = essentials.user_id', 'LEFT');
    // $this->select('essentials_category.*');
    // $this->select('essentials.*');
    // $this->select('admin.id,fname,admin_type');
    // $this->where('essentials.ess_id ',$id);
    // $result = $this->get()->getRowArray();
    // return $result;  
    // }
    public function getDataWebsite($searchArray=array(), $offset='', $limit='',$coutOnly='')
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
