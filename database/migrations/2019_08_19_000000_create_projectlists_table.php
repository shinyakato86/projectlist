<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectlists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department_name');
            $table->string('sales_name');
            $table->string('client_name');
            $table->string('project_name');
            $table->string('author_name');
            $table->integer('price');
            $table->string('status');
            $table->date('accounting_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projectlists');
    }
}
