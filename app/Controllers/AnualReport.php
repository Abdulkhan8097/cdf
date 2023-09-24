<?php
namespace App\Controllers;
// use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\AnualModel;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;

class AnualReport extends BaseController {

	
    protected $session;
    protected  $isAdminLoggedIn;
    protected $adminModel;

    public function __construct()
    {
        $this->session = session();
     
        $this->AnualModel = new AnualModel();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
       

    }
    

    public function index()
	{

        if(!$this->isAdminLoggedIn)
	    {  
	           return redirect()->to(site_url('admin'));
        }  
            
        set_title('Anual Report | ' . SITE_NAME);    
        
        $data = array();
        
        set_title('Anual Report | ' . SITE_NAME);
        
        $data['pagetitle'] = "Anual Report List";
        $data['action'] = "viewanual";
        $txtsearch = $this->request->getGet('txtsearch');
       
        $searchArray = array();
        $paginationnew = new Paginationnew();
        $page = $this->request->getGet('page');
        // $cases_name = $this->request->getGet('cases_name');
        //  if ($cases_name) {
        //     $searchArray['cases_name'] = $cases_name;
        // }
        $page = $page ? $page : 1;
        $Limit = PER_PAGE_RECORD;
        $totalRecord = $this->AnualModel->getData($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
        $data['txtsearch'] = $txtsearch;
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data["settingData"] = $this->AnualModel->getData($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;
        // print_r($data["settingData"]);exit;


        $this->template->render('admintemplate', 'contents', 'admin/AnualReport/list', $data);
				
    }
    
    
     public function addReport() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        $id=$this->request->getGet('id');

        if($id){
            set_title('Update | ' . SITE_NAME);
        $data['pagetitle'] = "UpdateAnualReport";
        $data['edit'] = $this->AnualModel->find($id);
         //print_r($data['edit']);EXIT;


        // $certificates_image=new certificates_image();
         // $data['doc_imag'] = $this->certificates_image->getfiledata($id);

        
       

        $this->template->render('admintemplate', 'contents', 'admin/AnualReport/add', $data);

        }else{
        set_title('AnualReport | ' . SITE_NAME);
        $data['pagetitle'] = "Add Anual Report";
        $this->template->render('admintemplate', 'contents', 'admin/AnualReport/add', $data);
       }
    }
    
    public function save()
   {
       
       
         $menudata= array();
          $menudata['id']=$id =(isset($_POST['id']) && !empty($_POST['id'])) ? $this->request->getPost('id') : '';

         $menudata['start_year']=$start_year =(isset($_POST['start_year']) && !empty($_POST['start_year'])) ? $this->request->getPost('start_year') : '';
          $menudata['end_year']=$end_year =(isset($_POST['end_year']) && !empty($_POST['end_year'])) ? $this->request->getPost('end_year') : '';
          $menudata['annual_name']=$annual_name =(isset($_POST['annual_name']) && !empty($_POST['annual_name'])) ? $this->request->getPost('annual_name') : '';
        
          
          $cover_image='';
         $pdf_file='';


        if(isset($_FILES["cover_image"]["name"]) && !empty($_FILES["cover_image"]["name"]))
               {
                    //cover_image 
                    $cover_image = $this->request->getFile('cover_image');
                    $cover_image ->move(PUBLIC_PATH.'Annual/');
                    $cover_image =$cover_image->getName();
                   
                }
                 if(isset($_FILES["pdf_file"]["name"]) && !empty($_FILES["pdf_file"]["name"]))
               {
                  
                    $pdf_file = $this->request->getFile('pdf_file');
                    $pdf_file ->move(PUBLIC_PATH.'Annual/');
                    $pdf_file =$pdf_file->getName();
                   
                }

                if ($pdf_file) {
                     $menudata['pdf_file'] = $pdf_file;
                }
                 if ($cover_image) {
                     $menudata['anual_image'] =$cover_image;
                }


               
           
             



             // if banner uploaded then add / replace it
           
                if(intval($id)>0)
				{

					   $chek= $this->AnualModel->set($menudata)->where('id',$id)->update();
				
					    
					    $this->session->setFlashdata('message', 'Updated  successfully..');
	               
	                  return redirect()->to(site_url('viewanual'));
                }
	          else
				{
                            
					 $this->AnualModel->save($menudata);
					 
                     $this->session->setFlashdata('message', 'Added  successfully.');
                      return redirect()->to(site_url('viewanual'));
				}	

      

         return redirect()->to(site_url('viewanual'));
           
    }
    public function delete()
    {
        $data = array();     
       

         $id = $this->request->getGet('id');

            if($id)
            {
                $arrSearch['id']=$id;
                   $AnualModel=new AnualModel();
              $settingdata = $AnualModel->getData($arrSearch);
             $settingdata = isset($settingdata[0]) ? $settingdata[0] : array();


              if($settingdata)
              {
               
                      $orderFolderpath = PUBLIC_PATH.'Annual/'.$settingdata->anual_image;
        	           @unlink($orderFolderpath);
              

                }
                $this->AnualModel->where("id",$id)->delete();
                $this->session->setFlashdata('message', 'Deleted  successfully.');

              }

            else
            {
                $this->session->setFlashdata('errmessage', 'Opps some error.');
            }
            
             return redirect()->to(site_url('viewanual'));
           
    }
     public function previewReport() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        // $session = session();

        $id = $this->request->getGet("id");


        if (!$id) {
            $this->session->setFlashdata('errmessage', 'User ID number doesnot exist! Please try again.');

            return redirect()->to(site_url('viewanual'));
        }
        set_title('View | ' . SITE_NAME);

        $data = array();

        $AnualModel = new AnualModel();
        $data['userdetails'] = $AnualModel->find($id);
        $this->template->render('admintemplate', 'contents', 'admin/AnualReport/view', $data);
    }

     public function websitAannual()
    {

      
            
        set_title('Annual | ' . SITE_NAME);    
        
        $data = array();
        
        set_title('Annual | ' . SITE_NAME);
        
       
        $data['action'] = "annual-report";

        $searchArray = array();
        $paginationnew = new Paginationnew();
        $page = $this->request->getGet('page');
     
        $page = $page ? $page : 1;
        $Limit = 20;
        $totalRecord = $this->AnualModel->getDataSite($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
       
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data["list"] = $this->AnualModel->getDataSite($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;
          // print_r($data["list"]);exit;


        $this->template->render('websitetemplate', 'contents', 'website/annual_report', $data);
                
    }


     

}
