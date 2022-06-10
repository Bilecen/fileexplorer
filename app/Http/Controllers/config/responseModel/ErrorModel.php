<?php
/*
Description: ErrorModel
Version: 1.0
Author: muhammettahabilecen
Author URI: http://muhammettahabilecen.com
License: By Muhammet Taha Bilecen
*/

namespace App\Http\Controllers\config\responseModel;


class ErrorModel
{
    public $error;
    public $statu;

    /**
     * ErrorModel constructor.
     * @param $error
     * @param $statu
     */
    public function __construct($error, $statu)
    {
        $this->error = $error;
        $this->statu = $statu;
    }


}
