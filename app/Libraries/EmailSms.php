<?php

namespace App\Libraries;
class EmailSms {

     protected $SMS_BASE_URL;
    protected $SMS_SENDERID='';
    protected $SMS_API_KEY='';
    
    function __construct()
    {

      
    }
    
    private $arrMessage = array();

    public function getMessage($key) {


        //message for registration
        $this->arrMessage['forgot'] = array(
                                            "SUBJECT"=>"Reset Password - COSMO LOGICAL FOUNDATION",
                                            "BODY"=>'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                            <html xmlns="http://www.w3.org/1999/xhtml">
                                            <head>
                                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                <meta name="x-apple-disable-message-reformatting">
                                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                                <meta name="color-scheme" content="light dark">
                                                <meta name="supported-color-schemes" content="light dark">
                                                <title></title>
                                                
                                            </head>
                                            <body style="margin: 0;padding: 0;-webkit-text-size-adjust: none;font-family: Arial, sans-serif;width: 100% !important;">

                                                <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                    <tr>
                                                        <td align="center" style="word-break: break-word;font-family: Arial, sans-serif;font-size: 16px;">
                                                            <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                               
                                                                <!-- Email Body -->
                                                                <tr>
                                                                    <td class="email-body" width="570" cellpadding="0" cellspacing="0" style="word-break: break-word;font-family: Arial, sans-serif;font-size: 16px;">
                                                                        <table class="email-body_inner" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <!-- Body content -->
                                                                            <tr>
                                                                                <td class="content-cell" style="word-break: break-word;font-family: Arial, sans-serif;font-size: 16px;">
                                                                                    <h1 style="margin-top: 0;color: #333333;font-size: 22px;font-weight: bold;text-align: left;">Hi  ##USER_NAME##,</h1>
                                                                                    <p style="margin: 0.4em 0 1.1875em;font-size: 16px;line-height: 1.625;">You recently requested to reset your password for your COSMO LOGICAL FOUNDATION account. Use the button below to reset it. <strong>This password reset is only valid for the next 24 hours.</strong></p>
                                                                                    <!-- Action -->
                                                                                    <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                        <tr>
                                                                                            <td align="center" style="word-break: break-word;font-family: Arial, sans-serif;font-size: 16px;">
                                                                                                <!-- Border based button -->
                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                                                                                    <tr>
                                                                                                        <td align="center" style="word-break: break-word;font-family: Arial, sans-serif;font-size: 16px;">
                                                                                                            <a href="##action_url##" class="button button--green" target="_blank" style="color: #FFF;background-color: #22BC66;border: 0;text-decoration: none;border-radius: 3px;padding: 12px 18px;display: inline-block;text-align: center;">Reset your password</a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="word-break: break-word;font-family: Arial, sans-serif;font-size: 16px;">
                                                                        <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tr>
                                                                                <td class="content-cell" align="center" style="word-break: break-word;font-family: Arial, sans-serif;font-size: 16px;">
                                                                                    <p class="sub align-center" style="margin: 0.4em 0 1.1875em;font-size: 13px;line-height: 1.625;text-align: center;">
                                                                                        [COSMO LOGICAL FOUNDATION]<br>
                                                                                        Flat No - 25, Fifth Floor, Near Shiv Temple, Shastri Nagar, Dombivali West, Thane, Maharashtra, India, 421202
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </body>
                                            </html>
                                            
                                                     
                                                '
                                            );
        $this->arrMessage['email'] = array(
                                            "SUBJECT"=>"kokan Ngo",
                                            "BODY"=>"Dear <b>##USER_NAME##</b>,<br>Thanks for Donating to <b>KOKAN KALA VA SHIKSHAN VIKAS SANSTHA<b>."
                                            );
    
        if (array_key_exists($key, $this->arrMessage)) {
            return $this->arrMessage[$key];
        }
    }

    //function for making email link design
    // public function generate_mail_link($action, $linkname) {
    //     return '<a href="' . $action . '" target="_blank" itemprop="url" style="font-family: \'Helvetica Neue\',Helvetica,Arial,sans-serif;  font-size: 12px; color: #626ed4; text-decoration: none; font-weight: bold; text-align: center; cursor: pointer; display: inline-block;  text-transform: capitalize;  margin: 0;">' . $linkname . '</a>';
    // }

    public function getEmailFooter() {
        return "Thanks & Regards <br> " . SITE_NAME . " Team";
    }
     
    //function for send email

   
    public function sendEmail($toEmail, $subject = '', $mailbody = '',$bcc="",$cc="",$attachement="") {

         $email = \Config\Services::email();
        $email->setFrom('admin@kokanngo.org');
        $email->setTo($toEmail);
       

        
        if($bcc)
        {
            $email->setBCC($bcc);
        }
        if($cc)
        {
            $email->setCC($cc);
        }
        
        if($attachement)
        {
            if(is_array($attachement))
            {
             
                foreach($attachement as $filepath)
                {
              
                 $email->attach($filepath); 

             
                }
            }
            else
            {
              $email->attach($attachement);  // i.e. /test/myfile.pdf
            }
        }
       

        $email->setSubject($subject);

        $email->setMessage($mailbody);


        $email->send();

        
        
         $data = $email->printDebugger(['headers']);
       
          // print_r($data);exit;
       
    }

    public function sendadminEmail($subject = "", $mailbody = "",$bcc="",$cc="",$attachement="") {

         $email = \Config\Services::email();

        // $config = Array(
        //         'protocol' => 'smtp',
        //         'smtp_host' => 'ssl://smtp.gmail.com',
        //         'smtp_port' => 465,
        //         'smtp_user' => 'support@geniemoney.in',
        //         'smtp_pass' => 'Geniemoney@123',
        //         'mailtype' => 'html',
        //         'charset' => 'iso-8859-1'
        //      );

       // $email->initialize($config);

        $email->setFrom('admin@kokanngo.org');
         $email->setTo('admin@kokan-ngo.org');
        //$email->setTo('abdulkhanrab@gmail.com');
       

        
        if($bcc)
        {
            $email->setBCC($bcc);
        }
        if($cc)
        {
            $email->setCC($cc);
        }
        
        if($attachement)
        {
            if(is_array($attachement))
            {
             
                foreach($attachement as $filepath)
                {
              
                 $email->attach($filepath); 

             
                }
            }
            else
            {
              $email->attach($attachement);  // i.e. /test/myfile.pdf
            }
        }
       

        $email->setSubject($subject);

        $email->setMessage($mailbody);


        $email->send();

        
        
        // $data = $email->printDebugger(['headers']);
       
        //   print_r($data);exit;
       
    }
}

?>