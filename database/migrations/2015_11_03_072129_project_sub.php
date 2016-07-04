<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectSub extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('project_sub', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_id');
            $table->string('sub_name');
    
            $table->date('finished');
            $table->string('status');
           
             
             
         
        });
        
        
                   DB::table('project_sub')->insert([
            'main_id' => '1',
            'sub_name' => 'Name 1',
              
              'finished' => '2015-09-20',
              
              'status' => 'Done',
          
             
            
            ]);
        
                  DB::table('project_sub')->insert([
            'main_id' => '1',
            'sub_name' => 'Name 2',
              
              'finished' => '2015-09-20',
              
              'status' => 'Done',
          
             
            
            ]);
             
                    DB::table('project_sub')->insert([
            'main_id' => '1',
            'sub_name' => 'Name 3',
              
              'finished' => '',
              
              'status' => 'In-Progress',
          
             
            
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
         Schema::drop('project_sub');
    }
}
