<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Quotation;

class PagesController extends Controller
    
    
{
    
    public function getIndex() {

           return view('nipuna.checkout');
        }
    
    public function getCheckout(){
        return view('nipuna.checkout');
    }
    
    
    public function getTransactions(){
        return view('nipuna.transactions');
    }
    
    
    
    public function getSelectitems(){
        return view('nipuna.selectitems');
    }
    
    public function getOrders(){
        return view('nipuna.orders');
    }
    
    
    public function getPreorders(){
        return view('nipuna.preorders');
    }
    
    public function getPosreports(){
        $data=DB::table('order_product')->selectRaw('item_name, sum(qty) as sum')->groupBy('item_name')->get();
        //return view('nipuna.test')->with(compact('data'));
        return view('nipuna.reports')->with(compact('data'));
    }
    
    public function getPdf(){
        $data=DB::table('item_details')->get();
        //return view('nipuna.test')->with(compact('data'));
        return view('nipuna.test')->with(compact('data'));
        
    }
    /*
    public function getPrecount(){
        $result=DB::table('preorders')->whereIn('status',array('pending','approved'))->count();
        return $result;
    }
    
    public function getRefreshitems(Request $request){
        //$result=DB::table('item_details')->leftJoin('inv_brands' , 'item_details.item_no','=','inv_brands.id')->get();
        $result=DB::table('inv_items')->leftJoin('inv_brands' , 'inv_items.itm_id','=','inv_brands.id')->get();
        return $result;
    }
    
    public function getOrderitems(Request $request){
        $order_id = $request->input('order_id');
        //$result=DB::table('order_product')->where('order_id','=',$order_id)->get();
       $result = DB::table('orders')->join('order_product', 'orders.order_id', '=', 'order_product.order_id')
    ->select('orders.customer_id', 'order_product.order_id','order_product.item_id','order_product.qty','order_product.item_name','order_product.uvalue','order_product.discount')->where('orders.order_id',$order_id)->get();
        return $result;
    }
    */
    public function getTransactionss(){
        $result=DB::table('orders')->get();
        return $result;
    }
    
    public function getOrderss(){
        $result = DB:: table('orders')->get();
        return $result;
    }
    
    public function getAllitems(){
        $result=DB::table('temp_list')->get();
        return $result;
    }
    

    public function getDeleterow(Request $request){
        $id=$request->input('row');
        DB::table('temp_list')->where('id','=',$id)->delete();
    }

    public function getRefreshitems(Request $request){
        //$result=DB::table('item_details')->leftJoin('inv_brands' , 'item_details.item_no','=','inv_brands.id')->get();
        $result=DB::table('inv_items')->leftJoin('inv_brands' , 'inv_items.brand_id','=','inv_brands.id')->orderBy('itm_id')->get();
        return $result;
    }

    public function getSearchcustomer(Request $request){
        $cus_id=$request->input('cusid');
        $result=DB::table('crm_customer')->where('telephone_number','like',$cus_id.'%')->get();
        return $result;
    }
    public function getSearchcustomerpreorder(Request $request){
        $cus_id=$request->input('cusid');
        $result=DB::table('crm_customer')->where('cus_id',$cus_id)->get();
        return $result;
    }

    public function getUpdatelinetotal(Request $request){

        $id=$request->input('id');
        $total=$request->input('total');
        DB::table('temp_list')->where('id',$id)->update(array('total'=>$total));
    }

    

    public function getAdditem(Request $request){
        $item_no=$request->input('item_no');
        $quantity=$request->input('quantity');
        $new_value=$request->input('new_value');
        $item_name=$request->input('item_name');
        $item_description=$request->input('item_description');
        $uvalue=$request->input('uvalue');
        $discount=$request->input('discount');
        $total=$request->input('total');
        $availability=DB::table('temp_list')->where('item_no',$item_no)->get();
        if($availability==null){
            DB::table('temp_list')->insert(array('qty'=>$quantity,'itm_name'=>$item_name,'desc'=>$item_description,'uvalue'=>$uvalue,'discount'=>$discount,'total'=>$total,'item_no'=>$item_no));
        }
        else{
            DB::table('temp_list')->where('item_no',$item_no)->increment('qty',$quantity);
        }
        DB::table('item_details')->where('item_no',$item_no)->update(array('qty_available'=>$new_value));
        DB::table('inv_items')->where('itm_id',$item_no)->update(array('qtyindisplay'=>$new_value));
    }

    public function getAddcheckitem(Request $request){
        $qty=$request->input('qty');
        $itm_name=$request->input('itm_name');
        $desc=$request->input('desc');
        $uvalue=$request->input('uvalue');
        $discount=$request->input('discount');
        $total=$request->input('total');

        DB::table('temp_list')->insert(array('qty'=>$qty,'itm_name'=>$itm_name,'desc'=>$desc,'uvalue'=>$uvalue,'discount'=>$discount,'total'=>$total));

    }

    public function getSearchitem(Request $request){
        
        $search=$request->input('search');
        $result=DB::table('inv_items')->leftJoin('inv_brands' , 'inv_items.brand_id','=','inv_brands.id')->where('brandname','like',$search.'%')->orWhere('description','like',$search.'%')->orderBy('itm_id')->get();
        return $result;
        
    }
   /*
    public function addtransaction(Request $request){
        $order_id=$request->input('order_id');
        $itm_ids=$request->input('itm_ids');
        $itm_qtys=$request->input('itm_qtys');
        $items=$request->input('items');
        $uvalues=$request->input('uvalues');
        $discounts=$request->input('discounts');
        DB::table('transactions')->insert(array('order_id'=>$order_id,'itm_ids'=>$itm_ids,'itm_qtys'=>$itm_qtys,'items'=>$items,'uvalues'=>$uvalues,'discounts'=>$discounts));
    }
    */

    public function getAddtransaction(Request $request){
        $order_id=$request->input('order_id');
        $item_id=$request->input('item_id');
        $qty=$request->input('qty');
        $item_name=$request->input('item_name');
        $uvalue=$request->input('uvalue');
        $discount=$request->input('discount');
        DB::table('order_product')->insert(array('order_id'=>$order_id,'item_id'=>$item_id,'qty'=>$qty,'uvalue'=>$uvalue,'item_name'=>$item_name,'discount'=>$discount));

    }

    public function getUpdatepoints(Request $request){
        $newlpoints=$request->input('newlpoints');
        $cusid=$request->input('cusid');
        DB::table('crm_customer')->where('telephone_number',$cusid)->increment('cus_points', $newlpoints);
    }
    public function getUpdatepointspreorder(Request $request){
        $newlpoints=$request->input('newlpoints');
        $cusid=$request->input('cusid');
        DB::table('crm_customer')->where('cus_id',$cusid)->increment('cus_points', $newlpoints);
    }

    public function getMakepayment(Request $request){
        $customer_tel=$request->input('customer_id');
        $customer_id=DB::table('crm_customer')->where('telephone_number',$customer_tel)->pluck('cus_id');
        $salesperson_id=$request->input('salesperson_id');
        $datetime=date('Y-m-d H:i:s');
        $value=$request->input('value');
        $payment_type=$request->input('payment_type');
        $custype=$request->input('custype');
        $order_type=$request->input('order_type');

        $rowno=DB::table('orders')->insertGetId(array('customer_id'=>$customer_id,'salesperson_id'=>$salesperson_id,'datetime'=>$datetime,'value'=>$value,'payment_type'=>$payment_type,'custype'=>$custype,'order_type'=>$order_type));

        //$rowno=DB::getPdo()->lastInsertId();
        return $rowno;
    }
    
    

    
    
    public function getPrecount(){
        $result=DB::table('preorders')->whereIn('status',array('pending','approved'))->count();
        return $result;
    }
    
    public function getRetrievepreorders(){
        $result=DB::table('preorders')->orderBy('status')->get();
        return $result;
    }
    
    public function getPreorderitems(Request $request){
        $preorder_id=$request->input('preorder_id');
        $result=DB::table('preorder_product')->where('preorder_id',$preorder_id)->get();
        return $result;
    }
    
    public function getCleartable(){
        DB::table('temp_list')->where('id','>=',0)->delete();
    }
    
    public function getOrderitems(Request $request){
        $order_id = $request->input('order_id');
        //$result=DB::table('order_product')->where('order_id','=',$order_id)->get();
       $result = DB::table('orders')->join('order_product', 'orders.order_id', '=', 'order_product.order_id')
    ->select('orders.customer_id', 'order_product.order_id','order_product.item_id','order_product.qty','order_product.item_name','order_product.uvalue','order_product.discount')->where('orders.order_id',$order_id)->get();
        return $result;
    }

   public function getUpdaterow(Request $request){
        $type = $request->input('type');
        $id = $request->input('id');
        $newqty=$request->input('newqty');

        switch($type){
        case('increment'):
            DB::table('temp_list')->where('item_no',$id)->increment('qty',$newqty);
            DB::table('inv_items')->where('itm_id',$id)->decrement('qtyindisplay',$newqty);
            DB::table('item_details')->where('item_name',$id)->decrement('qty_available',$newqty);
            break;
                
        case('decrement'):
            DB::table('temp_list')->where('item_no',$id)->decrement('qty',$newqty);
            DB::table('inv_items')->where('itm_id',$id)->increment('qtyindisplay',$newqty);
            DB::table('item_details')->where('item_name',$id)->increment('qty_available',$newqty);
            break;
        
        }
       

    }

        
    
    public function getCompletepreorder(Request $request){
            
            $preorder_id=$request->input('preorder_id');
            DB::table('preorders')->where('preorder_id',$preorder_id)->update(array('status'=>"completed"));
    }
    
    public function getRestoreitem(Request $request){
        $item_no=$request->input('item_no');
        $qty=$request->input('qty');
        DB::table('item_details')->where('item_no',$item_no)->increment('qty_available',$qty);
        DB::table('inv_items')->where('itm_id',$item_no)->increment('qtyindisplay',$qty);
    }
    
}
