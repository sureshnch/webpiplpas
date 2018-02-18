<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a891b5025217RelationshipsToRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirements', function(Blueprint $table) {
            if (!Schema::hasColumn('requirements', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '119369_5a8698e841712')->references('id')->on('users')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requirements', function(Blueprint $table) {
            
        });
    }
}
