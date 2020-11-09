<?php

use App\Models\Contractor;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ContractorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit contractor']);
        Permission::create(['name' => 'delete contractor']);
        Permission::create(['name' => 'create contractor']);
        Permission::create(['name' => 'index contractor']);
        Permission::create(['name' => 'show contractor']);
        Permission::create(['name' => 'update contractor']);
        Permission::create(['name' => 'api_get contractor']);
        Role::findByName('super-admin')->givePermissionTo(Permission::all());
        Role::findByName('admin')->givePermissionTo(Permission::all());
        factory(Contractor::class, 100)->create();
    }
}
