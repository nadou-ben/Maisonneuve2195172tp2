<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 50);
            $table->string('titre_fr', 50);
            $table->string('contenu', 100);
            $table->string('contenu_fr', 100);
            $table->unsignedBigInteger('etudientId');
            $table->date('date');
            $table->foreign('etudientId')->references('id')->on('etudients');
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
        Schema::dropIfExists('articles');
    }
}
