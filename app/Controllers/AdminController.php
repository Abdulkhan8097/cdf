<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\EmergencyCasesModel;
use App\Models\EnquiryModel;
use App\Models\OrderstatuslogModel;
use App\Libraries\IndianCurrency;
use App\Models\SettingsModel;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Libraries\SiteVariables;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Libraries\EmailSms;
use Mpdf\Mpdf;
require FCPATH. '/vendor/autoload.php';

class AdminController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;
    protected $adminModel;
    protected $siteVariables;

    public function __construct() {
        $this->session = session();
        $this->siteVariables = new SiteVariables();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');

        $this->adminModel = new AdminModel();
    }

    public function adminusers() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        set_title('Users List | ' . SITE_NAME);

        $admin_type = $this->session->get('type');
        $admin_id = $this->session->get('id');

       

        $data['admin_type'] = $admin_type;
        $data['pagetitle'] = "Users List";
        $data['action'] = "adminusers";
        $txtsearch = $this->request->getGet('txtsearch');
      
        $searchArray = array();
        $paginationnew = new Paginationnew();


       
        if ($txtsearch) {
            $searchArray['txtsearch'] = $txtsearch;
        }
        $page = $this->request->getGet('page');
        $page = $page ? $page : 1;
        $Limit = PER_PAGE_RECORD;
        $totalRecord = $this->adminModel->getData($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
        $data['txtsearch'] = $txtsearch;
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data["salesData"] = $this->adminModel->getData($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;

        $this->template->render('admintemplate', 'contents', 'admin/listaccount', $data);
    }

    public function newAccount() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        set_title('New Account | ' . SITE_NAME);

        $admin_type = $this->session->get('type');
        $admin_id = $this->session->get('id');
        $data['admin_type'] = $admin_type;
        $this->template->render('admintemplate', 'contents', 'admin/newaccount', $data);
    }

    public function editAccount() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        set_title('Welcome | ' . SITE_NAME);

        
        

        $id = $this->request->getGet('id');
        if ($id) {
            $data['userid'] = $id;
            $data['adminDetails'] = $this->adminModel->where('id', $id)->first();
        } else {
            return redirect()->to(site_url('newaccount'));
        }
// print_r($data['adminDetails']);die;
        $this->template->render('admintemplate', 'contents', 'admin/editaccount', $data);
    }

    public function addAccount() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        $session = session();
        $name = $this->request->getPost('name');
        $password = $this->request->getPost('password');
        //$rep_password =$this->request->getPost('rep_password'); 
        $email = $this->request->getPost('email');
        $mobile = $this->request->getPost('mobilenumber');
        $admin_type = $this->request->getPost('admin_type');
        if ($name && $password && $email && $mobile ) {
            $searchArray = array('txtsearch' => $email);

            $totalRecord = $this->adminModel->getData($searchArray, '', '', 1); // return count value

            if ($totalRecord < 1) {
                $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                 $ref_key = "S";
                 for ($i = 0; $i < 8; $i++) {
                    $ref_key .= $chars[mt_rand(0, strlen($chars)-1)];
                    }   
                $searchArray = array('txtsearch' => $ref_key);

                 $totalRecord = $this->adminModel->getData($searchArray, '', '', 1); 
                 if($totalRecord < 1){
                       

                $arrSaveData = array(
                    'name' => $name,
                    'password' => password_hash($password, 1),
                    'email' => $email,
                    'phone' => $mobile,
                    'loginType' => $admin_type,
                    'uniqueKey' => $ref_key,
                );
                

                $this->adminModel->save($arrSaveData);
                $adminId = $this->adminModel->getInsertID();

                if ($adminId) {
                    $this->session->setFlashdata('message', 'Account created successfully.');
                } else {
                    $this->session->setFlashdata('errmessage', 'Account not created');
                }
                 } else {
                $this->session->setFlashdata('errmessage', 'REFER KEY already exist');
                 }
            
            } else {
                $this->session->setFlashdata('errmessage', 'Email already exist');
            }
        } else {
            $this->session->setFlashdata('errmessage', 'Please provide all data');
        }

        return redirect()->to(site_url('newaccount'));
    }

    public function updateAccount() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
    
        $userid = $this->request->getPost('id');


        if ($userid) {

            $name = $this->request->getPost('name');
            $password = $this->request->getPost('password');
            
            $email = $this->request->getPost('email');
            $mobile = $this->request->getPost('mobilenumber');
            $user_status = $this->request->getPost('user_status');
            $admin_type = $this->request->getPost('admin_type');
             // print_r($user_status);exit;
        //   print_r($_POST);exit;

            if ($name && $email && $mobile ) {
                $searchArray = array('txtsearch' => $email);
                $totalRecord = $this->adminModel->where("email", $email)->where("id !=", $userid)->first();

                if (!$totalRecord) {

                    $arrSaveData = array(
                        'name' => $name,
                        'email' => $email,
                        'phone' => $mobile,
                        'loginType' => $admin_type,
                        'status' => $user_status,
                    );
                    
                    // if zonal manager change then update it
                 
                    if ($password) {
                        $arrSaveData['password'] = password_hash($password, 1);
                    }
                    

                    $this->adminModel->set($arrSaveData)->where('id', $userid)->update();
                    $this->session->setFlashdata('message', 'Account updated successfully.');
                } else {
                    $this->session->setFlashdata('errmessage', 'Email already exist');
                }
            } else {
                $this->session->setFlashdata('errmessage', 'Please provide all data');
            }
        } else {
            $this->session->setFlashdata('errmessage', 'Invalid access');
        }

        return redirect()->to(site_url('editaccount?id=' . $userid));
    }
     public function delAccount() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        $id = $this->request->getGet("id");
        $this->adminModel->where('id', $id)->delete();
        $this->session->setFlashdata('message', 'Account deleted succesfully.');

        return redirect()->to(site_url('adminusers'));
    }


    public function userslist() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        set_title('Donor Details | ' . SITE_NAME);
        $data = array();
        $usermodel = new UserModel();
        $session = session();
       
        $admin_id = $this->session->get('id');
       
        //if sales head then get data according to him
        $saleshead = "";
        $searchArray    = array();
       
        $admin_type     = $this->session->get('type');
        $paginationnew  = new \App\Libraries\Paginationnew();
        $txtsearch      = $this->request->getGet('txtsearch');
        $user_status    = $this->request->getGet('user_status');
        $payment_status    = $this->request->getGet('payment_status');
        $branch_data    = $this->request->getGet('branch_data');
        $start_date     = $this->request->getGet('start_date');
        $end_date       = $this->request->getGet('end_date');
        $receipt_type   = $this->request->getGet('receipt_type');
         if ($receipt_type) {
            $searchArray['receipt_type'] = $receipt_type;
        }
        if($start_date) {
            $searchArray['start_date'] = $start_date;
           
        }
        if($end_date) {
           $searchArray['end_date'] = $end_date;
        }

        $data['txtsearch'] = $txtsearch;
       
        $data['user_status'] = $user_status;

        $data['payment_status'] = $payment_status;

        if ($txtsearch) {
            $searchArray['txtsearch'] = $txtsearch;
        }
         if ($branch_data) {
            $searchArray['branch_data'] = $branch_data;
        }
        
        if ($admin_type == "branch"  ) {
            $searchArray['admin_id'] = $admin_id;
         
      
        }
        if($payment_status){
            $searchArray['payment_status'] = $payment_status;
        }
       
        if ($user_status || $user_status==='0') {
            $searchArray['user_status'] = $user_status;
        }

        $page = $this->request->getGet('page');
        $page = $page ? $page : 1;
        $Limit = PER_PAGE_RECORD;
        $totalRecord = $usermodel->getData($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;
      
        $admin_type = $this->session->get('type');
        $data['admin_type'] = $admin_type;
        $data['txtsearch'] = $txtsearch;
        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
        $data['pagination'] = $pagination;
        $data["usersData"] = $usermodel->getData($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;
        $data["branch_data"] = $branch_data;
        $data["receipt_type"] = $receipt_type;
        $SettingsModel = new SettingsModel();

        $searchArray['id']=25;
        $data['EmailMessage']=$SettingsModel->getData($searchArray);
         $AdminModel =new AdminModel();

        // print_r($data['EmailMessage']);exit;

        $this->template->render('admintemplate', 'contents', 'admin/users/userlist', $data);
    }

    public function getcustomer(){

        $arrResponse = array('status'=>1,'message'=>'');
        $id=$this->request->getGet('id');
        $usermodel = new UserModel();
        $data=$usermodel->where('id',$id)->first();
        $name = $data['name'];
        $SettingsModel = new SettingsModel();
        $searchArray['id']=25;
        $EmailMessage=$SettingsModel->getData($searchArray);
        $data=$EmailMessage[0]->varvalue;
        $w1 = "##USER_NAME##";
        $w2 =  $name;
        $str = str_replace($w1, $w2, $data);
          
          
        $arrResponse['message'] = $str;
        echo json_encode($arrResponse);
        die;
      
    }

    public function sendEmail(){
        $id= $this->request->getPost('id');
        $message= $this->request->getPost('message');

         if(isset($_FILES["attachmentfile"]["name"]) && !empty($_FILES["attachmentfile"]["name"]))
               {

                    $attachmentfile = $this->request->getFile('attachmentfile');
                    $attachmentfile ->move('public/pdfcertificates');
                    $attachementfile=$attachmentfile->getName();
                }
       $data2['paymentMode'] = $this->siteVariables->getVariable('paymentMode');

       
        $UserModel= new UserModel();
        $data2['list']=$UserModel->where('id',$id)->find();
        $number=$data2['list'][0]['donation_amount'];
        $name=$data2['list'][0]['name'];
        $email=$data2['list'][0]['email'];


         $filepath="public/pdfcertificates/".$name.'_'.$id.'.pdf';
        if (file_exists($filepath)){
            unlink($filepath="public/pdfcertificates/".$name.'_'.$id.'.pdf');
        }
 //number to word convert library call
       $class_obj = new IndianCurrency();
        $convert_number = $number;
        $class_obj->set_amount($convert_number);
        $amount = $class_obj->get_words();
        $data2['amt']=$amount; 
        $certificates = view('website/pdfcertificate', $data2);
         // print_r($certificates);exit;
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($certificates);
        // $mpdf->Output($name.'_'.$id.'.pdf' ,'D');
        $mpdf->Output("public/pdfcertificates/".$name.'_'.$id.'.pdf' ,'F');

            view('website/pdfcertificate', $data2);

       $attachement="public/pdfcertificates/".$name.'_'.$id.'.pdf';

       $attachementfile=isset($attachementfile)?"public/pdfcertificates/".$attachementfile:'';
      $attachement = array("$attachement","$attachementfile");
  

              //send email to customer
                            $emailObject = new EmailSms();
                            $emailcontent = $emailObject->getMessage('email');
                            $toEmail = $email;
                            // $toEmail = 'abdulkhanrab@gmail.com';
                            $subject = $emailcontent['SUBJECT'];
                            $mailbody = $message;
                            // $mailbody = $emailcontent['BODY'];
                            // $smsbody = $emailcontent['SMS'];
                            //add email footer
                            // $mailbody .= $emailObject->getEmailFooter();
                             $mailbody = str_replace("##USER_NAME##", $name, $mailbody);
                            // $mailbody = str_replace("##OTP_NUMBER##", $randomnumber, $mailbody);
                            // $smsbody = str_replace("##OTP_NUMBER##", $randomnumber, $smsbody);
                            
//                            echo $smsbody;die;
                           // $smsreturn =  $emailObject->send_sms($userData['phone'],$smsbody); // send sms
        $emailObject->sendEmail($toEmail, $subject, $mailbody, '', '', $attachement);
      $this->session->setFlashdata('message', 'Send Email succesfully..');
         return redirect()->to(site_url('users'));
      
    }


    public function newUser() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        set_title('New Donor | ' . SITE_NAME);

        $userModel = new UserModel();
        $admin_id = $this->session->get('id');

        $data = array();
        $admin_type = $this->session->get('type');
        $data['admin_type'] = $admin_type;
        $AdminModel = new AdminModel();
        $EmergencyCasesModel = new EmergencyCasesModel();
        $branch_data=$AdminModel->select('id,name')->where('loginType','branch')->find();
        $data['branches']=$branch_data;
        $data['paymentMode'] = $this->siteVariables->getVariable('paymentMode');
        $data['ref_cases'] = $EmergencyCasesModel->where('cases_name','1')->findAll();
        $this->template->render('admintemplate', 'contents', 'admin/users/newaccount', $data);
    }

    public function editUser() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
       
        $id = $this->request->getGet("id");

        if (!$id) {
            $this->session->setFlashdata('errmessage', 'User ID number doesnot exist! Please try again.');

            return redirect()->to(site_url('users'));
        }
        set_title('Update | ' . SITE_NAME);
        $data = array();
        $userModel = new UserModel();
        $AdminModel = new AdminModel();
        $EmergencyCasesModel = new EmergencyCasesModel();
    
        //get user details
        $data['userid'] = $id;
        $userdetails = $userModel->where('id', $id)->first();
       
        $data['userdetails'] = $userdetails;
        $searchArray['user_type']='editor';
        $data['user'] = $AdminModel->getData($searchArray);
        $data['ref_cases'] = $EmergencyCasesModel->where('cases_name','1')->findAll();
        $data['paymentMode'] = $this->siteVariables->getVariable('paymentMode');

        $branch_data=$AdminModel->select('id,name')->where('loginType','branch')->find();
        $data['branches']=$branch_data;
  

// echo"<pre>";
// print_r($data['ref_cases']);exit;
        $admin_type = $this->session->get('type');

        $data['admin_type'] = $admin_type;
        if (!$data) {
            $this->session->setFlashdata('errmessage', 'Customer does not exist!');
            return redirect()->to(site_url('userlist'));
        }
        // echo "<pre>";print_r($array[0]); die();
        $this->template->render('admintemplate', 'contents', 'admin/users/editaccount', $data);
    }

    public function viewUser() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        // $session = session();

        $id = $this->request->getGet("id");

        if (!$id) {
            $this->session->setFlashdata('errmessage', 'User ID number doesnot exist! Please try again.');

            return redirect()->to(site_url('users'));
        }
        set_title('View | ' . SITE_NAME);

        $data = array();

        $userModel = new UserModel();
        $AdminModel = new AdminModel();
    
        $userdetails = $userModel->getData(array('id' => $id));
        // print_r($userdetails);die;
        $userdetails = $userdetails ? $userdetails[0] : array();
        $admin_id=$userdetails->admin_id;

        $data['userdetails'] = $userdetails;
        $cases_id=$data['userdetails']->cases_id;
         $data['userRef']=$userdetails->createname;
        
         $EmergencyCasesModel= new EmergencyCasesModel();

         $data['caseData']=$EmergencyCasesModel->where('id',$cases_id)->find();
        //echo "<pre>"; print_r($userdetails);die;
        $admin_type = $this->session->get('admin_type');
        $data['admin_type'] = $admin_type;
        $data['admin_type'] = $this->session->get('admin_type');
        $data['userid'] = $id;
        $data['paymentMode'] = $this->siteVariables->getVariable('paymentMode');

        if (!$data) {
            $this->session->setFlashdata('errmessage', 'Customer does not exist!');
            return redirect()->to(site_url('userlist'));
        }
        // echo "<pre>";print_r($array[0]); die();
        $this->template->render('admintemplate', 'contents', 'admin/users/viewaccount', $data);
    }
    public function viewEnqury() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        // $session = session();

        $id = $this->request->getGet("id");


        if (!$id) {
            $this->session->setFlashdata('errmessage', 'User ID number doesnot exist! Please try again.');

            return redirect()->to(site_url('adminenquiry'));
        }
        set_title('View | ' . SITE_NAME);

        $data = array();

        $EnquiryModel = new EnquiryModel();
      
       
        $userdetails = $EnquiryModel->getData(array('id' => $id));
          // print_r($userdetails);die;
        $userdetails = $userdetails ? $userdetails[0] : array();
         // print_r($userdetails);exit;
        $data['userdetails'] = $userdetails;
        if (!$data) {
            $this->session->setFlashdata('errmessage', 'Customer does not exist!');
            return redirect()->to(site_url('adminenquiry'));
        }
        // echo "<pre>";print_r($array[0]); die();
        $this->template->render('admintemplate', 'contents', 'admin/viewenqury', $data);
    }

    public function itUserupdate() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        // $session = session();


        $id = $this->request->getPost('userid');

        if (!$id) {
            $this->session->setFlashdata('errmessage', 'Customer does not exist!');

            return redirect()->to(site_url('users'));
        }

        $it_status = $this->request->getPost('it_status');
        $itcomment = $this->request->getPost('itcomment');
        $userModel = new UserModel();

        $arrSaveData = array(
            'it_status' => $it_status,
            'it_comment' => $itcomment,
            'it_approvedate' => date('Y-m-d H:s:i'),
        );

        //if it team accept then user account active
        if ($it_status == 'accepted') {
            $arrSaveData['user_status'] = '1';
        }
        $Update = $userModel->where('id', $id)->set($arrSaveData)->update();

        if ($Update) {

            $this->session->setFlashdata('message', 'Details updated succesfully.');

            return redirect()->to(site_url('viewuser?id=' . $id));
        } else {

            $this->session->setFlashdata('errmessage', 'Something Went Wrong! Try Again.');

            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }

    public function addUser() {
         $session = session();
        $admin_id =(isset($_POST['branch_data']) && !empty($_POST['branch_data'])) ? $this->request->getPost('branch_data') : '';
        // if(!empty($branch_data)){
        //         $admin_id=$branch_data;
            
        // }else{
        //     $admin_id = $this->session->get('id');
        // }
        
        $name = (isset($_POST['name']) && !empty($_POST['name'])) ? $this->request->getPost('name') : '';
        $payment_status = $this->request->getPost('payment_status');
        $receipt_no = (isset($_POST['receipt_no']) && !empty($_POST['receipt_no'])) ? $this->request->getPost('receipt_no') : '';
        $email =  (isset($_POST['email']) && !empty($_POST['email'])) ? $this->request->getPost('email') : '';
        $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $this->request->getPost('phone') : '';
        $pin_code = (isset($_POST['pin_code']) && !empty($_POST['pin_code'])) ? $this->request->getPost('pin_code') : '';
        $citizenship = (isset($_POST['citizenship']) && !empty($_POST['citizenship'])) ? $this->request->getPost('citizenship') : '';
        $pan_no = (isset($_POST['pan_no']) && !empty($_POST['pan_no'])) ? $this->request->getPost('pan_no') : '';
        $donation_amount = (isset($_POST['donation_amount']) && !empty($_POST['donation_amount'])) ? $this->request->getPost('donation_amount') : '';
        $date_of_birth = (isset($_POST['date_of_birth']) && !empty($_POST['date_of_birth'])) ? $this->request->getPost('date_of_birth') : '';
        $address = (isset($_POST['address']) && !empty($_POST['address'])) ? $this->request->getPost('address') : '';
        $cases_id = (isset($_POST['cases_id']) && !empty($_POST['cases_id'])) ? $this->request->getPost('cases_id'): '';
        $payment_mode =(isset($_POST['payment_mode']) && !empty($_POST['payment_mode'])) ? $this->request->getPost('payment_mode') : '';
        $txnid =(isset($_POST['txnid']) && !empty($_POST['txnid'])) ? $this->request->getPost('txnid') : '';
        $manual =(isset($_POST['editor']) && !empty($_POST['editor'])) ? $this->request->getPost('editor') : 'online';
        $bank_ref_num =(isset($_POST['bank_ref_num']) && !empty($_POST['bank_ref_num'])) ? $this->request->getPost('bank_ref_num') : '';
        $create_at =(isset($_POST['create_at']) && !empty($_POST['create_at'])) ? $this->request->getPost('create_at') : '';
        $userModel = new UserModel();
        $latdonation_id = $userModel->getNewDonationId();  // get new donation id
        if ( $name  && $email && $phone) {
        
               $arrSaveData = array(
                'name' => $name,
                'donation_id' => $latdonation_id,
                'payment_status' =>$payment_status,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'citizenship' => $citizenship,
                'pan_no' => $pan_no,
                'donation_amount' => $donation_amount,
                'date_of_birth' => $date_of_birth,
                'admin_id' => $admin_id,
                'cases_id' => $cases_id,
                'payment_mode' => $payment_mode,
                'create_at' => $create_at,
                'receipt_type' => $manual,
                'create_by' => $manual,
                'bank_ref_num' => isset($bank_ref_num)?$bank_ref_num : '',
            );

            if ($payment_status == 'Success') {
                $receipt_nocount = $userModel->getNewRecieptNo();
                $receipt_no = RECIEPT_PREFIX.$receipt_nocount;
                $arrSaveData['receipt_no']=isset($receipt_no) ? $receipt_no : '';
                $arrSaveData['recieptno_count']=isset($receipt_nocount) ? $receipt_nocount : '';
               }

            $userModel->save($arrSaveData);
    

                    $this->session->setFlashdata('message', 'Donation Record Created Successfully.');
                    return redirect()->to(site_url('users'));
        } else {
            $this->session->setFlashdata('errmessage', 'Please provide all data');
        }

        return redirect()->to(site_url('newuser'));
    }
     public function sendPdf() {

        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        // $session = session();


        $id = $this->request->getGet('id');
   
        if (!$id) {
            $this->session->setFlashdata('errmessage', 'Customer does not exist!');

            return redirect()->to(site_url('users'));
        }
        $UserModel = new UserModel();
 
            $data['list']=$UserModel->where('id',$id)->find();
             $name=$data['list'][0]['name'];
             $email=$data['list'][0]['email'];
             $attachement="public/pdfcertificates/".$name.'_'.$id.'.pdf';

               //send email to customer
                            $emailObject = new EmailSms();
                            $emailcontent = $emailObject->getMessage('email');
                            $toEmail = $email;
                            $subject = $emailcontent['SUBJECT'];
                            $mailbody = $emailcontent['BODY'];
                             $mailbody = str_replace("##USER_NAME##", $name, $mailbody);     
        $emailObject->sendEmail($toEmail, $subject, $mailbody, '', '', $attachement); // send email

          $this->session->setFlashdata('message', 'Certificate Send successfully.');
          return redirect()->to(site_url('users'));
        
          
    }

    public function updateUser() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        $id = $this->request->getPost('id');
        if (!$id) {
            $this->session->setFlashdata('errmessage', 'Customer does not exist!');

            return redirect()->to(site_url('users'));
        }

         $name = (isset($_POST['name']) && !empty($_POST['name'])) ? $this->request->getPost('name') : '';
        $payment_status = $this->request->getPost('payment_status');
        $email =  (isset($_POST['email']) && !empty($_POST['email'])) ? $this->request->getPost('email') : '';
        $receipt_no = (isset($_POST['receipt_no']) && !empty($_POST['receipt_no'])) ? $this->request->getPost('receipt_no') : '';
        $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $this->request->getPost('phone') : '';
        $citizenship = (isset($_POST['citizenship']) && !empty($_POST['citizenship'])) ? $this->request->getPost('citizenship') : '';
        $pan_no = (isset($_POST['pan_no']) && !empty($_POST['pan_no'])) ? $this->request->getPost('pan_no') : '';
        $donation_amount = (isset($_POST['donation_amount']) && !empty($_POST['donation_amount'])) ? $this->request->getPost('donation_amount') : '';
        $date_of_birth = (isset($_POST['date_of_birth']) && !empty($_POST['date_of_birth'])) ? $this->request->getPost('date_of_birth') : '';
        $address = (isset($_POST['address']) && !empty($_POST['address'])) ? $this->request->getPost('address') : '';
        $admin_id = (isset($_POST['admin_id']) && !empty($_POST['admin_id'])) ?$this->request->getPost('admin_id'): '';
        $cases_id = (isset($_POST['cases_id']) && !empty($_POST['cases_id'])) ? $this->request->getPost('cases_id'): '';
        $payment_mode =(isset($_POST['payment_mode']) && !empty($_POST['payment_mode'])) ? $this->request->getPost('payment_mode') : '';
        $donation_id =(isset($_POST['txnid']) && !empty($_POST['txnid'])) ? $this->request->getPost('txnid') : '';
        $manual =(isset($_POST['editor']) && !empty($_POST['editor'])) ? $this->request->getPost('editor') : 'online';
        $bank_ref_num =(isset($_POST['bank_ref_num']) && !empty($_POST['bank_ref_num'])) ? $this->request->getPost('bank_ref_num') : '';
        $create_at =$this->request->getPost('create_at');
        $admin_id =(isset($_POST['branch_data']) && !empty($_POST['branch_data'])) ? $this->request->getPost('branch_data') : '';

               $arrSaveData = array(
                'name' => $name,
                'payment_status' =>$payment_status,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'citizenship' => $citizenship,
                'pan_no' => $pan_no,
                'donation_amount' => $donation_amount,
                'date_of_birth' => $date_of_birth,
                'admin_id' => $admin_id,
                'cases_id' => $cases_id,
                'payment_mode' => $payment_mode,
                'donation_id' => $donation_id,
                'receipt_no' => $receipt_no,
                'receipt_type' => $manual,
                'bank_ref_num' => isset($bank_ref_num)?$bank_ref_num : '',
              
            );
            if ($create_at) {
                        $arrSaveData['create_at'] = $create_at;
                    }
           
        $userModel = new UserModel();
        $userDetails = $userModel->where('id', $id)->first();

        // if status change succes by admin and reciept number not generated then generate it
            $Update = $userModel->where('id', $id)->set($arrSaveData)->update();
        
            if ($Update) {
                $this->session->setFlashdata('message', 'Donation Record updated succesfully.');
                return redirect()->to(site_url('edituser?id=' . $id));
            } else {
                $this->session->setFlashdata('errmessage', 'Something Went Wrong! Try Again.');
                return redirect()->to($_SERVER['HTTP_REFERER']);
            }
        
    }

    public function delUser() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        // $session = session();

        $isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
        $admin_type     = $this->session->get('type');

        if($admin_type !='admin'){
            $this->session->setFlashdata('message', 'You do not have delete right.');
            return redirect()->to(site_url('users'));
        }

        $id = $this->request->getGet("id");

        $userModel = new UserModel();

        if ($isAdminLoggedIn) {
            $userModel->where('id', $id)->delete();

            $this->session->setFlashdata('message', 'Donation Record Deleted Succesfully.');
        } else {
            $this->session->setFlashdata('errmessage', 'Invalid access.');
        }
        return redirect()->to(site_url('users'));
    }

    public function deluserfile() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        // $session = session();
        $response = array("status" => false, "message" => "");
        $isAdminLoggedIn = $this->session->get('isAdminLoggedIn');

        $id = $this->request->getGet("id");
        $filetype = $this->request->getGet("filetype");

        $userModel = new UserModel();

        if ($isAdminLoggedIn) {
            $userDetail = $userModel->where('id', $id)->first();

            if ($userDetail) {
                $updatedata = array();
                if ($filetype == "idproof") {
                    $filepath = FCPATH . 'userdoc/' . $userDetail["idproof_doc"];
                    $updatedata['idproof_doc'] = "";
                } else {
                    $filepath = FCPATH . 'userdoc/' . $userDetail["gst_doc"];
                    $updatedata['gst_doc'] = "";
                }
                $userModel->set($updatedata)->where('id', $id)->update();
                unlink($filepath);
                $response["status"] = true;
                $response["message"] = "File Deleted";
            } else {
                $response["message"] = "File not exist";
            }


            // $this->session->setFlashdata('message', 'Account deleted succesfully.');
        } else {
            $response["message"] = "You are not permited";
        }

        echo json_encode($response);

        die;
    }

    public function getCity() {

        $response = array("status" => false, "message" => "");
        $isAdminLoggedIn = $this->session->get('isAdminLoggedIn');

        $stid = $this->request->getGet("stid");
        $district = ''; // $this->request->getGet("district");
        $objCity = new \App\Models\CitiesModel();

        if ($district) {
            $objCity->where('ct_disticid', $district);
        }

        $cityArray = $objCity->getData(array('stateid' => $stid));

        if ($cityArray) {
            $response["cities"] = $cityArray;
            $response["status"] = true;
            $response["message"] = "Successfully";
        } else {
            $response["message"] = "No cities found";
        }



        echo json_encode($response);

        die;
    }

    public function getDistric() {

        $response = array("status" => false, "message" => "");
        $isAdminLoggedIn = $this->session->get('isAdminLoggedIn');

        $stid = $this->request->getGet("stid");

        $objDistrics = new \App\Models\DistricsModel();

        $districArray = $objDistrics->getData(array('stateid' => $stid));

        if ($districArray) {
            $response["districs"] = $districArray;
            $response["status"] = true;
            $response["message"] = "Successfully";
        } else {
            $response["message"] = "No disctric found";
        }



        echo json_encode($response);

        die;
    }

    public function adminenquiry() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }

        set_title('Enquiry List | ' . SITE_NAME);

        $enquiryModel = new \App\Models\EnquiryModel();

        $admin_type = $this->session->get('admin_type');
        $admin_id = $this->session->get('admin_id');

        $data['pagetitle'] = "Enquiry List";
        $data['action'] = "adminenquiry";

        $txtsearch = $this->request->getGet('txtsearch');
        $searchArray = array();
        $paginationnew = new Paginationnew();

        if ($txtsearch) {
            $searchArray['txtsearch'] = $txtsearch;
        }
        $page = $this->request->getGet('page');
        $page = $page ? $page : 1;
        $Limit = PER_PAGE_RECORD;
        $totalRecord = $enquiryModel->getData($searchArray, '', '', 1); // return count value

        $startLimit = ($page - 1) * $Limit;
        $data['startLimit'] = $startLimit;

        $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
        $data['txtsearch'] = $txtsearch;
        $data['startLimit'] = $startLimit;
        $data['pagination'] = $pagination;
        $data["salesData"] = $enquiryModel->getData($searchArray, $startLimit, $Limit);
        $data["searchArray"] = $searchArray;

        $this->template->render('admintemplate', 'contents', 'admin/enquiry', $data);
    }

    public function delEnquiry() {
        if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }
        $enquiryModel = new \App\Models\EnquiryModel();
        $id = $this->request->getGet("id");

        $enquiryModel->where('id', $id)->delete();
        $this->session->setFlashdata('message', 'Enquiry deleted succesfully.');

        return redirect()->to(site_url('adminenquiry'));
    }

    public function customerexportexcel() {

        $usermodel = new UserModel();
        $searchArray = array();
   
        $txtsearch = $this->request->getGet('txtsearch');
        $branch_data = $this->request->getGet('branch_data');
         $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');
        $receipt_type = $this->request->getGet('receipt_type');

        $payment_status    = $this->request->getGet('payment_status');
        if($payment_status){
            $searchArray['payment_status'] = $payment_status;
        }

         if ($receipt_type) {
            $searchArray['receipt_type'] = $receipt_type;
        }
       

       
        if($start_date) {
            $searchArray['start_date'] = $start_date;
           
        }
        if($end_date) {
           $searchArray['end_date'] = $end_date;
        }
          if ($branch_data) {
            $searchArray['branch_data'] = $branch_data;
        }
       
        if ($txtsearch) {
            $searchArray['txtsearch'] = $txtsearch;
        }
        $totalRecord = $usermodel->getData($searchArray, '', '', 1); // return count value

        $startLimit = 0;
        $Limit = $totalRecord;
        $usersData = $usermodel->getData($searchArray, $startLimit, $Limit);

         //echo "<pre>"; print_r($usersData);exit;

        $spreadsheet = new Spreadsheet();
      
        $sheet = $spreadsheet->getActiveSheet();
        $cellrow = 1;

        // column heading
         $sheet->setCellValue('A' . $cellrow, "Receipt number");
        $sheet->setCellValue('B' . $cellrow, "Date");
        // $sheet->setCellValue('C' . $cellrow, "Team name");
        $sheet->setCellValue('D' . $cellrow, "Donor name");
        $sheet->setCellValue('E' . $cellrow, "Mobile number");
        $sheet->setCellValue('F' . $cellrow, "Transaction detail");
        $sheet->setCellValue('G' . $cellrow, "Bank Reference Number");
        $sheet->setCellValue('H' . $cellrow, "Amount");
        $sheet->setCellValue('I' . $cellrow, "Email id");
        $sheet->setCellValue('J' . $cellrow, "Pan number/Aadhar card");
        $sheet->setCellValue('K' . $cellrow, "DOB");
        $sheet->setCellValue('L' . $cellrow, "Address");
        $sheet->setCellValue('M' . $cellrow, "Payment Status");
        $j = 1;
        for ($i = 0; $i < $totalRecord; $i++) {
            $j = $j + 1;
            $sheet->setCellValue('A' . $j, $usersData[$i]->receipt_no);
            $sheet->setCellValue('B' . $j, $usersData[$i]->create_at);
            // $sheet->setCellValue('C' . $j, $usersData[$i]->name );
            $sheet->setCellValue('D' . $j, $usersData[$i]->name);
            $sheet->setCellValue('E' . $j, $usersData[$i]->phone);
            $sheet->setCellValue('F' . $j, 'K'.$usersData[$i]->donation_id);
            $sheet->setCellValue('G' . $j, $usersData[$i]->bank_ref_num);
            $sheet->setCellValue('H' . $j, $usersData[$i]->donation_amount);
            $sheet->setCellValue('I' . $j, $usersData[$i]->email);
            $sheet->setCellValue('J' . $j, $usersData[$i]->pan_no);
            $sheet->setCellValue('K' . $j, $usersData[$i]->date_of_birth);
            $sheet->setCellValue('L' . $j, $usersData[$i]->address);
            $sheet->setCellValue('M' . $j, $usersData[$i]->payment_status);
        }
        $fileName = 'customerslist_' . date('d-m-y') . ".xlsx";

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');

        $writer->save('php://output');
        die;
    }

    public function usersexportexcel() {

        $admin_type = $this->session->get('admin_type');
        $admin_id = $this->session->get('admin_id');
        $arraccountype = $this->siteVariables->getVariable('accountype');
        //if sales head then get data according to him
        $saleshead = "";
        if ($admin_type == "saleshead") {
            //	$saleshead = $admin_id;
        }

        $txtsearch = $this->request->getGet('txtsearch');
        $user_type = $this->request->getGet('user_type');
        $searchArray = array();

        $searchArray['saleshead'] = $saleshead;

        if ($user_type) {
            $searchArray["user_type"] = $user_type;
        }

        if ($txtsearch) {
            $searchArray['txtsearch'] = $txtsearch;
        }

        $totalRecord = $this->adminModel->getData($searchArray, '', '', 1); // return count value

        $startLimit = 0;
        $Limit = $totalRecord;
        $usersData = $this->adminModel->getData($searchArray, $startLimit, $Limit);

        // echo "<pre>"; print_r($usersData);die;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $cellrow = 1;

        // column heading
        $sheet->setCellValue('A' . $cellrow, "Name");
        $sheet->setCellValue('B' . $cellrow, "Email");
        $sheet->setCellValue('C' . $cellrow, "Mobile");
        $sheet->setCellValue('D' . $cellrow, "Role");
        $j = 1;
        for ($i = 0; $i < $totalRecord; $i++) {
            $j = $j + 1;
            $role = isset($arraccountype[$usersData[$i]->admin_type]) ? $arraccountype[$usersData[$i]->admin_type] : '';
            $sheet->setCellValue('A' . $j, $usersData[$i]->fname);
            $sheet->setCellValue('B' . $j, $usersData[$i]->email);
            $sheet->setCellValue('C' . $j, $usersData[$i]->phone);
            $sheet->setCellValue('D' . $j, $role);
        }
        $fileName = 'userslist_' . date('d-m-y') . ".xlsx";
        // $outputFileName = FCPATH.'download_excel/'.$fileName;

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
        $writer->save('php://output');
        die;
    }

    public function enquiryexportexcel() {

        $enquiryModel = new \App\Models\EnquiryModel();

        $admin_type = $this->session->get('admin_type');
        $admin_id = $this->session->get('admin_id');

        $txtsearch = $this->request->getGet('txtsearch');
        $searchArray = array();

        if ($txtsearch) {
            $searchArray['txtsearch'] = $txtsearch;
        }

        $totalRecord = $enquiryModel->getData($searchArray, '', '', 1); // return count value
        $startLimit = 0;
        $Limit = $totalRecord;

        $enquieryData = $enquiryModel->getData($searchArray, $startLimit, $Limit);

        //    echo "<pre>"; print_r($enquieryData);die;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $cellrow = 1;

        // column heading
        $sheet->setCellValue('A' . $cellrow, "Studio Name");
        $sheet->setCellValue('B' . $cellrow, "Mobile");
        $sheet->setCellValue('C' . $cellrow, "State");
        $sheet->setCellValue('D' . $cellrow, "Description");
        $sheet->setCellValue('E' . $cellrow, "Date");
        $j = 1;
        for ($i = 0; $i < $totalRecord; $i++) {
            $j = $j + 1;

            $sheet->setCellValue('A' . $j, $enquieryData[$i]->en_studioname);
            $sheet->setCellValue('B' . $j, $enquieryData[$i]->en_mobile);
            $sheet->setCellValue('C' . $j, $enquieryData[$i]->st_name);
            $sheet->setCellValue('D' . $j, $enquieryData[$i]->en_description);
            $sheet->setCellValue('E' . $j, $enquieryData[$i]->en_date);
        }
        $fileName = 'Enquirylist_' . date('d-m-y') . ".xlsx";
        $outputFileName = FCPATH . 'download_excel/' . $fileName;

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
        $writer->save('php://output');
        die;
    }

     public function previewUser() {
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
        $userModel = new AdminModel();
        $data['userdetails'] = $userModel->find($id);
        $this->template->render('admintemplate', 'contents', 'admin/previewuser', $data);
    }

    public function refUrl(){
        $session = session();
        $admin_id = $this->session->get('id');
        $AdminModel = new AdminModel();
        $data['userdetails'] = $AdminModel->find($admin_id);
       


        $this->template->render('admintemplate', 'contents', 'admin/userurl',$data);
    }

      public function ShowCertificate(){
        $UserModel= new UserModel();
        $id = $this->request->getGet('id');
         $data2['list']=$UserModel->where('id',$id)->find();
          // echo"<pre>";
          // var_dump($data2['list']);die;
        $number=$data2['list'][0]['donation_amount'];



 //number to word convert library call
        $class_obj = new IndianCurrency();
        $convert_number = $number;
        $class_obj->set_amount($convert_number);
        $amount = $class_obj->get_words();
        $data2['amt']=$amount; 
        $Pdfdata = view('website/pdfcertificate',$data2);
           // print_r($Pdfdata);exit;
          
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($Pdfdata);
         $this->response->setHeader('Content-Type', 'application/pdf');
         $mpdf->Output('arjun.pdf','I'); 
         return view('website/pdfcertificate',$data2);
    
       


        $this->template->render('admintemplate', 'contents', 'admin/userurl',$data);
    }

    public function updateReciept()
    {
        $usermodel = new UserModel();
        $search['payment_status'] ='Success';
        $search['order_by'] ='id ASC';
        $userData = $usermodel->getData($search);
        $startRcNo = 81315;
        $i=1;
        foreach($userData as $userdetail)
        {
            $updateData = array("receipt_no"=>"KKN-".$startRcNo,"recieptno_count"=>$startRcNo);

            $usermodel->set($updateData)->where("id",$userdetail->id)->update();

       //   echo "<pre>";  
          
       //   print_r($updateData);
         

          $startRcNo++;

          

            $i++;
        }
        echo $i;

    }

}
