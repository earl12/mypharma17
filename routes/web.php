<?php
Route::get ( '/', function () {
	return view ( 'welcome' );
} );

Route::group ( [ 
		'middleware' => [ 
				'auth',
				'admin' 
		],
		'prefix' => 'admin' 
], function () {
	Route::resource ( 'admin', 'AdminController' );
	Route::get ( 'dashboard', 'AdminController@index' );
	Route::get ( 'messages', 'AdminController@showMessages' );
	Route::get ( 'administrators', 'AdminController@showAdministrators' );
	Route::get ( 'users', 'AdminController@showAllUsers' );
	
	Route::get ( 'edit-profile/{id}', [ 
			'as' => 'editProfile',
			'uses' => 'AdminController@editProfile' 
	] );
	
	Route::get ( 'update-profile/{id}', [ 
			'as' => 'updateProfile',
			'uses' => 'AdminController@updateProfile' 
	] );
	
	Route::get ( '/test', 'AdminController@test' );
	// show all pending applications
	Route::get ( 'pending-applications', [ 
			'as' => 'pendingApplications',
			'uses' => 'AdminController@showPendingApplications' 
	] );
	// show only elderly
	Route::get ( 'pending-elderly', [ 
			'as' => 'getClient',
			'uses' => 'AdminController@getElderlyApplication' 
	] );
	// approve
	Route::get ( 'approve/user/{id}', [ 
			'as' => 'approveUser',
			'uses' => 'AdminController@approveApplication' 
	] );
	
	// delete elderly application
	Route::get ( 'delete/user/{id}', [ 
			'as' => 'deleteUser',
			'uses' => 'AdminController@deleteApplication' 
	] );
	
	// show messenger application
	Route::get ( 'pending/messenger', [ 
			'as' => 'pendingMessenger',
			'uses' => 'AdminController@showPendingMessengers' 
	] );
	
	// show all medicine
	Route::get ( 'medicines', [ 
			'as' => 'medicineList',
			'uses' => 'MedicineController@getMedicineList' 
	] );
	
	Route::get ( 'create-dosage', [ 
			'as' => 'getDosage',
			'uses' => 'MedicineController@getDosage' 
	] );
	
	// add new dosage form
	Route::post ( 'store-dosage', [ 
			'as' => 'storeDosage',
			'uses' => 'MedicineController@storeDosage' 
	] );
	
	// edit medicine
	Route::post ( 'edit-dosage', [ 
			'as' => 'updateDosage',
			'uses' => 'MedicineController@updateDosageInformation' 
	]);
	
	//Delete medicine //
	Route::get ( 'delete-medicine/{id}', [ 
			'as' => 'deleteDosage',
			'uses' => 'MedicineController@deleteDosage' 
	] );
	
	Route::get ( 'manage-users', [ 
			'as' => 'siteUsers',
			'uses' => 'AdminController@showAllUsers' 
	] );
	
	Route::get ( 'get-barangay-name', [ 
			'as' => 'getBarangayName',
			'uses' => 'AdminController@getBarangayName' 
	] );
	
	Route::get ( 'show-social-worker', [ 
			'as' => 'getSocialWorker',
			'uses' => 'AdminController@getSocialWorker' 
	] );
	
	Route::get ( 'social-workers', 'AdminController@socialworkers' );
	
	Route::get ( 'check-social-worker-email', [ 
			'as' => 'checkSocialWorker',
			'uses' => 'AdminController@checkSocialWorkerEmail' 
	] );
	
	Route::post ( 'add-social-worker', [ 
			'as' => 'addSocialWorker',
			'uses' => 'AdminController@addSocialWorker' 
	] );
	
	Route::post ( 'update-social-worker', [ 
			'as' => 'editSocialWorker',
			'uses' => 'AdminController@updateSocialWorker' 
	] );
	
	Route::get ( 'delete-social-worker', [ 
			'as' => 'deleteSocialWorker',
			'uses' => 'AdminController@deleteSocialWorker' 
	] );
} );

// auth routes
Route::get ( 'login', [ 
		'as' => 'login',
		'uses' => 'AuthController@getLogin' 
] );
Route::post ( 'login', [ 
		'as' => 'postLogin',
		'uses' => 'AuthController@postLogin' 
] );


