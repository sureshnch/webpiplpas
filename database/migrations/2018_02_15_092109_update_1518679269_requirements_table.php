<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1518679269RequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirements', function (Blueprint $table) {
            
if (!Schema::hasColumn('requirements', 'closing_date')) {
                $table->date('closing_date')->nullable();
                }
if (!Schema::hasColumn('requirements', 'positions')) {
                $table->integer('positions')->nullable();
                }
if (!Schema::hasColumn('requirements', 'skills')) {
                $table->string('skills')->nullable();
                }
if (!Schema::hasColumn('requirements', 'experience_from_years')) {
                $table->enum('experience_from_years', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'experience_from_months')) {
                $table->enum('experience_from_months', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'experience_to_years')) {
                $table->enum('experience_to_years', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'experience_to_months')) {
                $table->enum('experience_to_months', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'salary_range')) {
                $table->enum('salary_range', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'availabity')) {
                $table->enum('availabity', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'referal_fee')) {
                $table->integer('referal_fee')->nullable();
                }
if (!Schema::hasColumn('requirements', 'point_of_contact')) {
                $table->string('point_of_contact')->nullable();
                }
if (!Schema::hasColumn('requirements', 'email')) {
                $table->string('email')->nullable();
                }
if (!Schema::hasColumn('requirements', 'code')) {
                $table->double('code', 15, 2)->nullable();
                }
if (!Schema::hasColumn('requirements', 'phone_number')) {
                $table->integer('phone_number')->nullable();
                }
if (!Schema::hasColumn('requirements', 'skype_id')) {
                $table->string('skype_id')->nullable();
                }
if (!Schema::hasColumn('requirements', 'comment_box')) {
                $table->text('comment_box')->nullable();
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
        Schema::table('requirements', function (Blueprint $table) {
            $table->dropColumn('closing_date');
            $table->dropColumn('positions');
            $table->dropColumn('skills');
            $table->dropColumn('experience_from_years');
            $table->dropColumn('experience_from_months');
            $table->dropColumn('experience_to_years');
            $table->dropColumn('experience_to_months');
            $table->dropColumn('salary_range');
            $table->dropColumn('availabity');
            $table->dropColumn('referal_fee');
            $table->dropColumn('point_of_contact');
            $table->dropColumn('email');
            $table->dropColumn('code');
            $table->dropColumn('phone_number');
            $table->dropColumn('skype_id');
            $table->dropColumn('comment_box');
            
        });

    }
}
