<?php
namespace App\Controllers;
// use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\EmergencyCasesModel;
use App\Models\DocumentModel;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;

class EmergencyCases extends BaseController {

	
    protected $session;
    protected  $isAdminLoggedIn;
    protected $adminModel;

    public function __construct()
    {
        $this->session = session();
     
        $this->EmergencyCasesModel = new EmergencyCasesModel();
        $this->DocumentModel = new DocumentModel();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
       

    }
    

    public function index()
	{

        if(!$this->isAdminLoggedIn)
	    {  
	           return redirect()->to(site_url('admin'));
        }  
            
        set_title('Cases | ' . SITE_NAME);    
        
        $data = array();
        
        set_title('Cases | ' . SITE_NAME);
        
        $data['pagetitle'] = "Cases List";
        $data['action'] = "viewemergencycases";
        $txtsearch = $this->request->getGet('txtsearch');
       
        $searchArray = array();
        $paginationnew = new Paginationnew();
        $page = $this->request->getGet('page');
        $cases_name = $this->request->getGet('cases_name');
         if ($cases_name) {
            $searchArray['cases_name'] = $cases_name;
        }
        $status = $this->request->getGet('status');
        if ($status) {
           $searchArray['status'] = $status;
       }
        $page = $page ? $page : 1;
        $Limit = PER_PAGE_RECORD;
        $totalRecord = $this->EmergencyCasesModel->getData($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
        $data['txtsearch'] = $txtsearch;
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data["settingData"] = $this->EmergencyCasesModel->getData($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;
        // print_r($data["settingData"]);exit;


        $this->template->render('admintemplate', 'contents', 'admin/EmergencyCases/list', $data);
				
    }
    
    
     public function addCases() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        $id=$this->request->getGet('id');

        if($id){
            set_title('Update | ' . SITE_NAME);
        $data['pagetitle'] = "Update Cases";
        $data['edit'] = $this->EmergencyCasesModel->find($id);

        $this->template->render('admintemplate', 'contents', 'admin/EmergencyCases/add', $data);

        }else{
        set_title('Add Cases | ' . SITE_NAME);
        $data['pagetitle'] = "Add Cases";
        $this->template->render('admintemplate', 'contents', 'admin/EmergencyCases/add', $data);
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
                         $orderFolderpath = PUBLIC_PATH.'Cases/';

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
                 "status"=>$postdata['status'],
                 "reach"=>$postdata['reach'], 
                 "goal"=>$postdata['goal'], 
                 "description"=>$postdata['description'], 
                 "details_description"=>$postdata['details_description'], 
                 "cases_name"=>$postdata['cases_name'], 

             );
             // print_r($menudata);exit;



             // if banner uploaded then add / replace it
             if($newfilenameName)
             {
                 $menudata['image_name'] = $newfilenameName;

             }
                if(intval($id)>0)
				{

					    $this->EmergencyCasesModel->set($menudata)->where('id',$id)->update();
					    $this->session->setFlashdata('message', 'Updated  successfully..');
	               
	                  return redirect()->to(site_url('viewemergencycases'));
                }
	          else
				{
                            
					 $this->EmergencyCasesModel->save($menudata);
                     $this->session->setFlashdata('message', 'Added  successfully.');
                      return redirect()->to(site_url('viewemergencycases'));
				}	

            
        }
        else
        {
             $this->session->setFlashdata('errmessage', 'Not Added.');
        }

         return redirect()->to(site_url('viewemergencycases'));
           
    }
    public function delete()
    {
        $data = array();     
       

         $id = $this->request->getGet('id');

            if($id)
            {
                $arrSearch['id']=$id;
                   $EmergencyCasesModel=new EmergencyCasesModel();
              $settingdata = $EmergencyCasesModel->getData($arrSearch);
             $settingdata = isset($settingdata[0]) ? $settingdata[0] : array();


             
                $this->EmergencyCasesModel->where("id",$id)->delete();
                $this->session->setFlashdata('message', 'Deleted  successfully.');

              }

            else
            {
                $this->session->setFlashdata('errmessage', 'Opps some error.');
            }
            
             return redirect()->to(site_url('viewemergencycases'));
           
    }
       public function docDelete()
    {
        
        $id = $this->request->getGet('id');

             $arrSearch['id']=$id;
                $EmergencyCasesModel=new EmergencyCasesModel();
              $settingdata = $EmergencyCasesModel->getData($arrSearch);
             $settingdata = isset($settingdata[0]) ? $settingdata[0] : array();
          
         
        if($id > 0){

        	$orderFolderpath = PUBLIC_PATH.'Cases/'.$settingdata->image;
        	@unlink($orderFolderpath);
          
           $EmergencyCasesModel->set('image_name','')->where('id',$id)->update();
            //echo $this->db->last_query('orders');die;
           $this->session->setFlashdata('message', 'Deleted  successfully.');
        }
        else
        {
             $this->session->setFlashdata('errmessage', 'Opps some error.');
        }


        return redirect()->to(site_url('addemergencycases?id='.$id));

           
           
    }
    public function preview() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        // $session = session();

        $id = $this->request->getGet("id");

        if (!$id) {
            $this->session->setFlashdata('errmessage', 'User ID number doesnot exist! Please try again.');

            return redirect()->to(site_url('viewemergencycases'));
        }
        set_title('Welcome | ' . SITE_NAME);

        $data = array();

        $EmergencyCasesModel = new EmergencyCasesModel();
   
        $userdetails = $EmergencyCasesModel->getData(array('id' => $id));
        // print_r($userdetails);die;
        $userdetails = $userdetails ? $userdetails[0] : array();
        $data['userdetails'] = $userdetails;

        // echo "<pre>"; print_r($userdetails);die;
     
       
        $data['userid'] = $id;

        if (!$data) {
            $this->session->setFlashdata('errmessage', 'Customer does not exist!');
            return redirect()->to(site_url('userlist'));
        }
        // echo "<pre>";print_r($array[0]); die();
        $this->template->render('admintemplate', 'contents', 'admin/EmergencyCases/preview', $data);
    }
     public function addDocument() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        $id=$this->request->getGet('id');

        if($id){
            set_title('Document | ' . SITE_NAME);
        $data['pagetitle'] = "Add document";
         $data['edit'] = $this->EmergencyCasesModel->select('id')->find($id);

             $arrSearch['id']=$id;
                $DocumentModel=new DocumentModel();
              $settingdata = $DocumentModel->getData($arrSearch);
             $settingdata = isset($settingdata) ? $settingdata : array();
         $data['document']=$settingdata;
         // print_r($data['document']);exit;
    
       


        // $certificates_image=new certificates_image();
         // $data['doc_imag'] = $this->certificates_image->getfiledata($id);

        
       

        $this->template->render('admintemplate', 'contents', 'admin/EmergencyCases/document', $data);

        }
    }
    public function saveDocs()
   {
        $data = array();   
        $postdata = $this->request->getPost();


        $id=$postdata['id'];
        // print_r($id);exit;


        $uploadedfile = $this->request->getFiles('image');
        $extc = '';
       
        if(count($postdata))
        {
       
            $newfilenameName ='';

             if(isset($uploadedfile['image']) && $uploadedfile['image'])
             { 
                 if($uploadedfile['image']->getName())
                 {
                         $orderFolderpath = PUBLIC_PATH.'Cases/Document/';

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
                 "doc_name"=>$postdata['doc_name'],
                 "cases_id"=>$id, 

             );
             // print_r($menudata);exit;



             // if banner uploaded then add / replace it
             if($newfilenameName)
             {
                 $menudata['doc_image'] = $newfilenameName;

             }
                if(intval($id)>0)
                {

                        $this->DocumentModel->save($menudata);
                        $this->session->setFlashdata('message', 'Document Added  successfully..');
                   
                      return redirect()->to(site_url('document?id='.$id));
                }
              

            
        }
        else
        {
             $this->session->setFlashdata('errmessage', 'Not Added.');
        }

         return redirect()->to(site_url('document?id='.$id));
           
    }
    public function deleteDocument()
    {
        
        $id = $this->request->getGet('id');
          $data=$this->DocumentModel->where('Doc_id',$id)->find();
          $documen_id=$data[0]['cases_id'];
         
     

          
         
        if($id > 0){

           
          
           $this->DocumentModel->where('Doc_id',$id)->delete();
            //echo $this->db->last_query('orders');die;
           $this->session->setFlashdata('message', 'Deleted  successfully.');
        }
        else
        {
             $this->session->setFlashdata('errmessage', 'Opps some error.');
        }


        return redirect()->to(site_url('document?id='.$documen_id));

           
           
    }




}
