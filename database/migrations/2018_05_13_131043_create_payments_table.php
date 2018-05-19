<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clientid',10);
            $table->string('oid',64);
            $table->integer('mdStatus');
            $table->string('mdErrorMsg',50);
            $table->string('ErrMsg',50);
            $table->string('Response',50);
            $table->integer('ProcReturnCode');
            $table->string('Ecom_Payment_Card_ExpDate_Month',2);
            $table->string('currency');
            $table->integer('refreshtime');
            $table->float('amount',8,2);
            $table->string('islemtipi',50);
            $table->string('Ecom_Payment_Card_ExpDate_Year',2);
            $table->string('storetype',50);
            $table->string('ErrCode',50);
            $table->string('failUrl',50);
            $table->ipAddress('clientIp');
            $table->string('taksit',50);
            $table->string('okUrl',50);
            $table->string('lang',50);
            $table->string('xid',50);
            $table->string('HASH',50);
            $table->string('rnd',50);
            $table->string('HASHPARAMS',50);
            $table->string('HASHPARAMSVAL',50);
            $table->string('AuthCode',50);
            $table->string('PayResponse',50);
            $table->string('PayHostRefNum',50);
            $table->integer('PayProcReturnCode');
            $table->string('PayTransId',50);
            $table->string('PayErrMsg',50);
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
        Schema::dropIfExists('payments');
    }
}
