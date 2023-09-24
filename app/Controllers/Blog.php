<?php
namespace App\Controllers;
// use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\BlogModel;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;

class Blog extends BaseController {

	
    protected $session;
    protected  $isAdminLoggedIn;
    protected $adminModel;

    public function __construct()
    {
        $this->session = session();
     
        $this->BlogModel = new BlogModel();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
       

    }
    

    public function index()
	{

        if(!$this->isAdminLoggedIn)
	    {  
	           return redirect()->to(site_url('admin'));
        }  
            
        set_title('Blog | ' . SITE_NAME);    
        
        $data = array();
        
        set_title('Blog | ' . SITE_NAME);
        
        $data['pagetitle'] = "Blog List";
        $data['action'] = "viewblog";
        $txtsearch = $this->request->getGet('txtsearch');
       
        $searchArray = array();
        if ($txtsearch) {
            $searchArray['txtsearch']=$txtsearch;
        }
        $paginationnew = new Paginationnew();
        $page = $this->request->getGet('page');
        // $cases_name = $this->request->getGet('cases_name');
        //  if ($cases_name) {
        //     $searchArray['cases_name'] = $cases_name;
        // }
        $page = $page ? $page : 1;
        $Limit = PER_PAGE_RECORD;
        $totalRecord = $this->BlogModel->getData($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
        $data['txtsearch'] = $txtsearch;
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data["settingData"] = $this->BlogModel->getData($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;
        // print_r($data["settingData"]);exit;


        $this->template->render('admintemplate', 'contents', 'admin/Blog/list', $data);
				
    }
    
    
     public function addBlog() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        $id=$this->request->getGet('id');

        if($id){
            set_title('Update | ' . SITE_NAME);
        $data['pagetitle'] = "Update Blog";
        $data['edit'] = $this->BlogModel->find($id);
        // print_r($data['edit']);EXIT;


        // $certificates_image=new certificates_image();
         // $data['doc_imag'] = $this->certificates_image->getfiledata($id);

        
       

        $this->template->render('admintemplate', 'contents', 'admin/Blog/add', $data);

        }else{
        set_title('Banner | ' . SITE_NAME);
        $data['pagetitle'] = "Add Blog";
        $this->template->render('admintemplate', 'contents', 'admin/Blog/add', $data);
       }
    }
    
    public function save()
   {
        $data = array();   
        $postdata = $this->request->getPost();


        $id=$postdata['id'];


        $uploadedfile = $this->request->getFiles('image');
        $extc = '';
       
        if(count($postdata))
        {
       
            $newfilenameName ='';

             if(isset($uploadedfile['image']) && $uploadedfile['image'])
             { 
                 if($uploadedfile['image']->getName())
                 {
                         $orderFolderpath = PUBLIC_PATH.'Blog/';

                         if (!is_dir($orderFolderpath)) {
                             mkdir($orderFolderpath, 0777);
                             chmod($orderFolderpath, 0777);
                         }

                     $fileObject = $uploadedfile['image'];

                     $newfilenameName = $fileObject->getName();
                     $extc     = $fileObject->guessExtension();


                       if (!$fileObject->isValid())
                       {
                         $response['error'] =$file->getErrorString().'-'.$file->getError();
                       }
                       else{
                         $fileObject->move($orderFolderpath, $newfilenameName);
                         $newfilenameName = $fileObject->getName();
                       }
                 }

             }

             $menudata = array(
                 "title"=>$postdata['title'],
                 "description"=>$postdata['description'], 
                 "status"=>$postdata['status'],
                 "author_name"=>$postdata['author_name'],
             );
             // print_r($menudata);exit;



             // if banner uploaded then add / replace it
             if($newfilenameName)
             {
                 $menudata['image'] = $newfilenameName;

             }
                if(intval($id)>0)
				{

					    $this->BlogModel->set($menudata)->where('id',$id)->update();
					    $this->session->setFlashdata('message', 'Updated  successfully..');
	               
	                  return redirect()->to(site_url('viewblog'));
                }
	          else
				{
                            
					 $this->BlogModel->save($menudata);
                     $this->session->setFlashdata('message', 'Added  successfully.');
                      return redirect()->to(site_url('viewblog'));
				}	

            
        }
        else
        {
             $this->session->setFlashdata('errmessage', 'Not Added.');
        }

         return redirect()->to(site_url('viewblog'));
           
    }
    public function delete()
    {
        $data = array();     
       

         $id = $this->request->getGet('id');

            if($id)
            {
                $arrSearch['id']=$id;
                   $BlogModel=new BlogModel();
              $settingdata = $BlogModel->getData($arrSearch);
             $settingdata = isset($settingdata[0]) ? $settingdata[0] : array();


              if($settingdata)
              {
               
                      $orderFolderpath = PUBLIC_PATH.'Blog/'.$settingdata->image;
        	           @unlink($orderFolderpath);
              

                }
                $this->BlogModel->where("id",$id)->delete();
                $this->session->setFlashdata('message', 'Deleted  successfully.');

              }

            else
            {
                $this->session->setFlashdata('errmessage', 'Opps some error.');
            }
            
             return redirect()->to(site_url('viewblog'));
           
    }
     public function previewBlog() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        // $session = session();

        $id = $this->request->getGet("id");


        if (!$id) {
            $this->session->setFlashdata('errmessage', 'User ID number doesnot exist! Please try again.');

            return redirect()->to(site_url('adminusers'));
        }
        set_title('View | ' . SITE_NAME);

        $data = array();

        $BlogModel = new BlogModel();
        $data['userdetails'] = $BlogModel->find($id);
        $this->template->render('admintemplate', 'contents', 'admin/Blog/view', $data);
    }


    public function website()
    {

      
            
        set_title('Blog | ' . SITE_NAME);    
        
        $data = array();
        
        set_title('Blog | ' . SITE_NAME);
        
        $data['pagetitle'] = "Blog List";
        $data['action'] = "blogs";

        $searchArray = array();
        $paginationnew = new Paginationnew();
        $page = $this->request->getGet('page');
     
        $page = $page ? $page : 1;
        $Limit = 20;
        $totalRecord = $this->BlogModel->getDataWebsite($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
       
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data["bloglist"] = $this->BlogModel->getDataWebsite($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;
        // print_r($data["settingData"]);exit;


        $this->template->render('websitetemplate', 'contents', 'website/blogs', $data);
                
    }

     public function blogDetails() {
       
        $id=$this->request->getGet('id');

        if($id){

        $data['list'] = $this->BlogModel->where('id',$id)->first();
        // print_r($data['list']);exit;
  
        $this->template->render('websitetemplate', 'contents', 'website/blog_details', $data);

        }
    }
    

     

}
