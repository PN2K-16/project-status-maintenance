<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('project_main', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('remarks');
            $table->string('incharge');
            $table->date('expected');
            $table->float('percentage');
            $table->string('status');
            $table->string('dept');
         
        });
        
        
        
        //1
          DB::table('project_main')->insert([
            'name' => 'Finance Automation Project',
            'remarks' => '',
              'incharge' => 'Anuranga',
              'expected' => '2016-03-02',
              'percentage' => '20.1',
              'status' => 'In-Progress',
          
               'dept' => 'Shared' 
            
            ]);
//2
      DB::table('project_main')->insert([
            'name' => 'TCS Core System',
            'remarks' => '',
              'incharge' => 'Rajeev',
              'expected' => '2015-09-22',
              'percentage' => '100',
              'status' => 'Done',
          
               'dept' => 'Shared' 
            
            ]);
        //3
          DB::table('project_main')->insert([
            'name' => 'Sales Force System Revamp',
            'remarks' => '',
              'incharge' => 'Nilesh',
              'expected' => '2015-11-20',
              'percentage' => '60',
              'status' => 'In-Progress',
          
               'dept' => 'Life' 
            
            ]);
        
        
        
       //4
          DB::table('project_main')->insert([
            'name' => 'Centralized Underwriting System',
            'remarks' => '',
              'incharge' => 'Tharindu',
              'expected' => '2015-11-20',
              'percentage' => '60',
              'status' => 'In-Progress',
          
               'dept' => 'Life' 
            
            ]);
          
        
         //4
          DB::table('project_main')->insert([
            'name' => 'Document Management System',
            'remarks' => '',
              'incharge' => 'Tharindu',
              'expected' => '2015-11-20',
              'percentage' => '60',
              'status' => 'In-Progress',
          
               'dept' => 'Life' 
            
            ]);
        
        
        
        
        
        
        
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::drop('project_main');
    }
}
