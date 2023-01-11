<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_stages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lettre_motivation');
            $table->string('url_cv');
            $table->string('statut_demande');

            $table->foreignId('offre_stages_id')->nullable()
            ->constrained();

            $table->foreignId('user_id')->constrained();

            #->references('id')->on('offre_stages')
            
            #$table->foreignId('user_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_stages');
    }
}
