<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed. t
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('WebsiteController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'WebsiteController::index');
$routes->get('about-us', 'WebsiteController::about-us');
$routes->get('contact-us', 'WebsiteController::contact-us');
$routes->get('mission', 'WebsiteController::mission');
$routes->get('technology', 'WebsiteController::technology');
$routes->get('clients', 'WebsiteController::clients');
$routes->get('testimonials', 'WebsiteController::testimonials');
$routes->post('enquiry', 'WebsiteController::enquiry');

$routes->add('content/(:any)', 'WebsiteController::pages/$1');
$routes->get('content', 'WebsiteController::pageNotFound');

// Donation Save
$routes->post('checkout', 'WebsiteController::PaymentCheckout');
$routes->post('paymentSuccess', 'WebsiteController::paymentSuccess');
$routes->post('paymentFailures', 'WebsiteController::paymentFailures');



// $routes->post('donationsave', 'WebsiteController::donationSave');

$routes->get('donation', 'WebsiteController::donation');
//Contact form
$routes->post('contactformsave', 'WebsiteController::contactForm');
$routes->get('certificates', 'WebsiteController::Certificate');
$routes->get('news-event', 'WebsiteController::NewsEvent');
$routes->get('news-event-detail', 'WebsiteController::NewEventDetail');
$routes->get('gallery', 'WebsiteController::Gallery');
$routes->get('ourgallery', 'WebsiteController::Our_Gallery');
$routes->get('contactus', 'WebsiteController::ContactUs');
$routes->get('Orphanage', 'WebsiteController::Orphanage');
$routes->get('csr-partnership', 'WebsiteController::Partnership');
$routes->get('career', 'WebsiteController::Career');
$routes->get('village-development', 'WebsiteController::Village');


//emegency cases read more page url


// website controll
$routes->get('emergency-cases', 'WebsiteCases::index');
$routes->get('successfull-cases', 'WebsiteCases::SuccessfullCases');
$routes->get('cases-details', 'WebsiteCases::emergencyCasesDetails');
// website Volunteers
$routes->get('Volunteers', 'WebsiteCases::Volunteers');




/**  Admin side controller rout */
//for user controller
$routes->get('login', 'UserController::login');
$routes->post('login', 'UserController::login');
$routes->get('userdashboard', 'UserController::dashboard');
$routes->get('forgotpassword', 'UserController::forgotpass');
$routes->post('forgotpassword', 'UserController::forgotpass');
$routes->get('ulogout', 'UserController::logout');


$routes->get('profile', 'Profile::index');
$routes->post('updateprofile', 'Profile::UpdateProfile');
$routes->get('changepwd', 'Profile::changepwd');
$routes->post('upassword', 'Profile::UpdatePassword');
$routes->get('changepass', 'UserController::changepass');
$routes->post('changepass', 'UserController::changepass');
$routes->get('testemail', 'UserController::testemail');


$routes->get('admin', 'Admin::index');
$routes->get('dashboard', 'Admin::dashboard');
$routes->get('logout', 'Admin::logout');
$routes->get('adminusers', 'AdminController::adminusers');
$routes->get('newaccount', 'AdminController::newAccount');
$routes->post('addaccount', 'AdminController::addAccount');
$routes->get('editaccount', 'AdminController::editAccount');
$routes->post('updateaccount', 'AdminController::updateAccount');
$routes->get('delaccount', 'AdminController::delAccount');

$routes->get('adminprofile', 'AdminProfile::index');
$routes->get('cpassword', 'AdminProfile::cpassword');
$routes->post('updatepassword', 'AdminProfile::UpdatePassword');
$routes->get('users', 'AdminController::userslist');
$routes->get('newuser', 'AdminController::newUser');
$routes->post('adduser', 'AdminController::addUser');
$routes->get('edituser', 'AdminController::editUser');
$routes->get('viewuser', 'AdminController::viewUser');
$routes->get('previewuser', 'AdminController::previewUser');
$routes->get('userrefurl', 'AdminController::refUrl');
$routes->get('recieptno', 'AdminController::updateReciept');


$routes->post('ituserupdate', 'AdminController::itUserupdate');
$routes->get('deluser', 'AdminController::delUser');
$routes->post('updateuser', 'AdminController::updateUser');
$routes->get('pdfsend', 'AdminController::sendPdf');

$routes->get('deluserfile', 'AdminController::deluserfile');
$routes->get('getcity', 'AdminController::getCity');
$routes->get('getdistric', 'AdminController::getDistric');
$routes->get('adminenquiry', 'AdminController::adminenquiry');
$routes->get('delenquiry', 'AdminController::delEnquiry');
$routes->get('deluser', 'AdminController::delUser');
$routes->get('viewenqury', 'AdminController::viewEnqury');

$routes->get('settings', 'Settings::index');
$routes->get('editsetting', 'Settings::editsetting');
$routes->post('updatesetting', 'Settings::updatesetting');
$routes->post('updatesettingvalues', 'Settings::updatesettingvalues');
$routes->get('removesetting', 'Settings::removesetting');

$routes->get('menucategory', 'Menucategory::index');
$routes->get('addmenu', 'Menucategory::addmenu');
$routes->get('editmenu', 'Menucategory::editmenu');
$routes->post('updatemenu', 'Menucategory::updatemenu');
$routes->post('savemenu', 'Menucategory::savemenu');
$routes->get('delmenu', 'Menucategory::delmenu');




// Cases
$routes->get('addemergencycases', 'EmergencyCases::addCases');
$routes->get('viewemergencycases', 'EmergencyCases::index');
$routes->get('preview', 'EmergencyCases::preview');
$routes->get('document', 'EmergencyCases::addDocument');


// pdf send
$routes->get('getcustomer', 'AdminController::getcustomer');

 // show pdf
  $routes->get('showcertificate', 'AdminController::ShowCertificate');


  // Volunteer
$routes->get('addvolunteer', 'Volunteer::addVolunteer');
$routes->get('viewvolunteer', 'Volunteer::index');
$routes->get('previewvolunteer', 'Volunteer::preview');


// URL
$routes->get('addurl', 'U_rl::addUrl');
$routes->get('viewurl', 'U_rl::index');
$routes->get('previewurl', 'U_rl::preview');


//website routes
$routes->get('whoweare', 'WebsiteController::whoweAre');
$routes->get('edp', 'WebsiteController::edp');
$routes->get('fightingforair', 'WebsiteController::fightingforair');
$routes->get('renewableenergy', 'WebsiteController::renewableenergy');
$routes->get('ruralsanitation', 'WebsiteController::ruralsanitation');
$routes->get('drinkingwater', 'WebsiteController::drinkingwater');
$routes->get('cases', 'WebsiteController::cases');
$routes->get('events', 'WebsiteController::events');
$routes->get('joy-of-giving-week-3', 'WebsiteController::joy_of_giving_week');
$routes->get('sanitary-napkins', 'WebsiteController::sanitary_napkins');
$routes->get('adopt-a-tree', 'WebsiteController::adopt_a_tree');
$routes->get('volunteer', 'WebsiteController::volunteer');
$routes->get('contact', 'WebsiteController::contact');
$routes->get('bank-details', 'WebsiteController::bank_details');
$routes->post('saveinqury', 'WebsiteController::saveEnqury');
$routes->post('savevolunteer', 'WebsiteController::savevolunteer');
$routes->get('forgot-password', 'ForgotPassword::forgot_password');
$routes->post('resetp', 'ForgotPassword::resetp');
$routes->get('changepassword', 'ForgotPassword::changepassword');
$routes->post('resetpasswordadmin', 'ForgotPassword::resetpasswordadmin');
/**
 * 
 * 
 * 
 *
 * 
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have accessgit  to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
