<?php
namespace App\Controllers;
// use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\Volunteer_model;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;

class Volunteer extends BaseController {

    
    protected $session;
    protected  $isAdminLoggedIn;
    protected $adminModel;

    public function __construct()
    {
        $this->session = session();
     
        $this->Volunteer_model = new Volunteer_model();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
       

    }
    

    public function index()
    {

        if(!$this->isAdminLoggedIn)
        {  
               return redirect()->to(site_url('admin'));
        }  
            
        set_title('Volunteer | ' . SITE_NAME);    
        
        $data = array();
        
        set_title('Volunteer | ' . SITE_NAME);
        
        $data['pagetitle'] = "Volunteer List";
        $data['action'] = "viewvolunteer";
        $txtsearch = $this->request->getGet('txtsearch');
       
        $searchArray = array();
        if ($txtsearch) {
            $searchArray['txtsearch']=$txtsearch;
        }
        $paginationnew = new Paginationnew();
        $page = $this->request->getGet('page');
        $page = $page ? $page : 1;
        $Limit = PER_PAGE_RECORD;
        $totalRecord = $this->Volunteer_model->getData($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
        $data['txtsearch'] = $txtsearch;
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data["list"] = $this->Volunteer_model->getData($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;
        // print_r($data["settingData"]);exit;


        $this->template->render('admintemplate', 'contents', 'admin/volunteer/v_list', $data);
                
    }
    
    
     public function addVolunteer() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        $id=$this->request->getGet('id');

        if($id){
            set_title('Update | ' . SITE_NAME);
        $data['pagetitle'] = "Update Volunteer";
        $data['edit'] = $this->Volunteer_model->find($id);
        // print_r($data['edit']);EXIT;
        $this->template->render('admintemplate', 'contents', 'admin/volunteer/v_add', $data);

        }else{
        set_title('Add Volunteer | ' . SITE_NAME);
        $data['pagetitle'] = "Add Volunteer";
        $this->template->render('admintemplate', 'contents', 'admin/volunteer/v_add', $data);
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
                if(intval($id)>0)
                {

                        $this->Volunteer_model->set($data)->where('volunteer_id',$id)->update();
                        $this->session->setFlashdata('message', 'Updated  successfully..');
                   
                      return redirect()->to(site_url('viewvolunteer'));
                }
              else
                {
                            
                     $this->Volunteer_model->save($data);
                     $this->session->setFlashdata('message', 'Added  successfully.');
                      return redirect()->to(site_url('viewvolunteer'));
                }   

            
        }
        else
        {
             $this->session->setFlashdata('errmessage', 'Not Added.');
        }

         return redirect()->to(site_url('viewvolunteer'));
           
    }
    public function delete()
    {
        $data = array();     
       

         $id = $this->request->getGet('id');

            if($id)
            {
                $arrSearch['id']=$id;
                   $Volunteer_model=new Volunteer_model();
              $settingdata = $Volunteer_model->getData($arrSearch);
             $settingdata = isset($settingdata[0]) ? $settingdata[0] : array();


              if($settingdata)
              {
               
                      $orderFolderpath = PUBLIC_PATH.'Volunteer/'.$settingdata->doc_upload;
                       @unlink($orderFolderpath);
              

                }
                $this->Volunteer_model->where("volunteer_id",$id)->delete();
                $this->session->setFlashdata('message', 'Deleted  successfully.');

              }

            else
            {
                $this->session->setFlashdata('errmessage', 'Opps some error.');
            }
            
             return redirect()->to(site_url('viewvolunteer'));
           
    }
       public function docDelete()
    {
        
        $id = $this->request->getGet('id');


             $arrSearch['id']=$id;
                $Volunteer_model=new Volunteer_model();
              $settingdata = $Volunteer_model->getData($arrSearch);
             $settingdata = isset($settingdata[0]) ? $settingdata[0] : array();
          
         
        if($id > 0){

            $orderFolderpath = PUBLIC_PATH.'Volunteer/'.$settingdata->doc_upload;
            @unlink($orderFolderpath);
          
           $Volunteer_model->set('doc_upload','')->where('volunteer_id',$id)->update();
            //echo $this->db->last_query('orders');die;
           $this->session->setFlashdata('message', 'Deleted  successfully.');
        }
        else
        {
             $this->session->setFlashdata('errmessage', 'Opps some error.');
        }


        return redirect()->to(site_url('addvolunteer?id='.$id));

           
           
    }
    public function preview() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        $id = $this->request->getGet("id");

        if (!$id) {
            $this->session->setFlashdata('errmessage', 'User ID number doesnot exist! Please try again.');

            return redirect()->to(site_url('viewvolunteer'));
        }
        set_title('Preview | ' . SITE_NAME);

        $data = array();

        $Volunteer_model = new Volunteer_model();
        $userdetails = $Volunteer_model->getData(array('id' => $id));
        // print_r($userdetails);die;
        $userdetails = $userdetails ? $userdetails[0] : array();
        $data['userdetails'] = $userdetails;
        // echo "<pre>";print_r($array[0]); die();
        $this->template->render('admintemplate', 'contents', 'admin/volunteer/v_preview', $data);
    }

    public function website() {
        
        $this->template->render('websitetemplate', 'contents', 'website/volunteers');    

    }
    
    
   
   




}
?>
