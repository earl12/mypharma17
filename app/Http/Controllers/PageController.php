<?php

namespace App\Http\Controllers;
use App\Repo\UserRepo ; 

use Illuminate\Http\Request;
use App\User ; 
class PageController extends Controller
{
	public function index(){
		return view('index'); 
	}

	public function displayUsers () { 
		$users = User::all() ; 
	
		return view("roles")->with('users',$users) ;
	}
	
	
	public function 		
	


}
