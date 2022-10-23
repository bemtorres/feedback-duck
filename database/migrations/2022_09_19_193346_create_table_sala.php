<?php

use App\Models\Sala;
use App\Models\Usuario;
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
        Schema::create('sala', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('url');
            $table->foreignId('id_usuario')->references('id')->on('usuario');
            $table->string('image')->nullable();
            $table->json('config')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });


        $s = new Sala();
        $s->nombre = "Diseño y prototipo";
        $s->url = "diseno-y-prototipo";
        $s->id_usuario = 1;
        $s->save();
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
