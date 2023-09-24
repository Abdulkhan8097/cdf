<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use App\Models\UserModel;
use App\Models\OrdersModel;
use App\Models\OrdersproductsModel;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Libraries\SiteVariables;
use CodeIgniter\Cookie\Cookie;
use App\Libraries\EmailSms;

class UserController extends BaseController {

    protected $session;
    protected $isUserLoggedIn;

    public function __construct() {
        $this->session = session();
        $this->isUserLoggedIn = $this->session->get('isUserLoggedIn');
    }

    public function index() {
        set_title('Welcome | ' . SITE_NAME);

        if ($this->isUserLoggedIn) {
            return redirect()->to(site_url('userdashboard'));
        }
    }

    public function login() {
        set_title('Welcome | ' . SITE_NAME);
        $data = array();
        if ($this->isUserLoggedIn) {
            return redirect()->to(site_url('userdashboard'));
        }

        if (isset($_COOKIE['userremember'])) {
            $data['userremember'] = $_COOKIE['userremember'];
            $data['cameronuser'] = $_COOKIE['cameronuser'];
            $data['cameronpass'] = $_COOKIE['cameronpass'];
        }


        $method = $this->request->getMethod();

        $userModel = new UserModel();
        // echo $method;die;
        if ($method == 'post') {
            $username = $this->request->getPost("username");
            $password = $this->request->getPost("password");
            $userremember = $this->request->getPost("userremember");

            if ($username != '' && $password != '') {
                $return = $userModel->checkUserLogin($username, $password);
                if ($return == 2) {
                    $this->session->setFlashdata('errmessage', 'Your account is not active.');
                } else if ($return) {
                    if ($userremember) {
                        setcookie("userremember", $userremember, strtotime("+1 year"), "/");
                        setcookie("cameronuser", $username, strtotime("+1 year"), "/");
                        setcookie("cameronpass", $password, strtotime("+1 year"), "/");
                    } else {
                        setcookie("userremember", $username, time() - 3600, "/");
                        setcookie("cameronuser", $username, time() - 3600, "/");
                        setcookie("cameronpass", $password, time() - 3600, "/");
                    }
                    return redirect()->to(site_url('userdashboard'));
                } else {
                    $this->session->setFlashdata('errmessage', 'Invalid user name / Password');
                }
            } else {
                $this->session->setFlashdata('errmessage', 'Invalid username / Password');
            }
        }

        $this->template->render('usertemplate', 'contents', 'user/login', $data);
    }

    public function forgotpass() {
        set_title('Welcome | ' . SITE_NAME);

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

    public function changepass() {
        set_title('Welcome | ' . SITE_NAME);

        $errorMsg = "";

        $code = $this->request->getGet("code");

        $data["code"] = $code;

        $method = $this->request->getMethod();

        $userModel = new UserModel();

        if ($method == 'post') {
            $new_password = $this->request->getPost("new_password");
            $code = $this->request->getPost("code");
            $cnf_new_password = $this->request->getPost("cnf_new_password");
            $data["code"] = $code;

            if ($code) {

                $userData = $userModel->where("temp_password", $code)->first();
                if ($userData) {
                    //print_r($userData);
                    if ($new_password == $cnf_new_password) {
                        $userid = $userData["id"];
                        $updatedata = array('password' => password_hash($new_password, 1), "temp_password" => "");
                        $userModel->set($updatedata)->where("id", $userid)->update();

                        $emailSms = new EmailSms();

                        $renewpassword = $emailSms->getMessage('renewpassword');
                        $mailcontent = array(
                            "header_cotent" => "",
                            "middle_cotent" => $renewpassword,
                            "footer_content" => $emailSms->getEmailFooter(),
                        );
                        $EmailContent = view('emailtemplates/emailtemplate', $mailcontent);
                        $EmailSubject = SITE_NAME . ": Password updated";
                        $EmailContent = str_replace("##USER_NAME##", $userData['fname'], $EmailContent);

                        $emailSms->sendEmail($userData['email'], $EmailSubject, $EmailContent);
                        echo $EmailContent;
                        $this->session->setFlashdata('message', 'Your Password updated succesfully.');
                    } else {
                        $this->session->setFlashdata('errmessage', 'Password and confirm password not match.');
                    }
                } else {
                    $this->session->setFlashdata('errmessage', 'Your link is expired. Please try again.');
                }
            } else {
                $this->session->setFlashdata('errmessage', 'Your link is expired. Please try again');
            }
        }

        $this->template->render('usertemplate', 'contents', 'user/changepass', $data);
    }

    public function dashboard() {

        set_title('Welcome | ' . SITE_NAME);
        if (!$this->isUserLoggedIn) {
            return redirect()->to(site_url());
        }
        $data = array();
        $userid = $this->session->get('user_id');
        $data['userid'] = $userid;
        $data['user_type'] = $this->session->get('user_type');
        
        $userModel = new UserModel();
        $data['channelstudio'] = $userModel->where("channelpartnerid", $userid)->get()->getResultArray();
        
        
        $this->template->render('usertemplate', 'contents', 'user/dashboard', $data);
    }

    

    public function enquiry() {
        set_title('Welcome | ' . SITE_NAME);
        $objState = new \App\Models\StateModel();
        $data['states'] = $objState->get()->getResultArray();

        $method = $this->request->getMethod();
        if ($method == 'post') {
            $studioname = $this->request->getPost("studioname");
            $mobileno = $this->request->getPost("mobileno");
            $state = $this->request->getPost("state");
            $description = $this->request->getPost("description");
            if ($studioname && $mobileno && $description) {
                $enquiry = new \App\Models\EnquiryModel();

                $arrEnquiry = array(
                    "en_studioname" => $studioname,
                    "en_mobile" => $mobileno,
                    "en_state" => $state,
                    "en_description" => $description,
                );
                $enquiry->save($arrEnquiry);

                $this->session->setFlashdata('message', 'Enquiry sent successfully!');
            } else {
                $this->session->setFlashdata('errmessage', 'Please provide all data');
            }
        }

        $this->template->render('usertemplate', 'contents', 'user/enquiery', $data);
    }

    public function logout() {
        $this->session = session();
        $userSession = array('user_id', 'email', 'name', 'phone', 'partner_type', 'user_type', 'isUserLoggedIn');
        $this->session->remove($userSession);

        return redirect()->to(site_url(''));
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

}
