<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellidos')->after('name');
            $table->date('fecha_nacimiento')->after('apellidos')->nullable();
            $table->string('direccion')->after('fecha_nacimiento');
            $table->string('telefono')->after('direccion');
            $table->string('tipo_agricultor')->after('telefono')->comment('pequeño, mediano, grande');
            $table->integer('experiencia_agricola')->after('tipo_agricultor')->nullable()->comment('años de experiencia');
            $table->string('foto_perfil')->after('experiencia_agricola')->nullable();
            $table->string('tipo_cultivo')->after('foto_perfil')->nullable()->comment('lechuga romana, iceberg, etc.');
            $table->decimal('terreno_hectareas', 8, 2)->after('tipo_cultivo')->nullable();
            $table->string('metodo_cultivo')->after('terreno_hectareas')->nullable()->comment('hidroponia, campo abierto, invernadero');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'apellidos',
                'fecha_nacimiento',
                'direccion',
                'telefono',
                'tipo_agricultor',
                'experiencia_agricola',
                'foto_perfil',
                'tipo_cultivo',
                'terreno_hectareas',
                'metodo_cultivo'
            ]);
        });
    }
};