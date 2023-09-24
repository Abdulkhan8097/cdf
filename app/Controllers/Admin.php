<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\WebsiteCasesModel;
use App\Models\NewsEventsModel;
use App\Models\CertificatesModel;
use App\Models\EnquiryModel;
use App\Models\HomeBannerModel;
use App\Models\OrdersModel;
use App\Models\OrderstatuslogModel;

class Admin extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function index() {

        //$session = session();

        $isAdminLoggedIn = $this->session->get('isAdminLoggedIn');

        if ($isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));
        }
        $data = array();

        if (isset($_COOKIE['adminremember'])) {

            $data['adminremember'] = $_COOKIE['adminremember'];
            $data['cameronadmin'] = $_COOKIE['cameronadmin'];
            $data['cameronadminpass'] = $_COOKIE['cameronadminpass'];
        }
        $method = $this->request->getMethod();
        $adminModel = new AdminModel();

        if ($method == 'post') {

       
            $username = $this->request->getPost('username');

            $password = $this->request->getPost('password');
            $adminremember = $this->request->getPost('adminremember');

            if ($username != '' && $password != '') {

                $return = $adminModel->checkAdminLogin($username, $password);
                if ($return == 2) {
                    $this->session->setFlashdata('errmessage', 'Your account is not active');
                } else if ($return) {
                    //set cookie for login
                    if ($adminremember) {

                        setcookie('adminremember', $adminremember, strtotime('+1 year'), '/');
                        setcookie('admin', $username, strtotime('+1 year'), '/');
                        setcookie('adminpass', $password, strtotime('+1 year'), '/');
                    } else {
                        setcookie('adminremember', $adminremember, time() - 3600, '/');
                        setcookie('admin', $username, time() - 3600, '/');
                        setcookie('adminpass', $password, time() - 3600, '/');
                    }

                    return redirect()->to(site_url('dashboard'));
                } else {
                    $this->session->setFlashdata('errmessage', 'Invalid Email / Password');
                }
            } else {

                $this->session->setFlashdata('errmessage', 'Invalid Email / Password');
            }
        }

        $this->template->render('admintemplate', 'contents', 'admin/loginTpl', $data);
    }

    public function dashboard() {
        $searchArray = array();
        set_title('Welcome | ' . SITE_NAME);
        $adminModel = new AdminModel();
        $userModel = new UserModel();
        $WebsiteCasesModel = new WebsiteCasesModel();
        $EnquiryModel = new EnquiryModel();
        $admin_type = $this->session->get('type');
        $admin_id = $this->session->get('id');

        if ($admin_type == "branch") {
            $searchArray['admin_id'] = $admin_id;
        }
        $data['userscount'] = $userModel->getData($searchArray, '', '', 1);
    

           $donationamt = $userModel->select('sum(donation_amount) as donation_amount')->where('payment_status','Success')->find();
         
            $totalDonationamount = 0;
            if($donationamt) {
                $totalDonationamount = $donationamt[0]['donation_amount'];
            }
            $data['donation']=$totalDonationamount;
            
            $data['selescount'] = $adminModel->getData($searchArray, '', '', 1);
            $data['emergencycasescount'] = $WebsiteCasesModel->getData($searchArray, '', '', 1);
            $data['successfullcasescount'] = $WebsiteCasesModel->getDataSuccessfull($searchArray, '', '', 1);
             $data['enquirycount'] = $EnquiryModel->getData($searchArray, '', '', 1);
      

        $this->template->render('admintemplate', 'contents', 'admin/dashboard',$data);
    }

    public function logout() {
        //$session = session();
        $adminSession = array('id', 'email', 'name', 'isAdminLoggedIn', 'loginType', 'adminLoggedIn');
        $this->session->remove($adminSession);
        return redirect()->to(site_url('admin'));
    }

}
