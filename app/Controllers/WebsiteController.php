<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use App\Models\UserModel;
use App\Models\EnquiryModel;
use App\Models\Volunteer_model;
use App\Models\MenucategoryModel;
use App\Models\EmergencyCasesModel;
use App\Models\AdminModel;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Libraries\SiteVariables;
use CodeIgniter\Cookie\Cookie;
use App\Libraries\EmailSms;
use App\Libraries\Numbertoword;
use App\Libraries\IndianCurrency;
use App\Models\SettingsModel;
use App\Models\GalleryModel;
use App\Models\OurGallery_model;
use App\Models\CertificatesModel;
use App\Models\NewsEventsModel;
use Mpdf\Mpdf;
require FCPATH. '/vendor/autoload.php';

class WebsiteController extends BaseController {

    protected $session;
    protected $isUserLoggedIn;

    public function __construct() {
       $this->session = session();
        $this->isUserLoggedIn = $this->session->get('isUserLoggedIn');
    }

    public function index() {
        $metatag = array('keywords'=>'','description'=>'','content'=>'');
        set_title('Welcome | ' . SITE_NAME);
        //for seoo purpose
         $metatag['keywords'] .= "cdf, NGO, ngo, Ngo in India for Child, Donate Online for Child,COSMO LOGICAL FOUNDATION ";
         $metatag['description'] .= "COSMO LOGICAL FOUNDATION NGO Non Profit Charitable Organisation";
         $metatag['content'] .= "COSMO LOGICAL FOUNDATION NGO Non Profit Charitable Organisation";
        set_metas($metatag);
        
        $data = array();
         $this->template->render('websitetemplate', 'contents', 'website/index', $data);
    }
    
 public function ContactUs() {
     
     set_title('Contact us | ' . SITE_NAME);
     $data = array();
        
     $this->template->render('websitetemplate', 'contents', 'website/contactus', $data);
     
 }
 

    public function forgotpass() {
        set_title('Ngo in India for Child | Donate Online for Child');

        $errorMsg = "";
        $method = $this->request->getMethod();

        $userModel = new UserModel();

        if ($method == 'post') {
            $username = $this->request->getPost("username");
            if ($username) {

                $userData = $userModel->where("phone", $username)->first();
                if ($userData) {
                    //print_r($userData);
                    if ($userData['email']) {
                        
                        $userid = $userData["id"];
                        $temp_pass = rand(100,1000000);
                        $updatedata = array("password" => password_hash($temp_pass, 1),);
                        $userModel->set($updatedata)->where("id", $userid)->update();

                        $emailSms = new EmailSms();
                        $forgotMessage = $emailSms->getMessage('forgotpassword');
                        
                        $EmailSubject =  $forgotMessage['SUBJECT'];
                        
                        $EmailContent =$forgotMessage['BODY'];
                        $EmailContent = str_replace("##USER_NAME##",$userData['fname'], $EmailContent);
                        $EmailContent = str_replace("##PASS_WORD##", $temp_pass, $EmailContent);
                      
                        $emailSms->sendEmail($userData['email'], $EmailSubject, $EmailContent);

                        $this->session->setFlashdata('message', 'Email sent. Please check your email account.');
                    }
                } else {
                    $this->session->setFlashdata('errmessage', 'Invalid mobile number.');
                }
            } else {
                $this->session->setFlashdata('errmessage', 'Please provide mobile no.');
            }
        }

        $this->template->render('usertemplate', 'contents', 'user/forgotpass', array("errorMsg" => $errorMsg));
    }



    

    public function saveEnqury() {
        set_title('Welcome | ' . SITE_NAME);
      

        $method = $this->request->getMethod();
        if ($method == 'post') {
            $name = $this->request->getPost("name");
            $phone = $this->request->getPost("number");
            $email = $this->request->getPost("email");
            $description = $this->request->getPost("message");
            
            if ($name && $phone && $description) {
                $enquiry = new \App\Models\EnquiryModel();

                $arrEnquiry = array(
                    "name" => $name,
                    "phone" => $phone,
                    "email" => $email,
                    "description" => $description,
                );
                $enquiry->save($arrEnquiry);

                $this->session->setFlashdata('message', 'Enquiry sent successfully!');
            } else {
                $this->session->setFlashdata('errmessage', 'Please provide all data');
            }
        }

        return redirect()->to(site_url('../contact#showmsg'));
    }

    public function testemail()
    {
        set_title('Welcome | ' . SITE_NAME);
        $data = array();
        
        $email = new EmailSms();
        $emailcontent = $email->getMessage('order');
        $toEmail = "subedar.genie@gmail.com";
        $subject = $emailcontent['SUBJECT'];
        $mailbody = $emailcontent['BODY'];
        
         $subject = str_replace("##ORDER_ID##", site_url(), $subject);
         
        $mailbody = str_replace("##USER_NAME##", "Subedar Yadav", $mailbody);
        
        $mailbody = str_replace("##ORDER_ID##", site_url(), $mailbody);
//        echo $mailbody;die;
        $email->sendEmail($toEmail, $subject, $mailbody);
        die;
        }

    public function pageNotFound(){
     

         $pagename = "nopage";
           
            $this->template->render('websitetemplate', 'contents', 'website/'.$pagename);
    }
     public function donation(){
     
            $refid = $this->request->getGet('refid');
            $data['refid'] =  !empty($refid) ? $refid : '';
            $data['emergencyCase'] = $this->request->getGet("emergencyCase");

           
            $this->template->render('websitetemplate', 'contents', 'website/donation',$data);
    }

   
    public function contactForm(){
     
        $formArr = array();   
        $formArr['name'] = $name = (isset($_POST['name']) && !empty($_POST['name'])) ? $this->request->getPost('name') : '';
        $formArr['email'] = $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $this->request->getPost('email') : '';
        $formArr['phone'] = $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $this->request->getPost('phone') : '';
        $formArr['subject'] = $subject1 = (isset($_POST['subject']) && !empty($_POST['subject'])) ? $this->request->getPost('subject') : '';
        $formArr['description'] = $description = (isset($_POST['description']) && !empty($_POST['description'])) ? $this->request->getPost('description') : '';
        // print_r($formArr);exit;
 if ($name=="" || $email=="" || $phone=="" || $subject1=="") {
                $this->session->setFlashdata('errmessage', 'Please Provide All field try again...');
                return redirect()->to(base_url('contactus'));
            }

        $emailObject = new EmailSms();

                             $emailcontent = $emailObject->getMessage('toadmin');
                             
                            
                            $email = $email;
                            $phone = $phone;
                            $name = $name;
                            $subject1= $subject1;
                            $description = $description;
                            
                            $subject = $emailcontent['SUBJECT'];
                            $mailbody = $emailcontent['BODY'];
                         
                            $mailbody = str_replace("##USER_NAME##", $name, $mailbody);
                            $mailbody = str_replace("##EMAIL##", $email, $mailbody);
                            $mailbody = str_replace("##PHONE##", $phone, $mailbody);
                              $mailbody = str_replace("##CATEGORY##", $subject1, $mailbody);
                                $mailbody = str_replace("##DESCRIPTION##", $description, $mailbody);
                           
                            $emailObject->sendadminEmail($subject, $mailbody); 

        $EnquiryModel= new EnquiryModel();
        $EnquiryModel->insert($formArr);
        $this->session->setFlashdata('message', 'Thank you for your message. It has been sent..');
     return redirect()->to(base_url('contactus'));
         



    }

     public function PaymentCheckout(){
     
        $formArr = array();   
        $formArr['name'] = $name = (isset($_POST['name']) && !empty($_POST['name'])) ? $this->request->getPost('name') : '';
        $formArr['email'] = $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $this->request->getPost('email') : '';
        $formArr['phone'] = $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? $this->request->getPost('phone') : '';
        $formArr['address'] = $address = (isset($_POST['address']) && !empty($_POST['address'])) ? $this->request->getPost('address') : '';
        $formArr['pan_no'] = $pan_no = (isset($_POST['pan_no']) && !empty($_POST['pan_no'])) ? $this->request->getPost('pan_no') : '';
        // $formArr['donation_amount'] = $donation_amount = (isset($_POST['amount']) && !empty($_POST['amount'])) ? $this->request->getPost('amount') : '';
        $formArr['donation_amount'] = $custom_amount = (isset($_POST['custom_amount']) && !empty($_POST['custom_amount'])) ? $this->request->getPost('custom_amount') : '2000';
        $ref_key = (isset($_POST['ref_key']) && !empty($_POST['ref_key'])) ? $this->request->getPost('ref_key') : '';
        $formArr['cases_id'] =$cases_id= (isset($_POST['emergencyCase']) && !empty($_POST['emergencyCase'])) ? $this->request->getPost('emergencyCase') : '';
// print_r($ref_key);exit;
         if(!empty($ref_key) && $ref_key != 'null' ){
            $AdminModel= new AdminModel();
            $refid = $AdminModel->select('id')->where('uniqueKey',$ref_key)->find();
            if($refid){

                $formArr['admin_id'] = $refid[0]['id'];
            }
 
         }
      
        $UserModel= new UserModel();

        $formArr['donation_id'] = $UserModel->getNewDonationId();
        
        $UserModel->insert($formArr);
        $id = $UserModel->getInsertID();
     
     
      

    $merchant_key  = "4C7In92E";
    $salt          = "vCG91fHsOn";
    $payu_base_url = "https://secure.payu.in"; 
    //$payu_base_url = "https://sandboxsecure.payu.in"; 
    $action        = '';
    //$currentDir    = 'http://localhost/creative/payment/payumoney/';
    $posted = array();
    $posted['firstname']= $this->request->getPost('name');
    $posted['email']    = $this->request->getPost('email');
    $posted['phone']    = $this->request->getPost('phone');
    $posted['country']  = $this->request->getPost('country');
    $posted['state']    = $this->request->getPost('state');
    $posted['city']     = $this->request->getPost('city');
    $posted['zipcode']  = $this->request->getPost('pin_code');
    $posted['citizenship']= $this->request->getPost('citizenship');
    $posted['address']  = $this->request->getPost('address');
    $posted['pan_no']   = $this->request->getPost('pan_no');
    $posted['date_of_birth']= $this->request->getPost('date_of_birth');
    $posted['amount']   = $this->request->getPost('custom_amount');
    $txnid = $formArr['donation_id'];
    // $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
     //$txnid = hash('sha256',$latdonation_id);
     //print_r($txnid);exit;
    
    $posted['txnid'] = $txnid;
    $posted['key']  = $merchant_key;
    $posted['productinfo'] = 'prod';
    $posted['surl'] = base_url().'/paymentSuccess';
    $posted['furl'] = base_url().'/paymentFailures';

    $hash         = '';
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';  
        foreach($hashVarsSeq as $hash_var) {
          $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
          $hash_string .= '|';
        }
        $hash_string .= $salt;
        // print_r($hash_string    );EXIT;

        $hash = strtolower(hash('sha512', $hash_string));
        $action = $payu_base_url . '/_payment';
        // $posted['hash']=$hash;

     
   
return view('website/payment_checkout',['user_id'=>$id,'cases_id'=>$cases_id,'merchant_key'=>$merchant_key,'txnid'=>$txnid,'hash'=>$hash,'posted'=>$posted,'action'=>$action]);


    }

    public function paymentSuccess(){
        // echo"<pre>";
        // print_r($_POST);exit;

      $UserModel= new UserModel();
       $status=$_POST["status"];
       $status='Success';
       $unmappedstatus=$_POST["unmappedstatus"];
       $cases_id=isset($_POST['address2'])?$this->request->getPost('address2'):'';
       $donation_amount=isset($_POST['amount'])?$this->request->getPost('amount'):'';

       $name = $_POST["firstname"];
        $txnid = $_POST["txnid"];
        $posted_hash = $_POST["hash"];
        $error_Message = isset($_POST['error_Message'])?$this->request->getPost('error_Message'):'';
        $payment_source = isset($_POST['payment_source'])?$this->request->getPost('payment_source'):'';
        $addedon = isset($_POST['addedon'])?$this->request->getPost('addedon'):'';
        $id = isset($_POST['lastname'])?$this->request->getPost('lastname'):'';
         $bankcode = isset($_POST['bankcode'])?$this->request->getPost('bankcode'):'';
         $PG_TYPE = isset($_POST['PG_TYPE'])?$this->request->getPost('PG_TYPE'):'';
         $field1 = isset($_POST['field1'])?$this->request->getPost('field1'):'';
         $field2 = isset($_POST['field2'])?$this->request->getPost('field2'):'';
         $field3 = isset($_POST['field3'])?$this->request->getPost('field3'):'';
         $field4 = isset($_POST['field4'])?$this->request->getPost('field4'):'';
         $field5 = isset($_POST['field5'])?$this->request->getPost('field5'):'';
         $field6 = isset($_POST['field6'])?$this->request->getPost('field6'):'';
         $field7 = isset($_POST['field7'])?$this->request->getPost('field7'):'';
         $field8 = isset($_POST['field8'])?$this->request->getPost('field8'):'';
         $field9 = isset($_POST['field9'])?$this->request->getPost('field9'):'';
         $mode = isset($_POST['mode'])?$this->request->getPost('mode'):'';
         $bank_ref_num = isset($_POST['bank_ref_num'])?$this->request->getPost('bank_ref_num'):'';

 $data=array(
        'payment_status'=>$status,
        'txnid'=>$txnid,
         'posted_hash'=>$posted_hash,
        'error_Message'=>$error_Message,
        'payment_source'=>$payment_source,
        'addedon'=>$addedon,
         'bankcode'=>$bankcode,
         'PG_TYPE'=>$PG_TYPE,
         'field1'=>$field1,
         'field2'=>$field2,
         'field3'=>$field3,
         'field4'=>$field4,
         'field5'=>$field5,
         'field6'=>$field6,
         'field7'=>$field7,
         'field8'=>$field8,
         'field9'=>$field9,
         'mode'=>$mode,
         'bank_ref_num'=>$bank_ref_num,
         'unmappedstatus'=>$unmappedstatus
        );
      $UserModel->updateStatus($id,$data);
      

      $UserModelNew = new UserModel();
      $Donationdata = $UserModelNew->where('id',$id)->first();
      $donation_id = $Donationdata['donation_id'];

      //update user reciept details recieptno_count
      $receipt_no_exist = $Donationdata['recieptno_count'];
      
      if($receipt_no_exist < 1)
      {
        $receipt_nocount = $UserModelNew->getNewRecieptNo();
        $receipt_no = RECIEPT_PREFIX.$receipt_nocount;

        $reciept_detail = array(
        'receipt_no' =>  $receipt_no,
         'recieptno_count' =>$receipt_nocount,
        );
        $UserModelNew->updateStatus($id,$reciept_detail);
        $UserModelNew->writeinFile(" userid -".$id ."  recipt no ".$receipt_nocount);
      }

      $data2['list'] = $UserModel->where('id',$id)->find();
      $number = $data2['list'][0]['donation_amount'];

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

              //send email to customer
                            $emailObject = new EmailSms();
                            $emailcontent = $emailObject->getMessage('email');
                            $toEmail = $_POST['email'];
                            // $toEmail = 'abdulkhanrab@gmail.com';
                            $subject = $emailcontent['SUBJECT'];
                            $mailbody = $emailcontent['BODY'];
                            // $smsbody = $emailcontent['SMS'];
                            //add email footer
                            // $mailbody .= $emailObject->getEmailFooter();
                             $mailbody = str_replace("##USER_NAME##", $name, $mailbody);
                            // $mailbody = str_replace("##OTP_NUMBER##", $randomnumber, $mailbody);
                            // $smsbody = str_replace("##OTP_NUMBER##", $randomnumber, $smsbody);
                            
//                            echo $smsbody;die;
                           // $smsreturn =  $emailObject->send_sms($userData['phone'],$smsbody); // send sms
        $emailObject->sendEmail($toEmail, $subject, $mailbody, '', '', $attachement); // send email

          if($cases_id){
                //cases reach amount update
            $EmergencyCasesModel= new EmergencyCasesModel();
            

                $EmergencyCasesdata=$EmergencyCasesModel->where('id',$cases_id)->find();
                $oldReachAmount=$EmergencyCasesdata[0]['reach'];
                $totalReachAmount=$oldReachAmount+$donation_amount;
                $caseArray= array('reach'=>$totalReachAmount);
                $EmergencyCasesModel->set($caseArray)->where('id',$cases_id)->update();
            }

        $data1['bank_ref_num']=$bank_ref_num;
        $data1['txnid']=$donation_id;
        $data1['donation_amount']=$donation_amount;
     $this->template->render('websitetemplate', 'contents', 'website/payment_success',$data1);

  }  

    public function paymentFailures(){
       $UserModel= new UserModel();
      $status=$_POST["status"];
       $status='Failed';
       $unmappedstatus=$_POST["unmappedstatus"];

       $name=$_POST["firstname"];
        $txnid=$_POST["txnid"];
        $posted_hash=$_POST["hash"];
        $error_Message=isset($_POST['error_Message'])?$this->request->getPost('error_Message'):'';
        $payment_source=isset($_POST['payment_source'])?$this->request->getPost('payment_source'):'';
        $addedon=isset($_POST['addedon'])?$this->request->getPost('addedon'):'';
        $id=isset($_POST['lastname'])?$this->request->getPost('lastname'):'';
         $bankcode=isset($_POST['bankcode'])?$this->request->getPost('bankcode'):'';
         $PG_TYPE=isset($_POST['PG_TYPE'])?$this->request->getPost('PG_TYPE'):'';
         $field1=isset($_POST['field1'])?$this->request->getPost('field1'):'';
         $field2=isset($_POST['field2'])?$this->request->getPost('field2'):'';
         $field3=isset($_POST['field3'])?$this->request->getPost('field3'):'';
         $field4=isset($_POST['field4'])?$this->request->getPost('field4'):'';
         $field5=isset($_POST['field5'])?$this->request->getPost('field5'):'';
         $field6=isset($_POST['field6'])?$this->request->getPost('field6'):'';
         $field7=isset($_POST['field7'])?$this->request->getPost('field7'):'';
         $field8=isset($_POST['field8'])?$this->request->getPost('field8'):'';
         $field9=isset($_POST['field9'])?$this->request->getPost('field9'):'';
         $mode=isset($_POST['mode'])?$this->request->getPost('mode'):'';
         $bank_ref_num=isset($_POST['bank_ref_num'])?$this->request->getPost('bank_ref_num'):'';
  
    // echo "<h3>Your Transaction status is ". $status .".</h3>";
    // echo "<h4>Your transaction id for this transaction is ".$txnid.". </h4>";

          $data=array(
        'payment_status'=>$status,
        'txnid'=>$txnid,
         'posted_hash'=>$posted_hash,
        'error_Message'=>$error_Message,
        'payment_source'=>$payment_source,
        'addedon'=>$addedon,
         'bankcode'=>$bankcode,
         'PG_TYPE'=>$PG_TYPE,
         'field1'=>$field1,
         'field2'=>$field2,
         'field3'=>$field3,
         'field4'=>$field4,
         'field5'=>$field5,
         'field6'=>$field6,
         'field7'=>$field7,
         'field8'=>$field8,
         'field9'=>$field9,
         'mode'=>$mode,
         'bank_ref_num'=>$bank_ref_num,
         'unmappedstatus'=>$unmappedstatus,

        );

        $check =$UserModel->updateStatus($id,$data);  
      $this->template->render('websitetemplate', 'contents', 'website/payment_failed');
      

      

    }
    public function pdf(){
        $UserModel= new UserModel();
        $id=1;
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
        // $mpdf->Output($name.'_'.$id.'.pdf' ,'D');
        // $mpdf->Output("public/pdfcertificates/".$name.'_'.$id.'.pdf' ,'F');
        //      view('website/pdfcertificate', $data2);
    }




    public function whoweAre() {

        set_title('Who We Are | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/whoweare');
    }

    public function edp() {

        set_title('EDP | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/edp');
    }
    public function fightingforair() {

         set_title('Fighting for Air | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/fightingforair');
    }

    public function renewableenergy() {

        set_title('Renewable Energy | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/renewableenergy');
    }
    public function ruralsanitation() {
        set_title('Rural Sanitation | ' . SITE_NAME);
        
        $this->template->render('websitetemplate', 'contents', 'website/ruralsanitation');
    }
    public function drinkingwater() {

        set_title('Drinking Water | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/drinkingwater');
    }
    public function cases() {

        
        $this->template->render('websitetemplate', 'contents', 'website/cases');
    }
    public function events() {

        set_title('Events | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/events');
    }
    public function joy_of_giving_week() {

        set_title('Events | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/joy_of_giving_week');
    }
    public function sanitary_napkins() {

        set_title('Events | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/sanitary_napkins');
    }
    public function adopt_a_tree() {

        set_title('Events | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/adopt_a_tree');
    }
    public function volunteer() {

        set_title('Volunteer | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/volunteer');
    }
    public function contact() {

        set_title('Contact | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/contact');
    }
    public function bank_details() {

        set_title('Donation | ' . SITE_NAME);
        $this->template->render('websitetemplate', 'contents', 'website/bank_details');
    }
   


    public function testnum()
    {
        $id=14174;

        $UserModelNew = new UserModel();
      $Donationdata = $UserModelNew->where('id',$id)->first();
      $donation_id = $Donationdata['donation_id'];
print_r( $Donationdata );die;
      //update user reciept details
    echo  $receipt_no_exist = $Donationdata['receipt_nocount'];
      die;
      if($receipt_no_exist < 1)
      {
        $receipt_nocount = $UserModelNew->getNewRecieptNo();
        $receipt_no = RECIEPT_PREFIX.$receipt_nocount;

        $reciept_detail = array(
        'receipt_no' =>  $receipt_no,
         'recieptno_count' =>$receipt_nocount,
        );
        $UserModelNew->updateStatus($id,$reciept_detail);
        $UserModelNew->writeinFile(" userid -".$id ."  recipt no ".$receipt_nocount);
      }
        
    }

    public function savevolunteer()
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
                 "mob_number"=>$postdata['mob_number'],
             );
             // if banner uploaded then add / replace it
             if($newfilenameName)
             {
                 $data['doc_upload'] = $newfilenameName;
             } 
            $Volunteer_model=new Volunteer_model();
            $Volunteer_model->save($data);

            $this->session->setFlashdata('message', 'message sent successfully.');
            return redirect()->to(site_url('../volunteer#showmsg'));

        }
    }

}