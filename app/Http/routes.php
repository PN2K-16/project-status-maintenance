<?php 

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Input;


Route::get('/', function () {
    
    
    $motor = DB::table('project_main')->where('dept','=','motor')->get();
    $life = DB::table('project_main')->where('dept','=','life')->get();
    $shared = DB::table('project_main')->where('dept','=','shared')->get();
    
    return view('PolicyMart.pInforce')
        ->with('life',$life)
          ->with('shared',$shared)
        ->with('motor',$motor);
    
});

Route::get('/admin', function () {
    
    
    $motor = DB::table('project_main')->where('dept','=','motor')->get();
    $life = DB::table('project_main')->where('dept','=','life')->get();
    $shared = DB::table('project_main')->where('dept','=','shared')->get();
    
    return view('PolicyMart.pModeMix');
         
    
});


Route::get('/save_main',function(){

      $id=  DB::table('project_main')->insertGetId([
            'name' => Input::get('title'),
            'remarks' =>  Input::get('remarks'),
              'incharge' => Input::get('incharge'),
              'expected' => Input::get('expected'),
              'percentage' => Input::get('percentage'),
              'status' =>  Input::get('status'),
          
               'dept' => Input::get('dept') 
            
            ]);

return $id;

});

 Route::get('/save_sub',function(){

        DB::table('project_sub')->insert([
            'main_id' => Input::get('main'),
            'sub_name' => Input::get('subname'),
              
              'finished' => Input::get('finished'),
              
              'status' => Input::get('status1') 
          
             
            
            ]);
     
    $lol= DB::table('project_sub')->where('main_id','=',Input::get('main'))->get();

return  $lol;

});

 

Route::get('/edit', function () {
    
    
    $motor = DB::table('project_main')->where('dept','=','motor')->get();
    $life = DB::table('project_main')->where('dept','=','life')->get();
    $shared = DB::table('project_main')->where('dept','=','shared')->get();
    
    return view('PolicyMart.pLapsed')
        ->with('life',$life)
          ->with('shared',$shared)
        ->with('motor',$motor);
    
});

 