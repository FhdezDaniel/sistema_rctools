<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'DireccionGeneral']);
        $role3 = Role::create(['name' => 'Supervisor']);
        $role4 = Role::create(['name' => 'GerenteProduccion']);
        $role5 = Role::create(['name' => 'Operador']);
        $role6 = Role::create(['name' => 'JefeCalidad']);       
    }

    public function down(): void
    {
        
    }
};
