<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
           // create permissions
       /* Permission::create( ['name' => 'create roles'] );
        Permission::create( ['name' => 'read roles'] );
        Permission::create( ['name' => 'edit roles'] );
        Permission::create( ['name' => 'delete roles'] );

        Permission::create( ['name' => 'create users'] );
        Permission::create( ['name' => 'read users'] );
        Permission::create( ['name' => 'edit users'] );
        Permission::create( ['name' => 'delete users'] );

        Permission::create( ['name' => 'create permissions'] );
        Permission::create( ['name' => 'read permissions'] );
        Permission::create( ['name' => 'edit permissions'] );
        Permission::create( ['name' => 'delete permissions'] );


        $role = Role::create( ['name' => 'administrador'] );
        //$role = Role::findOrFail(1);
        $role->givePermissionTo( Permission::all() );*/

        //$user = User::findOrFail(1);
        // $administrador = User::create( [
        //     'name'=>'Administrador',
        //     'email'=>'admin@mail.com',
        //     'password'=> bcrypt( '12345678' ),
        // ] );

        // $administrador->assignRole('administrador');
        // $role = Role::create( ['name' => 'facilitator'] );
        // $role = Role::create( ['name' => 'member'] );
    }
}
