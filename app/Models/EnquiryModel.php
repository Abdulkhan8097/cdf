<?php namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model{
    
     protected $table = 'enquiry';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id', 'name', 'phone', 'email', 'description', 'created'];

    

	public function getData($searchArray=array(), $offset='', $limit='',$coutOnly='')
    {
        if($coutOnly)
        {
            $sql = "SELECT COUNT(ad.$this->primaryKey) as total_count FROM $this->table AS ad ";
        }
        else
        {
            $sql = "SELECT ad.*  FROM $this->table AS ad ";
        }


        $sql .= " ";
        $sql .= " WHERE 1 ";
           if(isset($searchArray['id']) && $searchArray['id'])
        {
            
            $sql .= " AND ad.id = '".$searchArray['id']."' ";
           
        }

        if(isset($searchArray['txtsearch']) && $searchArray['txtsearch'])
        {
            $sql .= " AND ( ad.name LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " OR ad.phone LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " OR ad.email LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " ) ";
        }

        $sql .= " ORDER BY ad.".$this->primaryKey." DESC"; 

        if($limit)
        {
            $sql .= " LIMIT $offset,$limit";
        }
    //echo $sql;die;
        $query = $this->db->query($sql);
        $result = $query->getResult();
        
        if($coutOnly)
        {
            return $result[0]->total_count;
        }

        return $result;
    }


}

?>
