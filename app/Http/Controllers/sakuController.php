<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Quotation;
class sakuController extends Controller
{
    public function getincentives(){
        $result=DB::table('incentive')->get();
        return $result;
    }
    
    public function gettempincentives(){
        $result=DB::table('rem_employee_incentives')->get();
        return $result;
    }
    
    public function addtempincentive(Request $request){
    
        $incentive_id=$request->input('incentive_id');
        $incentive=$request->input('incentive');
        $pointsAllocated=$request->input('pointsAllocated');
        DB::table('rem_employee_incentives')->insert(array('incentive_id'=>$incentive_id,'incentive'=>$incentive,'pointsAllocated'=>$pointsAllocated));
    }
    
    public function incentiveavailability(Request $request){
        $incentive_id=$request->input('incentive_id');
        $result=DB::table('rem_employee_incentives')->where('incentive_id',$incentive_id)->get();
        return $result;
    }
    
    public function deleteincentive(Request $request){
        $incentive_id=$request->input('incentive_id');
        DB::table('rem_employee_incentives')->where('incentive_id',$incentive_id)->delete();
    }
    
    public function clearincentive(){
        DB::table('rem_employee_incentives')->where('incentive_id','>=',0)->delete();
    }
}
