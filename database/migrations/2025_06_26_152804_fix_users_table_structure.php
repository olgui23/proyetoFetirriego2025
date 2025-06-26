<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Verificar si existe la columna 'name' y eliminarla
        if (Schema::hasColumn('users', 'name')) {
            $table->dropColumn('name');
        }
        
        // Asegurar que 'nombre' existe y es NOT NULL
        if (!Schema::hasColumn('users', 'nombre')) {
            $table->string('nombre')->after('id');
        }
    });
}

public function down()
{
    // Opcional: reversión si necesitas
    Schema::table('users', function (Blueprint $table) {
        $table->string('name')->after('id');
    });
}
};
