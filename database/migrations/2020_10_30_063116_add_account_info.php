<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('account_info', function (Blueprint $table) {
            $table->text('remarks');
            $table->string('sex');
            $table->date('birthday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropColumns('account_info','remarks');
        Schema::dropColumns('account_info','sex');
        Schema::dropColumns('account_info','birthday');
    }
}
