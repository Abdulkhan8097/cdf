<?php namespace App\Models;

use CodeIgniter\Model;

class MenucategoryModel extends Model{
    
     protected $table = 'menu_category';
     protected $primaryKey = 'cat_id';
     protected $allowedFields = ['cat_id', 'cat_parentid','cat_name', 'cat_url','cat_topbanner', 'cat_pagename','cat_status','cat_showinmenu','cat_keywords','cat_description','cat_content','cat_topbgcolor','cat_type','cat_pagecontent','cat_created','sequence_no'];

    

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
            $sql .= " AND  ad.cat_id =".$searchArray['id'];
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

         $sql .= " AND ad.cat_status=1";
       
       $sql .= " ORDER BY ad.$this->primaryKey"; 

        if($limit)
        {
            $sql .= " LIMIT $offset,$limit";
        }
//   echo $sql;die;
        $query = $this->db->query($sql);
        $result = $query->getResultArray();
        
        if($coutOnly)
        {
            return  $result[0]['total_count'];
        }

        return $result;
    }


}

?>
