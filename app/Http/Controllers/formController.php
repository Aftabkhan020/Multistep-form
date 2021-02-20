<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class formController extends Controller
{
    public function index()
    {
    	return view('multi-step-form');
    }
    public function submit(Request $request){
    	$validated = $request->validate([
        'firstname' => 'required|unique:caregories|max:255',
        'lastname' => 'required|unique:caregories|max:255',
        'phone' => 'required|unique:caregories|max:255',
        'email' => 'required|unique:caregories|max:255',
        'msg' => 'required|unique:caregories|max:255',
    ]);
    	$data = array();
    	$data['firstname'] = $request->firstname;
    	$data['lastname'] = $request->lastname;
    	$data['phone'] = $request->phone;
    	$data['email'] = $request->email;
    	$data['msg'] = $request->msg;
  
    	DB::table('caregories')->insert($data);
    	return Redirect()->back()->with('success','Data Inserted Successfully');
    }
}
