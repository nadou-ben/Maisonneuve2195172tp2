<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudients', function (Blueprint $table) {
            $table->id()->primaryKey()->increment();
           // $table->string('nom', 50);
            $table->string('adresse',100);
            $table->string('phone',25);
          //  $table->string('email',100)->unique();;
            $table->date('date_naissance');
            $table->unsignedBigInteger('villeId');
            $table->foreign('villeId')->references('id')->on('villes');
            $table->foreign('id')->references('id')->on('useres');
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
        Schema::dropIfExists('etudients');
    }
}
