<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCricketerIdToCricketerTeamTable extends Migration
{
    public function up()
    {
        Schema::table('cricketer_team', function (Blueprint $table) {
            $table->unsignedBigInteger('cricketer_id');
            $table->foreign('cricketer_id')->references('id')->on('cricketers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('cricketer_team', function (Blueprint $table) {
            $table->dropForeign(['cricketer_id']);
            $table->dropColumn('cricketer_id');
        });
    }
}
