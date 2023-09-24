<?php
namespace App\Controllers;
// use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\CertificatesModel;
use App\Models\certificates_image;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;

class Certificates extends BaseController {

	
    protected $session;
    protected  $isAdminLoggedIn;
    protected $adminModel;

    public function __construct()
    {
        $this->session = session();
        $this->CertificatesModel = new CertificatesModel();
        $this->certificates_image = new certificates_image();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
       

    }
    

    public function index()
	{

        if(!$this->isAdminLoggedIn)
	    {  
	           return redirect()->to(site_url('admin'));
        }  
            
        set_title('Welcome | ' . SITE_NAME);    
        
        $data = array();
        
        set_title('Welcome | ' . SITE_NAME);
        
        $data['pagetitle'] = "Certificates List";
        $data['action'] = "viewcertificates";
        $txtsearch = $this->request->getGet('txtsearch');
        $parentid = $this->request->getGet('parentid');
        $searchArray = array();
        if ($txtsearch) {
           $searchArray['txtsearch']=$txtsearch;
        }
        $paginationnew = new Paginationnew();
        $page = $this->request->getGet('page');
        $page = $page ? $page : 1;
        $Limit = PER_PAGE_RECORD;
        $totalRecord = $this->CertificatesModel->getData($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
        $data['txtsearch'] = $txtsearch;
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data['parentid'] = $parentid;
        $data["settingData"] = $this->CertificatesModel->getData($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;

        $this->template->render('admintemplate', 'contents', 'admin/Certificates/certificateslist', $data);
				
    }
    
    
     public function addCertificates() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        $id=$this->request->getGet('id');

        if($id){
            set_title('Update | ' . SITE_NAME);
        $data['pagetitle'] = "Update Certificates";
        $data['edit'] = $this->CertificatesModel->get_user($id);

        $certificates_image=new certificates_image();
         $data['doc_imag'] = $this->certificates_image->getfiledata($id);

        
       

        $this->template->render('admintemplate', 'contents', 'admin/Certificates/addcertificates', $data);

        }else{
        set_title('Welcome | ' . SITE_NAME);
        $data['pagetitle'] = "Add Certificates";
        $this->template->render('admintemplate', 'contents', 'admin/Certificates/addcertificates', $data);
       }
    }
    
    public function editmenu() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        set_title('Welcome | ' . SITE_NAME);
        $data['pagetitle'] = "Edit Menu";
        
        $id = $this->request->getGet('id');
        if ($id) {
            $settingsModel = new MenucategoryModel();
            $data['id'] = $id;
            $data['settingDetails'] = $settingsModel->asArray()->where(['cat_id' => $id])->first();
            
            $arrSearch = array("parentid"=>0);
             $data['parentmenus'] = $settingsModel->getData($arrSearch);
            
        } else {
            return redirect()->to(site_url('addmenu'));
        }
       

        $this->template->render('admintemplate', 'contents', 'admin/menucategory/edit', $data);
    }


   
          public function saveCertificates()
    {
        $data = array();  

        $postdata = $this->request->getPost();
        $menudata=array();
         $id=$postdata['id'];
         $cover_image='';
         $pdf_file='';

                if(isset($_FILES["cover_image"]["name"]) && !empty($_FILES["cover_image"]["name"]))
               {
                    //cover_image 
                    $cover_image = $this->request->getFile('cover_image');
                    $cover_image ->move(PUBLIC_PATH.'certificates/');
                    $cover_image =$cover_image->getName();
                   
                }
                 if(isset($_FILES["cimage"]["name"]) && !empty($_FILES["cimage"]["name"]))
               {
                  
                    $cimage = $this->request->getFile('cimage');
                    $cimage ->move(PUBLIC_PATH.'certificates/');
                    $pdf_file =$cimage->getName();
                   
                }

                if ($pdf_file) {
                     $menudata['pdf_file'] = $pdf_file;
                }
                 if ($cover_image) {
                     $menudata['cover_image'] =$cover_image;
                }

        $menudata['certificates_name']= $postdata['cname'];
            
      
           if(intval($id)>0)
                {

                        $this->CertificatesModel->set($menudata)->where('id',$id)->update();

                        
                        $this->session->setFlashdata('message', 'Updated  successfully..');
     
                }
              else
                {
                            
                     $this->CertificatesModel->save($menudata);
                      $certificates_id = $this->CertificatesModel->getInsertID();
                    
                //         if ($this->request->getFileMultiple('cimage')) {
                //      foreach($this->request->getFileMultiple('cimage') as $banner)
                //       {               
                     
                //          $banner->move(PUBLIC_PATH.'certificates/');

                //           $data2 = [
                //                     'certificates_image' =>  $banner->getClientName(),
                //                     'certificates_id' =>  $certificates_id,
                                   
                                   
                //                   ];

                                 
                //     $certificates_image=new certificates_image();
                //       $this->certificates_image->save($data2);
                //   }
                //       $this->session->setFlashdata('message', 'Certificate added  successfully.');
                // }
                    
            } 
              return redirect()->to(site_url('viewcertificates'));   

           
    }
     public function upload() {
      helper(['form', 'url']); 
      $database = \Config\Database::connect();
      $db = $database->table('profiles');
   
      $validateImg = $this->validate([
          'file' => [
              'uploaded[file]',
              'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
              'max_size[file,4096]',
          ]
      ]);
       
      if (!$validateImg) {
          print_r('Eiter file type or size (Max 4MB) not correct.');
      } else {
          $x_file = $this->request->getFile('file');
          $image = \Config\Services::image()
              ->withFile($x_file)
              ->resize(100, 100, true, 'height')
              ->save(FCPATH .'/images/'. $x_file->getRandomName());
          $x_file->move(WRITEPATH . 'uploads');
          $fileData = [
              'name' =>  $x_file->getName(),
              'type'  => $x_file->getClientMimeType()
          ];
          $store = $db->insert($fileData);
          print_r('Image resized and stored.');
      } 
 }

    public function updatemenu()
    {
        $data = array();   
        $postdata = $this->request->getPost();
        $uploadedfile = $this->request->getFiles('topbanner');
      // print_r($uploadedfile);die;
        $menuid = $postdata['id'];
        $extc = '';
       
        if($menuid)
        {
       
            $newfilenameName ='';

             if(isset($uploadedfile['topbanner']) && $uploadedfile['topbanner'])
             {
                 if($uploadedfile['topbanner']->getName())
                 {
                         $orderFolderpath = PUBLIC_PATH.'website/images/banner/';

                         if (!is_dir($orderFolderpath)) {
                             mkdir($orderFolderpath, 0777);
                             chmod($orderFolderpath, 0777);
                         }

                     $fileObject = $uploadedfile['topbanner'];

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
                 "cat_name"=>$postdata['menuname'],
                 "cat_parentid"=>$postdata['parentid'],
                 "cat_url"=>$postdata['menuurl'],
                 "cat_pagename"=>$postdata['pagename'],
                 "cat_showinmenu"=>isset($postdata['showinmenu']) ? $postdata['showinmenu'] : 0,
                 "cat_keywords"=>$postdata['seokeyword'],
                 "cat_description"=>$postdata['seodesc'],
                 "cat_content"=>$postdata['seocontent'],
                 "cat_topbgcolor"=>$postdata['cat_topbgcolor'],
             );

             // if banner uploaded then add / replace it
             if($newfilenameName)
             {
                 $menudata['cat_topbanner'] = $newfilenameName;
             }

             $this->MenucategoryModel->set($menudata)->where("cat_id",$menuid)->update();

              $this->session->setFlashdata('message', 'Updated  successfully.');
        }
        else
        {
             $this->session->setFlashdata('errmessage', 'Not updated.');
        }
         return redirect()->to(site_url('menucategory'));
           
    }


    public function delete()
    {
        $data = array();     
       

         $id = $this->request->getGet('id');

            if($id)
            {
                $arrSearch['id']=$id;
                $certificates_image=new certificates_image();
              $settingdata = $certificates_image->getData($arrSearch);
              $settingdata = isset($settingdata) ? $settingdata : array();

              if($settingdata)
              {
                foreach($settingdata as $value){
                      $orderFolderpath = PUBLIC_PATH.'certificates/'.$value->certificates_image;
                      $orderFolderpath1 = PUBLIC_PATH.'certificates/thumbnail/'.$value->c_thumbnail;
               
              
                   @unlink($orderFolderpath);
                   @unlink($orderFolderpath1);
                    $certificates_image->where('id',$value->id)->delete();

                }

              }
                    
                    $this->CertificatesModel->where("id",$id)->delete();

                   
                   
                     $this->session->setFlashdata('message', 'Deleted  successfully.');
            }
            else
            {
                $this->session->setFlashdata('errmessage', 'Opps some error.');
            }
            
             return redirect()->to(site_url('viewcertificates'));
           
    }
       public function docDelete()
    {
        
        $id = $this->request->getGet('id');
        $img_id = $this->request->getGet('img_id');

     
     
        if($id > 0){
           $certificates_image=new certificates_image();
           $certificates_image->where('id',$id)->delete();
            //echo $this->db->last_query('orders');die;
           $this->session->setFlashdata('message', 'Deleted  successfully.');
        }
        else
        {
             $this->session->setFlashdata('errmessage', 'Opps some error.');
        }


        return redirect()->to(site_url('addcertificates?id='.$img_id));

           
           
    }



}
