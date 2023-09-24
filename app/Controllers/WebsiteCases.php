<?php
namespace App\Controllers;
// use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\EmergencyCasesModel;
use App\Models\WebsiteCasesModel;
use App\Models\DocumentModel;
use App\Models\Volunteer_model;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;

class WebsiteCases extends BaseController {

	
    protected $session;
    protected  $isAdminLoggedIn;
    protected $adminModel;

    public function __construct()
    {
        $this->session = session();
     
        $this->EmergencyCasesModel = new WebsiteCasesModel();
        $this->DocumentModel = new DocumentModel();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
       

    }
    

public function index()
    {
  
        set_title('Emergency Cases | ' . SITE_NAME);    
        
        $data = array();
        
        $data['action'] = "emergency-cases";
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
           $searchArray['status'] = $cases_status;
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
        $data["cases"] = $this->EmergencyCasesModel->getData($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;
        // echo"<pre>";
        // print_r($data["cases"]);exit;
        // print_r($data["settingData"]);exit;


        $this->template->render('websitetemplate', 'contents', 'website/emergency_cases', $data);
                
    }

    // succsessfull cases
    public function SuccessfullCases()
    {

            
        set_title('Closed Cases | ' . SITE_NAME);    
        
        $data = array();
        $data['action'] = "successfull-cases";
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
           $searchArray['status'] = $cases_status;
       }
        $page = $page ? $page : 1;
        $Limit = PER_PAGE_RECORD;
        $totalRecord = $this->EmergencyCasesModel->getDataSuccessfull($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
        $data['txtsearch'] = $txtsearch;
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data["cases"] = $this->EmergencyCasesModel->getDataSuccessfull($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;
        // echo"<pre>";
        //  print_r($data["cases"]);exit;


        $this->template->render('websitetemplate', 'contents', 'website/successful_cases', $data);
                
    }
    
    
     public function emergencyCasesDetails() {
        
        $id=$this->request->getGet('id');
        if($id){
           $data['list'] = $this->EmergencyCasesModel->find($id);
           $data['readmore'] = $this->EmergencyCasesModel->where('cases_name','1')->find();
         
        $data['doc'] = $this->EmergencyCasesModel->listData($id);
        // echo "<pre>";
        // print_r($data['doc']);exit;
        $this->template->render('websitetemplate', 'contents', 'website/EmergencyCasesDetails', $data);

        }
    }


    public function Volunteers() {
        
    
        $this->template->render('websitetemplate', 'contents', 'website/volform');

        }
       
    public function save()
      {
        $data = array();   
        $postdata = $this->request->getPost();

        $uploadedfile = $this->request->getFiles('image');
        $extc = '';
       
        if(count($postdata))
        {
       
            $newfilenameName ='';

             if(isset($uploadedfile['image']) && $uploadedfile['image'])
             { 
                 if($uploadedfile['image']->getName())
                 {
                         $orderFolderpath = PUBLIC_PATH.'Volunteer/';

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

             $data = array(
                 "volunteer_name"=>$postdata['volunteer_name'],
                 "volunteer_email"=>$postdata['volunteer_email'],
               
                 "volunteer_gender"=>$postdata['volunteer_gender'],
                 "volunteer_address"=>$postdata['volunteer_address'],
                 "v_pincode"=>$postdata['v_pincode'],
                 "v_city"=>$postdata['v_city'],
                 "volunteer_message"=>$postdata['volunteer_message'],
                 "mob_number"=>$postdata['phone'],



             );
             // print_r($data);exit;



             // if banner uploaded then add / replace it
             if($newfilenameName)
             {
                 $data['doc_upload'] = $newfilenameName;

             }
                
              
                           $Volunteer_model=new Volunteer_model();
                     $Volunteer_model->save($data);

                     $this->session->setFlashdata('message', 'message sent successfully.');
                      return redirect()->to(site_url('Volunteers'));

                  }
              }
               

            
        

    
    




}
