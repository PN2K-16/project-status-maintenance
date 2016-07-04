<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StaffController extends Controller{
	
   public function holidays()
   {
	   return view('Nimasha/stf_ManageHolidays');
   }
	
   public function leaves()
   {
	   return view('Nimasha/stf_ManageLeaves');
   }
	
   public function users()
   {
	   return view('Nimasha/stf_ManageUsers');
   }
	
   public function attendance()
   {
	   return view('Nimasha/stf_Attendance');
   }
	
	
}
