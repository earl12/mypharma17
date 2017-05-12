<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Chikka\MessageReceiver ; 

class AuthController extends Controller {

	public function getLogin(MessageReceiver $receiver) {
		return view ( "auth.login" );
	}
	public function postRegister(CreateUserRequest $request) {
		if ($request->hasFile ( 'upload' )) {
			$file = $request->file ( 'upload' );
			$fileName = uniqid () . $file->getClientOriginalName ();
			
			if (! file_exists ( 'uploads' )) {
				mkdir ( 'uploads/', 0777, true );
			}
			
			$file->move ( 'uploads/', $fileName );
			if (! file_exists ( 'uploads/thumbs' )) {
				mkdir ( 'uploads/thumbs', 0777, true );
			}
			$thumb = Image::make ( 'uploads/' . $fileName )->resize ( 80, 80 )->save ( 'uploads/thumbs/' . $fileName, 50 );
	
			$user = $this->user;

			$user->name = $request ['name'];
			$user->email = $request ['email'];
			$user->password = $request ['password'];
			$user->role_id = $request ['role_id'];
			$user->scn = $request ['scn'];
			
			// 			$user->create($request->all())
			
			$user->save ();
			
			$name = explode ( ' ', $request ['name'] );
			$first_name = $name [0];
			$last_name = $name [1];
			
			$upload = $user->userDetail ()->create ([ 
					'user_id' => $request->input ( 'id' ),
					'first_name' => $first_name,
					'last_name' => $last_name,
					'file_name' => $fileName,
					'file_size' => $file->getClientSize (),
					'file_mime' => $file->getClientMimeType (),
					'file_path' => 'uploads/' . $fileName 
			] );
			return redirect ( 'confirmation' );
		} else {
			flash ( 'Please check', 'warning' );
			return redirect ()->back ();
		}
	}
	public function postLogin(Request $request) {
		if (Auth::attempt ( [ 
				'email' => $request ['email'],
				'password' => $request ['password'],
				'status' => 1 
		] )) {
			$auth = \Auth::user ()->role_id;
			switch ($auth) {
				case '1' :
					return redirect ( 'admin/dashboard' );
					break;
				case '2' :
					return redirect ( 'client/dashboard' );
					break;
				case '3' :
					return redirect ( 'messenger/dashboard' );
					break;
			}
		} else {
			flash ( 'Please check your login credentials', 'danger' );
			return redirect ()->back ()->withInput ();
		}
	}
	public function getRegister() {
		return view ( 'auth.register' );
	}
	public function postRegister(CreateUserRequest $request) {
		if ($request->hasFile ( 'upload' )) {
			$file = $request->file ( 'upload' );
			$fileName = uniqid () . $file->getClientOriginalName ();
			
			if (! file_exists ( 'uploads' )) {
				mkdir ( 'uploads', 0777, true );
			}
			$file->move ( 'uploads', $fileName );
			
			if (! file_exists ( 'uploads/thumbs' )) {
				mkdir('uploads/thumbs', 0777, true );
			}
			
			$thumb = Image::make ( 'uploads/' . $fileName )->resize ( 150, 150 )->save ( 'uploads/thumbs/' . $fileName, 50 );
			// post information to db
			$user = $this->user;
			$user->name = $request ['name'];
			$user->email = $request ['email'];
			$user->password = $request ['password'];
			$user->role_id = $request ['role_id'];
			$user->scn = $request ['scn'];
			$user->save ();
			
			$image = $dosage->photo ()->create ( [ 
					'dosage_id' => $request->input ( 'id' ),
					'file_name' => $fileName,
					'file_size' => $file->getClientSize (),
					'file_mime' => $file->getClientMimeType (),
					'file_path' => 'medicine/images/' . $fileName,
					'created_by' => auth ()->user ()->id 
			] );
			return redirect ()->route ( 'medicineList' );
		}
		flash ( 'Please wait for the confirmation of your account', 'success' );
		return redirect ( 'index' );
	}
	public function getLogout() {
		\Auth::logout ();
		return redirect ()->back ();
	}
}
