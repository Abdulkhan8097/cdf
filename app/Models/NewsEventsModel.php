<?php namespace App\Models;

use CodeIgniter\Model;

class NewsEventsModel extends Model{
    
     protected $table = 'newsevents';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id', 'title', 'events_image', 'event_date', 'description', 'detail_title', 'detail_description', 'topic', 'category', 'host', 'location', 'address'];

    

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
            $sql .= " AND ( ad.title LIKE '%".$searchArray['txtsearch']."%' ) ";
        }
        
        if(isset($searchArray['id']) && $searchArray['id'])
        {
            $sql .= " AND  ad.id =".$searchArray['id'];
        }
        
        if(isset($searchArray['cat_url']) && $searchArray['cat_url'])
        {
             $sql .= " AND  ad.cat_url='".$searchArray['cat_url']."'";
        }
        
        if(isset($searchArray['cat_showinmenu']))
        {
             $sql .= " AND  ad.cat_showinmenu=".$searchArray['cat_showinmenu'];
        }
        
        if(isset($searchArray['parentid']) && ($searchArray['parentid']==0 || $searchArray['parentid']))
        {
             $sql .= " AND  ad.cat_parentid=".$searchArray['parentid'];
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
    public function get_user($id) {
        return $this->db
                        ->table('certificates')
                        ->where(["id" => $id])
                        ->get()
                        ->getRowArray();
    }
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


}

?>
