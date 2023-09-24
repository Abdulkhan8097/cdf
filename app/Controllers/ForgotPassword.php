<?php
namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Models\AdminModel;
use App\Libraries\EmailSms;

class ForgotPassword extends BaseController {
    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }
    public function forgot_password() {

        set_title('Forgot Password | ' . SITE_NAME);
            return view('forgot-password');
    }
    public function changepassword() {

        set_title('Change Password | ' . SITE_NAME);
            return view('change-password');
    }
    public function resetpasswordadmin() {
        $password= $this->request->getPost('password');
        $password2= $this->request->getPost('password2');
        $uniqueKey= $this->request->getPost('ps');
        if($password == $password2){
            $AdminModel= new AdminModel();
            $data=$AdminModel->where('uniqueKey',$uniqueKey)->first();
            // print_r($data);exit;
            if($data){
                $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $ref_key = "S";
                for ($i = 0; $i < 8; $i++) {
                   $ref_key .= $chars[mt_rand(0, strlen($chars)-1)];
                   } 
                $arrSaveData = array(
                    'password' => password_hash($password, 1),
                    'uniqueKey' => $ref_key,
                ); 
              
                $check=$AdminModel->set($arrSaveData)->where('uniqueKey',$uniqueKey)->update();
                if(!empty($check)){
                    $this->session->setFlashdata('message', 'Password Reset succesfully..');
                }
            }else{
                $this->session->setFlashdata('errmessage', 'Something went wrong..');
            return redirect()->to(site_url('changepassword?ps='.$uniqueKey));
            }
        }else{
            $this->session->setFlashdata('errmessage', 'Password Not Match..');
            return redirect()->to(site_url('changepassword?ps='.$uniqueKey));
        }
        return redirect()->to(site_url('changepassword?ps='.$uniqueKey));
    }
    public function resetp() {

            $email= $this->request->getPost('email');
            $AdminModel= new AdminModel();
           $data=$AdminModel->where('email',$email)->first();
           $name=$data['name'];
           $uniqueKey=$data['uniqueKey'];
           if(empty($data)){
            $this->session->setFlashdata('errmessage', 'Password Incorrect..');
          return redirect()->to(site_url('forgot-password'));
           }

            
                                $emailObject = new EmailSms();
                                $emailcontent = $emailObject->getMessage('forgot');
                                $toEmail = $email;
                                $subject = $emailcontent['SUBJECT'];
                                $mailbody = $emailcontent['BODY'];
                                $url=base_url('changepassword?ps='.$uniqueKey);
                                // $mailbody = $emailcontent['BODY'];
                                // $smsbody = $emailcontent['SMS'];
                                //add email footer
                                // $mailbody .= $emailObject->getEmailFooter();
                                 $mailbody = str_replace("##USER_NAME##", $name, $mailbody);
                                $mailbody = str_replace("##action_url##", $url, $mailbody);
                                // $smsbody = str_replace("##OTP_NUMBER##", $randomnumber, $smsbody);
                                
    //                            echo $smsbody;die;
                               // $smsreturn =  $emailObject->send_sms($userData['phone'],$smsbody); // send sms
            $emailObject->sendEmail($toEmail, $subject, $mailbody, '', '', '');
          $this->session->setFlashdata('message', 'Send Email succesfully..');
          return redirect()->to(site_url('forgot-password'));
     
          
        
           
    }
}