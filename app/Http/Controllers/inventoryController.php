<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requset\CreateItemRequest;

class inventoryController extends Controller
{
    public function additem(Request $request){
        
        $brand=$request->input('brand');
        $description=$request->input('description');
        $upc=$request->input('upc');
        $code=$request->input('code');
        $department=$request->input('department');
        $qtyinhand=$request->input('qtyinhand');
        $qtyindisplay=$request->input('qtyindisplay');
        $bprice=$request->input('bprice');
        $tax=$request->input('tax');
        $sprice=$request->input('sprice');
        $discount=$request->input('discount');
        $supname=$request->input('supname');
        
    DB::table('inv_items')->insert(array('brand_id'=>$brand,'description'=>$description,'upcbarcode'=>$upc,'codebarcode'=>$code,'department_id'=>$department,'qtyinhand'=>$qtyinhand,'qtyindisplay'=>$qtyindisplay,'buyprice'=>$bprice,'tax'=>$tax,'sellprice'=>$sprice,'discount'=>$discount,'supliername'=>$supname));
        
        DB::table('item_details')->insert(array('qty_available'=>$qtyindisplay,'item_name'=>$brand,'desc'=>$description,'uvalue'=>$sprice,'discount'=>$discount));
    
        
    }
    
    public function searchitem(Request $request){
    
        $search = $request->input('search');
        $select = $request->input('select');
        
          $bookname = DB::table('inv_items AS a')->leftJoin('inv_brands','a.brand_id','=','inv_brands.id')->leftJoin('inv_categories', 'a.department_id','=','inv_categories.id')      
        ->where($select, 'LIKE', $search.'%')
        ->groupBy('a.itm_id')
        ->orderBy($select)
        ->get();
		 
       // $bookname=DB::table('items')->get();
    
   
       
 return   $bookname;
    
    }
    
    
    public function singleitem(Request $request){
    
     $id = $request->input('id');
        

     
     $item_brand = DB::table('inv_items')->where('itm_id','=', $id)->leftJoin('inv_brands','inv_items.brand_id','=','inv_brands.id')->leftJoin('inv_categories','inv_items.department_id','=','inv_categories.id')->first();
     //$ = DB::table('books')->where('book_name_id','=', $id)->orderBy('id')->get();
        
        $brand_options = DB::table('inv_brands')->orderBy('brandname', 'asc')->lists('brandname','id');
    $category_options = DB::table('inv_categories')->orderBy('name', 'asc')->lists('name','id');

return view('kushal.single-item')
       ->with("inv_items", $item_brand)->with('brand_options',$brand_options)->with('category_options',$category_options)->with("inv_brands", $item_brand)->with("inv_categories", $item_brand);
    
    
    }
    
    public function addstock(Request $request){
    
    return view('kushal.add-stock');
        
    }
    
    
    public function edititem(Request $request){
    
        $id=$request->input('id');
        $brand=$request->input('brand_id');
        $description=$request->input('description');
        $upc=$request->input('upc');
        $code=$request->input('code');
        $department=$request->input('department_id');
        $qtyinhand=$request->input('qtyinhand');
        $qtyindisplay=$request->input('qtyindisplay');
        $bprice=$request->input('bprice');
        $tax=$request->input('tax');
        $sprice=$request->input('sprice');
        $discount=$request->input('discount');
        $supname=$request->input('supname');
    
    
   $kk = DB::table('inv_items')->where('itm_id','=', $id)->update(array('brand_id'=>$brand,'description'=>$description,'upcbarcode'=>$upc,'codebarcode'=>$code,'department_id'=>$department,'qtyinhand'=>$qtyinhand,'qtyindisplay'=>$qtyindisplay,'buyprice'=>$bprice,'tax'=>$tax,'sellprice'=>$sprice,'discount'=>$discount,'supliername'=>$supname));
        
        DB::table('item_details')->where('item_no','=', $id)->update(array('qty_available'=>$qtyindisplay,'item_name'=>$brand,'desc'=>$description,'uvalue'=>$sprice,'discount'=>$discount));
        
        return 'success';
    
    }
    
    public function deleteitem(Request $request){
    
    $id=$request->input('id');
        
       $hj = DB::table('inv_items')->where('itm_id','=', $id)->delete();
        
        return 'success';
        
    } 
 
    public function addbrand(Request $request){
    
    $newbrand=$request->input('brandname');
        
        DB::table('inv_brands')->insert(array('brandname'=>$newbrand));
        
        return 'success';
    }
    
    public function addcategory(Request $request){
    
    $newcategory=$request->input('name');
        
         DB::table('inv_categories')->insert(array('name'=>$newcategory));
        
        return 'success';
    
    }
    
    public function upcunique(Request $request){
    
        $upc=$request->input('upc');
        $code=$request->input('code');
        
        $num = DB::table('inv_items')->where('upcbarcode','=', $upc)->count();
        $cnum = DB::table('inv_items')->where('codebarcode','=', $code)->count();
        $nums = array('upcbarcode'=>$num,'codebarcode'=>$cnum);
        
        if($num == 1 && $cnum == 1)
        {
            return "3";
        }
        else if($num == 1)
        {
            return "1";
        }
        else if($cnum == 1)
        {
         return "2";   
        }
        else
        {
        return "0";
        }
        
    }
    
    public function searchlowstock(Request $request){
    
         $search = $request->input('search');
        $select = $request->input('select');
        
         $lstock = DB::table('inv_items')->leftJoin('inv_brands','inv_items.brand_id','=','inv_brands.id')->where('qtyinhand', '<', '20')->get();
        
        return $lstock;
    
    }
    
    public function Lowstockitem(Request $request){
        
        $id = $request->input('id');
        
        $item_brand = DB::table('inv_items')->where('itm_id','=', $id)->first();
    
    return view('kushal.Lowstock-item')->with("inv_items", $item_brand);
        
    }
    
    public function placeorder(Request $request){
    
        $id = $request->input('id');
        $brand = $request->input('brand');
        $description = $request->input('description');
        $qtyneed = $request->input('qtyneed');
        $datee = $request->input('datee');
        
        $checkorder = DB::table('inv_orders')->where('item_id','=',$id)->count();
        
        if($checkorder == 1)
        {
            return "1";
        }
        else
        {
      DB::table('inv_orders')->insert(array('item_id'=>$id,'brand_id'=>$brand,'description'=>$description,'qty_need'=>$qtyneed,'need_before'=>$datee));
        
        return 'success';
        }
    }
    
    public function searcharrivedstock(Request $request){
    
        $search = $request->input('search');
        $select = $request->input('select');
        
        $newstocks = DB::table('inv_arrivedstocks')->leftJoin('inv_brands','inv_arrivedstocks.brand_id','=','inv_brands.id')->get();
        
        return $newstocks;
    
    }
    
    public function updatestock(Request $request){
    
        $itemid = $request->input('itemid');
        $qty = $request->input('qty');
        
        $qtynowinstore = DB::table('inv_items')->where('itm_id','=',$itemid)->first();
        $newq1 = $qtynowinstore->qtyinhand;
        $newq2 = $newq1+$qty;
        
        DB::table('inv_items')->where('itm_id','=',$itemid)->update(array('qtyinhand'=>$newq2));
        
        DB::table('inv_orders')->where('item_id','=',$itemid)->delete();
        
        DB::table('inv_arrivedstocks')->where('item_id','=',$itemid)->delete();
        
        return 'success';
    
    }
    
    public function getrejectstock(Request $request){
    
        $stockid = $request->input('stockid');
        
        $stock = DB::table('inv_arrivedstocks')->where('stock_id','=',$stockid)->get();
        
        return $stock;
    
    }
    
    public function rejectstock(Request $request){
    
        $stockid = $request->input('stockid');
        $itemid = $request->input('itemid');
        $brandid = $request->input('brandid');
        $description = $request->input('description');
        $qtyarrived = $request->input('qtyarrived');
        
        DB::table('inv_rejectedstocks')->insert(array('stock_id'=>$stockid,'item_id'=>$itemid,'brand_id'=>$brandid,'description'=>$description,'qty_rejected'=>$qtyarrived));
    
        DB::table('inv_orders')->where('item_id','=',$itemid)->delete();
        
        DB::table('inv_arrivedstocks')->where('item_id','=',$itemid)->delete();
        
        return 'success';
    }
    
    public function getstock(Request $request){
    
        $stckqty =  $request->input('qtyarived');
        
        $stockqty = DB::table('inv_arrivedstocks')->where('qty_arrived','=',$stckqty)->get();
        
        return $stockqty;
    
    }
    
    public function editstock(Request $request){
    
        $stockid = $request->input('stockid');
        $itemid = $request->input('itemid');
        $brandid = $request->input('brandid');
        $description = $request->input('description');
        $qtyarrived = $request->input('qtyarrived');
        $qtyreject = $request->input('qtyreject');
        $qtyadd = $request->input('qtyadd');
        
         DB::table('inv_rejectedstocks')->insert(array('stock_id'=>$stockid,'item_id'=>$itemid,'brand_id'=>$brandid,'description'=>$description,'qty_rejected'=>$qtyreject));
        
        $qtynowinstore = DB::table('inv_items')->where('itm_id','=',$itemid)->first();
        $newq1 = $qtynowinstore->qtyinhand;
        $newq2 = $newq1+$qtyadd;
        
        DB::table('inv_items')->where('itm_id','=',$itemid)->update(array('qtyinhand'=>$newq2));
        
        DB::table('inv_orders')->where('item_id','=',$itemid)->delete();
        
        DB::table('inv_arrivedstocks')->where('item_id','=',$itemid)->delete();
    
        return 'success';
        
    }
}
