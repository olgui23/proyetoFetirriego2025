<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Primero: Crear todas las columnas sin dependencias
        Schema::table('users', function (Blueprint $table) {
            // 1. Añadir nombre (sin 'after' para evitar problemas)
            if (!Schema::hasColumn('users', 'nombre')) {
                $table->string('nombre')->nullable();
            }

            // 2. Añadir apellidos (sin 'after' inicialmente)
            if (!Schema::hasColumn('users', 'apellidos')) {
                $table->string('apellidos')->nullable();
            }

            // 3. Añadir fecha_nacimiento
            if (!Schema::hasColumn('users', 'fecha_nacimiento')) {
                $table->date('fecha_nacimiento')->nullable();
            }

            // 4. Añadir género
            if (!Schema::hasColumn('users', 'genero')) {
                $table->enum('genero', ['masculino', 'femenino', 'otro'])->nullable();
            }

            // 5. Añadir username
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->nullable();
            }

            // 6. Añadir foto_perfil
            if (!Schema::hasColumn('users', 'foto_perfil')) {
                $table->string('foto_perfil')->nullable();
            }
        });

        // Segundo: Reorganizar las columnas (en una migración separada si es necesario)
        DB::statement('ALTER TABLE users MODIFY COLUMN nombre VARCHAR(255) AFTER id');
        DB::statement('ALTER TABLE users MODIFY COLUMN apellidos VARCHAR(255) AFTER nombre');
        DB::statement('ALTER TABLE users MODIFY COLUMN fecha_nacimiento DATE AFTER apellidos');
        DB::statement('ALTER TABLE users MODIFY COLUMN genero ENUM("masculino","femenino","otro") AFTER fecha_nacimiento');
        DB::statement('ALTER TABLE users MODIFY COLUMN username VARCHAR(255) AFTER genero');
        DB::statement('ALTER TABLE users MODIFY COLUMN foto_perfil VARCHAR(255) AFTER password');

        // Tercero: Añadir unicidad al username
        Schema::table('users', function (Blueprint $table) {
            $table->unique('username');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar restricción de unicidad primero
            $table->dropUnique(['username']);

            // Eliminar columnas
            $columnsToDrop = [
                'foto_perfil',
                'username',
                'genero',
                'fecha_nacimiento',
                'apellidos',
                'nombre'
            ];
            
            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};