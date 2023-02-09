<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'firstname' => 'Admin',
            'lastname' => 'Account',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'phone' => '85767113554',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $roleAdmin = Role::create(['name' => 'admin']);
        $permissionsAdmin = Permission::pluck('id','id')->all();
        $roleAdmin->syncPermissions($permissionsAdmin);
        $admin->assignRole([$roleAdmin->id]);

        $user = User::create([
            'firstname' => 'Customer',
            'lastname' => 'Account',
            'username' => 'customer',
            'email' => 'customer@test.com',
            'password' => bcrypt('password'),
            'phone' => '85767113554',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $roleUser = Role::create(['name' => 'customer']);
        $permissions = [
            'transaction-list',
            'history-list',
        ];
        $roleUser->syncPermissions($permissions);
        $user->assignRole([$roleUser->id]);

        Address::create([
            'user_id' => 2,
            'title' => strtoupper('Rumah Utama'),
            'name' => 'Ranny',
            'wa' => '85767113554',
            'phone' => '85767113554',
            'address' => strtoupper('Jl Paus Raya'),
            'provinsi' => strtoupper('DKI JAKARTA'),
            'kabupaten' => strtoupper('Jakarta Barat'),
            'kecamatan' => strtoupper('Kebon Jeruk'),
            'type' => strtoupper('UTAMA'),
            'pos' => 11530,
            'created_at' => now(),
        ]);
        Address::create([
            'user_id' => 2,
            'title' => strtoupper('Kantor'),
            'name' => 'Ranny',
            'wa' => '85767113554',
            'phone' => '85767113554',
            'address' => strtoupper('Jl Lumba Lumba'),
            'provinsi' => strtoupper('DKI JAKARTA'),
            'kabupaten' => strtoupper('Jakarta Barat'),
            'kecamatan' => strtoupper('Kebon Jeruk'),
            'type' => strtoupper('UMUM'),
            'pos' => 11530,
            'created_at' => now(),
        ]);
    }
}
