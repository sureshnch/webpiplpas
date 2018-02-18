<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1518677537RequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirements', function (Blueprint $table) {
            if(Schema::hasColumn('requirements', 'customer_name')) {
                $table->dropColumn('customer_name');
            }
            
        });
Schema::table('requirements', function (Blueprint $table) {
            
if (!Schema::hasColumn('requirements', 'customer_name')) {
                $table->enum('customer_name', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'job_type')) {
                $table->enum('job_type', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'description')) {
                $table->text('description')->nullable();
                }
if (!Schema::hasColumn('requirements', 'location')) {
                $table->enum('location', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'department')) {
                $table->enum('department', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'industry')) {
                $table->enum('industry', array('Please Select'))->nullable();
                }
if (!Schema::hasColumn('requirements', 'job_function')) {
                $table->enum('job_function', array('Please Select'))->nullable();
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
            $table->dropColumn('customer_name');
            $table->dropColumn('job_type');
            $table->dropColumn('description');
            $table->dropColumn('location');
            $table->dropColumn('department');
            $table->dropColumn('industry');
            $table->dropColumn('job_function');
            
        });
Schema::table('requirements', function (Blueprint $table) {
                        $table->enum('customer_name', array('english'))->nullable();
                
        });

    }
}
