<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a8694f5b602bRelationshipsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            if (!Schema::hasColumn('users', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '119294_5a8694f40b256')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('users', function(Blueprint $table) {
            
        });
    }
}
