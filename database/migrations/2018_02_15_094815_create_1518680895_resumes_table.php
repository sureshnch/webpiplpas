<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1518680895ResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('resumes')) {
            Schema::create('resumes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('email')->nullable();
                $table->double('code', 15, 2)->nullable();
                $table->integer('mobile_number')->nullable();
                $table->string('pancard')->nullable();
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('country')->nullable();
                $table->string('educational_qualification')->nullable();
                $table->enum('primary_skills', array('Please Select'))->nullable();
                $table->string('sub_skills')->nullable();
                $table->enum('work_experience_years', array('Please Select'))->nullable();
                $table->enum('work_experience_months', array('Please Select'))->nullable();
                $table->string('relevant_experience')->nullable();
                $table->string('notice_period')->nullable();
                $table->string('prefered_location')->nullable();
                $table->enum('current_ctc_lacks', array('Please Select'))->nullable();
                $table->enum('current_ctc_thousands', array('Please Select'))->nullable();
                $table->enum('expected_ctc_lacks', array('Please Select'))->nullable();
                $table->enum('expected_ctc_thousands', array('Please Select'))->nullable();
                $table->string('upload_resume')->nullable();
                $table->text('comment_box')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('resumes');
    }
}
