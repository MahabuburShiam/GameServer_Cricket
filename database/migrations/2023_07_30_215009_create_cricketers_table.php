<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCricketersTable extends Migration
{

    public function up()
    {
        Schema::create('cricketers', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->integer('innings')->nullable();
            $table->float('run_rate')->nullable();
            $table->integer('matches_played')->nullable();
            $table->text('other_details')->nullable();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('cricketers');
    }
}
