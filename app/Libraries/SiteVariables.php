<?php

namespace App\Libraries;

/* * ***************************************************************************\
  +-----------------------------------------------------------------------------+
  | Project        : fluid9                                           		  |
  | FileName       : sitevariables.php                                           |
  | Version        : 1.0                                                      |
  | Developer      : subedar Yadav                                            |
  | Created On     : 15-03-2021                                               |
  | Modified On    :                                                          |
  | Modified   By  :                                                          |
  | Authorised By  :  subedar Yadav                                           |
  | Comments       :  This class used for site message		  		          |
  | Email          : subedar2507@gmail.com                                    |
  +-----------------------------------------------------------------------------+
  \**************************************************************************** */

class SiteVariables {

    private $arrMessage = array();

    public function getVariable($key) {

        $this->arrMessage['accountype'] = 
                                    array(
                                        'superdistributer' => 'Super Distributer', 
                                        'distributer' => 'Distributer',
                                        'retailer' => 'Retailer', 
                                        'employee' => 'Employee'
                                        );

        $this->arrMessage['paymentMode'] = 
                                    array(
                                        'Cheque' => 'Cheque', 
                                        'NEFT' => 'NEFT',
                                        'IMPS' => 'IMPS', 
                                        'UPI' => 'UPI',
                                        'PAYU' => 'PAYU',
                                        'CASH' => 'CASH',
                                        'TPT' => 'TPT',
                                        'cash_deposit_in_bank' => 'CASH DEPOSIT IN BANK',
                                        'OTHER' => 'OTHER'
                                        );

        if (array_key_exists($key, $this->arrMessage)) {
            return $this->arrMessage[$key];
        }
    }

}

?>