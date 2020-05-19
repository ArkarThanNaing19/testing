<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxTestController extends Controller {
   public function index(){
      $msg = "This is a simple message.";
      return response()->json(array('msg'=> $msg), 200);
   }
   public function testing(){
     echo "hello world";
   }
}
