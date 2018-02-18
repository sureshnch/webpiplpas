<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a8534e74fe95RequirementUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('requirement_user')) {
            Schema::create('requirement_user', function (Blueprint $table) {
                $table->integer('requirement_id')->unsigned()->nullable();
                $table->foreign('requirement_id', 'fk_p_119369_119294_user_r_5a8534e74ff94')->references('id')->on('requirements')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_119294_119369_requir_5a8534e750020')->references('id')->on('users')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement_user');
    }
}
