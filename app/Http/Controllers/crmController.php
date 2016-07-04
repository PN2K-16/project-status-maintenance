<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Quotation;
class crmController extends Controller
{


    public function getcustomer(){
        $result = DB:: table('crm_customer')->get();
        return $result;
    }

    public function getorderInfo(){
        $result = DB:: table('orders')->get();
        return $result;
    }

    public function showcusmod(Request $request){
        $cus_id=$request->input('cus_id');
        $result=DB::table('orders')->where('customer_id',$cus_id)->get();
        return $result;
    }

    public function getupdateCustomer(Request $request){

        date_default_timezone_set ( "Asia/Colombo");
        $date =$request->input(date("Y-m-d"));
        $up_cus_id=$request->input('up_cus_id');
        $up_telephone_number=$request->input('up_telephone_number');
        $up_name=$request->input('up_name');
        $up_number=$request->input('up_number');
        $up_town=$request->input('up_town');
        $up_district=$request->input('up_district');
        $up_email=$request->input('up_email');

        DB::table('crm_customer')
            ->where('cus_id', $up_cus_id)
            ->update(array('name' => $up_name,'addr_no' => $up_number,'addr_town'=>$up_town,'addr_district'=> $up_district,'email'=>$up_email,'telephone_number'=>$up_telephone_number,'last_mod'=> $date));

    }//Gihan


    public function getaddCustomer(Request $request){

        date_default_timezone_set ( "Asia/Colombo");
        $date = date("Y-m-d");
        $add_telephone_number=$request->input('add_telephone_number');
        $add_name=$request->input('add_name');
        $add_number=$request->input('add_number');
        $add_town=$request->input('add_town');
        $add_district=$request->input('add_district');
        $add_email=$request->input('add_email');
        $add_password=$request->input('add_password');

        DB::table('crm_customer')->insert(array('name'=> $add_name,'addr_no'=> $add_number,'addr_town'=> $add_town,'addr_district'=> $add_district,'email'=> $add_email,'telephone_number'=> $add_telephone_number,'password'=>$add_password,'reg_date'=>$date,'last_mod'=>$date));

    }//Gihan



    public function getPromotion(){
        $result = DB:: table('crm_promotion')->get();
        return $result;
    }//Gihan


    public function getaddPromotion(Request $request){

        date_default_timezone_set ( "Asia/Colombo");
        $date = date("Y-m-d");
        $add_heading=$request->input('add_heading');
        $add_description=$request->input('add_description');
        $add_product_id=$request->input('add_product_id');

        $pname= DB::table('inv_items')->where('itm_id', '=', $add_product_id )->first();


        $add_product_name=$pname->description;
        $add_exp_date=$request->input('add_exp_date');

        DB::table('crm_promotion')->insert(array('heading'=> $add_heading,'description'=> $add_description,'product_id'=> $add_product_id,'product_name'=> $add_product_name,'exp_date'=> $add_exp_date));

    }//Gihan


    public function SearchCustomerss(Request $request){
        $search=$request->input('search');
        $result=DB::table('crm_customer')->where('telephone_number','like',$search.'%')->get();
        return $result;
    }

    public function deleterow(Request $request){
        $promo_id=$request->input('row');
        DB::table('crm_promotion')->where('promo_id','=',$promo_id)->delete();
    }
    public function SearchPromotion(Request $request){
        $search=$request->input('search');
        $result=DB::table('crm_promotion')->where('promo_id','like',$search.'%')->get();
        return $result;
    }

    public function changeCusPw(Request $request){


        $currentPw=$request->input('currentPw');
        $newPw=$request->input('newPw');
//        $reEnterPw=$request->input('reEnterPw');

        DB::table('crm_customer')
            ->where('password', $currentPw)
            ->update(array('password' => $newPw));
    }

}
