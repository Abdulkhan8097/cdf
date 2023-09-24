<?php
namespace App\Controllers;
// use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\EmergencyCasesModel;
use App\Models\WebsiteCasesModel;
use App\Models\DocumentModel;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;

class WebsiteNewsEvents extends BaseController {

	
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
    

 //    public function index()
	// {

 //        if(!$this->isAdminLoggedIn)
	//     {  
	//            return redirect()->to(site_url('admin'));
 //        }  
            
 //        set_title('Cases | ' . SITE_NAME);    
        
 //        $data = array();
        
 //        set_title('Cases | ' . SITE_NAME);
        
 //        $data['pagetitle'] = "Cases List";
 //        $data['action'] = "viewemergencycases";
 //        $txtsearch = $this->request->getGet('txtsearch');
       
 //        $searchArray = array();
 //        $paginationnew = new Paginationnew();
 //        $page = $this->request->getGet('page');
 //        $cases_name = $this->request->getGet('cases_name');
 //         if ($cases_name) {
 //            $searchArray['cases_name'] = $cases_name;
 //        }
 //        $page = $page ? $page : 1;
 //        $Limit = PER_PAGE_RECORD;
 //        $totalRecord = $this->EmergencyCasesModel->getData($searchArray, '', '', 1); // return count value

 //        $startLimit = ($page - 1) * $Limit;
 //        $data['startLimit'] = $startLimit;

 //        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
 //        $data['txtsearch'] = $txtsearch;
 //        $data['startLimit'] = $startLimit;
 //        $data['pagination'] = $pagination;
 //        $data['parentid'] = $parentid;
 //        $data["settingData"] = $this->EmergencyCasesModel->getData($searchArray, $startLimit, $Limit);
 //        $data["searchArray"] = $searchArray;
 //        // print_r($data["settingData"]);exit;


 //        $this->template->render('admintemplate', 'contents', 'admin/EmergencyCases/list', $data);
				
 //    }
    
    
     public function emergencyCasesDetails() {
        
        $id=$this->request->getGet('id');
        // print_r($id);exit;

        if($id){
           $data['list'] = $this->EmergencyCasesModel->find($id);
        $data['doc'] = $this->EmergencyCasesModel->listData($id);
// echo"<pre>";
//              print_r($data['doc']);EXIT;

        $this->template->render('websitetemplate', 'contents', 'website/EmergencyCasesDetails', $data);

        }
    }
    
    




}
