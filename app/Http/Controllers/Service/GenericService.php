<?php
/*
Description: GenericService
Version: 1.0
Author: muhammettahabilecen
Author URI: http://muhammettahabilecen.com
License: By Muhammet Taha Bilecen
*/

namespace App\Http\Controllers\Service;


use Illuminate\Http\Request;

interface GenericService
{
    public function insert(Request $request);

    public function update(Request $request);

    public function delete(Request $request);

    public function selectAll(Request  $request);
}
