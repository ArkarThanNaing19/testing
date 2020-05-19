<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Car;
use App\Account;
use App\test;
use App\Form;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function home(){
    	return view('welcome');
    }

    function test(){
    	return view('test');
    }

    function form(){

    	$msg = "success";
        $name = $_POST['name'];
        $pass = $_POST['password'];

        $data = array(
            array('name'=> $name, 'password'=> $pass)
        );

        // DB::insert('insert into users (name) values(?)',[$name]);
        DB::table('users')->insert($data);

        $results = DB::select('select * from users where id = ?', [8]);

        foreach($results as $key => $r){
           $n =  $r->name;
        }

    	return view('test',['msg' => $msg ,'res' => $n]);
    }

    function demo(){
        return view('demo');
    }

    function add_demo(Request $request){

        $this->validate($request,[
            'username'      => 'required|min:4|max:10|unique:accounts',
            'profile_name'  => 'required|min:5|max:10',
            'email'  => 'required|email',
            'phone'  => 'required|numeric',
            'password'  => 'required',
            'confirm_pass'  => 'required|same:password'
        ]);

        $add = New Account;

        $add->username      = $_POST['username'];
        $add->profile_name  = $_POST['profile_name'];
        $add->email         = $_POST['email'];
        $add->phone         = $_POST['phone'];
        $add->password      = $_POST['password'];

        $add->save();
        return back()->with('msg','Successfully Added!');
    }

    public function list(){
        $sel = account::all();
        return view('list',['sel' => $sel]);
    }

    public function edit($id){
        $sel = account::where('id',$id)->get();
        return view('edit',['sel' => $sel]);
    }

    public function test_1(){
        $tests = test::all();
        return $tests;
    }

    public function update($id){

        $u = account::find($id);

        $u->username        = $_POST['username'];
        $u->profile_name    = $_POST['profile_name'];
        $u->email           = $_POST['email'];
        $u->phone           = $_POST['phone'];
        $u->password        = $_POST['password'];

        $u->save();

        $sel = account::all();
        return view('list',['sel' => $sel]);
    }

    public function del($id){
        $res = account::find($id)->delete();
        return back();
    }

    //

    public function testing1(){

      $name = $_POST['username'];
      $email = $_POST['email'];

      $form = new Form;
      $form->username = $name;
      $form->email = $email;

      $form->save();

      $posts = form::all();
      return view('/del-test',['posts' => $posts , 'msg' => 'Your Record Added Successfully !']);
    }

    public function delete(){
      $posts = form::all();
      return view('/del-test',compact('posts'));
    }

    public function destroy($id)
    {
    	DB::table("forms")->delete($id);
      $posts = form::all();
    	return view('/del-test',['posts' => $posts , 'msg' => 'Your Record Deleted Successfully !']);
    }

    public function edit_test($id){
      $e_name = $_POST['name'];
      $e_email = $_POST['email'];

      $form = form::find($id);
      $form->username = $e_name;
      $form->email = $e_email;
      $form->save();

      $posts = form::all();
      return view('/del-test',['posts' => $posts , 'msg' => 'Your Record Updated Successfully !']);

    }


}
