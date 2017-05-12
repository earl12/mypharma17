<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->insert(
    		array(
    			array('name'=>'Administrator','description' => 'Adds staffs to site'),
    			array('name'=>'Social Worker ','description' => 'Facilitates the registration and orders of every barangays'),
    			array('name'=>'Messenger','description' => 'delivers the medicines in barangays'),));
    }
}
