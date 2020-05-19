<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class AjaxController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;    

    public function ajax(){
        return view('ajax-crud');
    }

    public function ajax_create(){
// $post = $_POST;

//   $sql = "INSERT INTO items (title,description) 

//     VALUES ('".$post['title']."','".$post['description']."')";


//   $result = $mysqli->query($sql);


//   $sql = "SELECT * FROM items Order by id desc LIMIT 1"; 

//   $result = $mysqli->query($sql);

//   $data = $result->fetch_assoc();




// echo json_encode($data);
//     }

echo "Hello";

}

}
