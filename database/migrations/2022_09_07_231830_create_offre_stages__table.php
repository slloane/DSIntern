<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffreStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offre_stages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type_stage');
            $table->string('duree_stage');
            $table->string('sujet_stage');
            $table->text('profil_requis');
            $table->string('lieu_stage');
            $table->text('description_stage');

            //$table->unsignedBigInteger('created_by_id');
            //$table->foreign('created_by_id')->references('id')->on('users');
            $table->foreignId('user_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offre_stages');
    }
}
