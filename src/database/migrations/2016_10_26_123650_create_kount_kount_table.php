<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKountKountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('kount')){
            Schema::create('kount', function($table)
                {
                
                    $table->increments('id');
                    $table->string('AUTO',1)->nullable();
                    $table->string('BROWSER',64)->nullable();
                    $table->string('BRND',4)->nullable();
                    $table->integer('CARDS')->nullable();
                    $table->boolean('COOKIES')->nullable();
                    $table->integer('COUNTERS_TRIGGERED')->nullable();
                    $table->string('COUNTER_NAME_X',64)->nullable();
                    $table->integer('COUNTER_VALUE_X')->nullable();
                    $table->string('COUNTRY',2)->nullable();
                    $table->string('DDFS',10)->nullable();
                    $table->string('DEVICE_LAYERS',55)->nullable();
                    $table->integer('DEVICES')->nullable();
                    $table->string('DSR',10)->nullable();
                    $table->integer('EMAILS')->nullable();
                    $table->integer('ERROR_COUNT')->nullable();
                    $table->string('ERROR_N',255)->nullable();
                    $table->string('FINGERPRINT',32)->nullable();
                    $table->boolean('FLASH')->nullable();
                    $table->string('GEOX',2)->nullable();
                    $table->string('HTTP_COUNTRY',2)->nullable();
                    $table->string('IP_IPAD',16)->nullable();
                    $table->boolean('JAVASCRIPT')->nullable();
                    $table->boolean('KAPT')->nullable();
                    $table->boolean('KYCF')->nullable();
                    $table->string('LANGUAGE',2)->nullable();
                    $table->string('LOCALTIME',20)->nullable();
                    $table->string('MERC',40)->nullable();
                    $table->boolean('MOBILE_DEVICE')->nullable();
                    $table->boolean('MOBILE_FORWARDER')->nullable();
                    $table->string('MOBILE_TYPE',32)->nullable();
                    $table->string('MODE',1)->nullable();
                    $table->string('NETW',1)->nullable();
                    $table->string('ORDR',32)->nullable();
                    $table->string('OS',64)->nullable();
                    $table->boolean('PC_REMOTE')->nullable();
                    $table->string('PIP_IPAD',16)->nullable();
                    $table->boolean('PROXY')->nullable();
                    $table->string('REASON_CODE',16)->nullable();
                    $table->string('REGN',2)->nullable();
                    $table->string('REGION',2)->nullable();
                    $table->string('RULES_TRIGGERED',255)->nullable();
                    $table->string('RULE_DESCRIPTION_X',255)->nullable();
                    $table->string('RULE_ID_X',255)->nullable();
                    $table->string('SCOR',255)->nullable();
                    $table->string('SESS',32)->nullable();
                    $table->string('SITE',8)->nullable();
                    $table->string('STAT',1)->nullable();
                    $table->string('TIMEZONE',6)->nullable();
                    $table->string('TRAN',12)->nullable();
                    $table->string('UAS',1024)->nullable();
                    $table->string('VELO',255)->nullable();
                    $table->string('VERS',4)->nullable();
                    $table->string('VMAX',255)->nullable();
                    $table->boolean('VOICE_DEVICE')->nullable();
                    $table->integer('WARNING_COUNT')->nullable();
                    $table->integer('WARNING_N')->nullable();
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
        Schema::drop('kount');
    }
}
