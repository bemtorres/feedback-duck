<?php

use App\Models\Muro;
use App\Models\Sala;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muro', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('id_sala')->references('id')->on('sala');
            $table->json('config')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        $id_sala = 1;
        $m = new Muro();
        $m->titulo = "Delivery";
        $m->id_sala = $id_sala;
        $m->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sistema');
    }
};
