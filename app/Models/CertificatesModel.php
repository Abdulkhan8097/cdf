<?php namespace App\Models;

use CodeIgniter\Model;

class CertificatesModel extends Model{
    
     protected $table = 'certificates';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id', 'certificates_name', 'cover_image', 'c_thumbnail', 'pdf_file'];

    

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
            $sql .= " AND ( ad.certificates_name LIKE '%".$searchArray['txtsearch']."%' ) ";
        }
        
        if(isset($searchArray['id']) && $searchArray['id'])
        {
            $sql .= " AND  ad.cat_id =".$searchArray['id'];
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
    public function get_user($id) {
        return $this->db
                        ->table('certificates')
                        ->where(["id" => $id])
                        ->get()
                        ->getRowArray();
    }

    //website
    public function getDataWebsite($searchArray=array(), $offset='', $limit='',$coutOnly='')
    {
        if($coutOnly)
        {
            $sql = "SELECT COUNT(ad.$this->primaryKey) as total_count FROM $this->table AS ad ";
        }
        else
        {
            $sql = "SELECT ad.certificates_name,ad.cover_image,ad.pdf_file,A.certificates_image FROM $this->table AS ad ";
        }

        $sql .= " LEFT JOIN certificates_image as A ON (ad.id = A.certificates_id) ";
        $sql .= " ";
        $sql .= " WHERE 1 ";
       
        if(isset($searchArray['txtsearch']) && $searchArray['txtsearch'])
        {
            $sql .= " AND ( ad.cat_name LIKE '%".$searchArray['txtsearch']."%' ) ";
        }
        
        if(isset($searchArray['id']) && $searchArray['id'])
        {
            $sql .= " AND  ad.cat_id =".$searchArray['id'];
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
