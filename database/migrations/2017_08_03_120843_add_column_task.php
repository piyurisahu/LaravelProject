<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('tasks',function (Blueprint $table)
        {
           // $table->integer('user_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //$table->dropColumn('user_id');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');

        });
    }
}
