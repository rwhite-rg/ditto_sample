<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialMappingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('music_contracts') && Schema::hasTable('usages')) {
            Schema::create('music_contract_usage', function (Blueprint $table) {
                    $table->integer('music_contract_id')->unsigned();
                    $table->foreign('music_contract_id')->references('id')->on('music_contracts');

                    $table->integer('usage_id')->unsigned();
                    $table->foreign('usage_id')->references('id')->on('usages');
            });
        } else {
            if (!Schema::hasTable('music_contracts')) {
                echo "music_contracts table is missing.\n";
            }
            if (!Schema::hasTable('usages')) {
                echo "usages table is missing.\n";
            }
            echo "Not creating music_contract_usage mapping table.\n";
        }

        if (Schema::hasTable('dp_contracts') && Schema::hasTable('usages')) {
            Schema::create('dp_contract_usage', function (Blueprint $table) {
                $table->integer('dp_contract_id')->unsigned();
                $table->foreign('dp_contract_id')->references('id')->on('dp_contracts');

                $table->integer('usage_id')->unsigned();
                $table->foreign('usage_id')->references('id')->on('usages');
            });
        } else {
            if (!Schema::hasTable('dp_contracts')) {
                echo "dp_contracts table is missing.\n";
            }
            if (!Schema::hasTable('usages')) {
                echo "usages table is missing.\n";
            }
            echo "Not creating dp_contract_usage mapping table.\n";

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_contract_usage');
        Schema::dropIfExists('dp_contract_usage');
    }
}
