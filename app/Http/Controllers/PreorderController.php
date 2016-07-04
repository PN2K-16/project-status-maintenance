<?php

namespace App\Http\Controllers;

use App\preorder;
use App\preorderItem;
use App\item;
use App\category;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Session;

class PreorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($category=NULL)
    {
        $categoryList = category::select('name')->get();
        if (session()->has('customer_id')) {
            $orderItems = DB::table('session_preorder')
                            ->where('customer_id', session()->get('customer_id'))
                            ->count();
        } else {
            $orderItems = 0;
        }

        if ($category) {
            $category_id = DB::table('inv_categories')->where('name', $category)->pluck('id');
            //$category_id = category::where('name', $category)->pluck('id');
            $items = DB::table('inv_items')->where('department_id', $category_id)->get();
            //$items = item::where('department_id', $category_id)->get();
            //$items = DB::table('inv_categories')->where('name', $category)->get();
            return view('Praveen.preorder')->withCategory($category)->withList($categoryList)->withOrderitems($orderItems);
        }
        else {
            $category='All';
            $items = DB::table('inv_items')->get(); 
            return view('Praveen.preorder')->withCategory($category)->withList($categoryList)->withOrderitems($orderItems);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Praveen.preorder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        /*
        if ($request->input('description')=='') {
            Session::flash('error-message', 'Order was not placed. If the problem persists, please contact staff.');
            return redirect('preorder/pending');
        }
        */

        $validate_preorder = Validator::make(
            [],
            []
            );

        $preorder = new preorder;

        $created = $preorder->create($request->all());

        Session::flash('message', 'Your order has been placed!');
        return redirect('preorder/pending');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $preorder = preorder::find($id);
        //$preorderItems = preorderItem::preorder($id)->get();
        $preorderItems = DB::table('preorderItems')
                            ->leftJoin('inv_items', 'preorderItems.item_id', '=', 'inv_items.itm_id')
                            ->select('preorderItems.*', 'inv_items.description', 'inv_items.sellprice')
                            ->get();

        return view('Praveen.one')->withPreorder($preorder)->withItems($preorderItems);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $preorder = preorder::find($id);

        $preorder->status = 'cancelled';
        $preorder->save();
        Session::flash('message', 'Your order has been cancelled.');
        return redirect('preorder/pending');
    }
    
    /**
     * Display pending orders
     *
     * @return Response
     */
    public function getPending()
    {
        $route = \Route::current();
        $param1 = $route->getParameter('one');

        //Session::get('currentPreorder');
        //Session::get('customer_id');

        $pending = new preorder;
        
        $pending = preorder::pending()->orderBy('updated_at', 'description')->get();
        
        return view('Praveen.pending')->with('preorders', $pending);
    }
    
    /**
     * Display order history
     *
     * @return Response
     */
    public function getHistory()
    {
        $route = \Route::current();
        $param1 = $route->getParameter('one');

        $completed = new preorder;
        
        $completed = preorder::completed()->get();
        $cancelled = preorder::cancelled()->orderBy('updated_at')->get();
        $history = $completed->merge($cancelled);

        return view('Praveen.history')->with('preorders', $history);
    }

    // Return search for items

    public function getSearch(Request $request){
        if ($request) {
        $search=$request->input('search');
        $result=DB::table('inv_items')->where('description','like',$search.'%')->get();
        //return array($search, 'Item2', 'Item3', 'Item4', 'Item5');
            return $result;
        } else {
            return $result;
        }
    }

    public function getCategory(Request $request) {
        $category = $request->input('category');
        //$result = DB::table('item_details')->where('item_category','like',$category)->get();
        return '$result';
    }

    public function getItems(Request $request) {
        if ($request) {
            $category = $request->input('category');
        } 


        if ($category) {

            if ($category==='All') {
                //$items = DB::table('inv_items')->get(); 
                $items = DB::table('inv_items')
                            ->leftJoin('itemimages', 'inv_items.itm_id', '=', 'itemimages.item_id')
                            ->get();
                return $items;
            }

            $category_id = DB::table('inv_categories')->where('name', $category)->pluck('id');
            $items = DB::table('inv_items')
                            ->leftJoin('itemimages', 'inv_items.itm_id', '=', 'itemimages.item_id')
                            ->where('department_id', $category_id)
                            ->get();
            return $items;
        }
        else {
            $items = DB::table('inv_items')
                            ->leftJoin('itemimages', 'inv_items.itm_id', '=', 'itemimages.item_id')
                            ->get();
            return $items;
        }

    }

    public function getIteminfo(Request $request) {
        $item_id = $request->input('id');

        $item = DB::table('inv_items')
                ->leftJoin('itemimages', 'inv_items.itm_id', '=', 'itemimages.item_id')
                ->where('inv_items.itm_id', $item_id)
                ->get();

        return $item;
    }

    public function getAdditem(Request $request) {
/*
            $id = $request->input('id');
            $qty = $request->input('qty');

            DB::table('session_preorder')->insert([
                'customer_id' => 1,//session()->get('customer_id'),
                'item_id' => $id,
                'qty' => $qty
                ]);
*/
            return 'success';
    }

    public function getCheckout(Request $request) {

            $sessionPreorder = DB::table('session_preorder')->get();

            //$preorder = new preorder();

            foreach ($sessionPreorder as $preorderItem) {

                $item = DB::table('inv_items')
                            ->where('itm_id', $preorder->item_id)
                            ->get();
                $value = $item->sellingprice * $sessionPreorder->qty;

                DB::table('preorderItems')->insert([
                    'customer_id' => 1,
                    'value' => $value,
                    'description' => '',
                    'qty' => '',

                    'paid' => 0
                    ]);
            }


            return 'success';
        
    }

}
