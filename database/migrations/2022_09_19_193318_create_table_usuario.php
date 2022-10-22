<?php

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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('password');
            $table->string('cargo');
            $table->boolean('admin')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        $u = new Usuario();
        $u->nombre = "Benjamin";
        $u->apellido = "Mora";
        $u->correo = "bej.mora@profesor.duoc.cl";
        $u->password = hash('sha256', 'feebacks');
        $u->cargo = "Profesor";
        $u->admin = true;
        $u->save();
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};
