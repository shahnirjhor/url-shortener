<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleMember = Role::insert([
            [
                'name' => 'Member',
                'guard_name' => 'web',
                'price' => '1',
                'validity' => '1825',
                'is_default' => '1',
            ],
        ]);
        $memberRole = Role::where('name', 'Member')->first();
        $memberPermissions = Permission::select('id')
            ->where('name', 'not like', 'role-%')
            ->where('name', 'not like', 'user-%')
            ->get()
            ->pluck('id');
        $memberRole->syncPermissions($memberPermissions);

        $member = User::create([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '01712340889',
            'address' => 'Dhaka, BD',
            'status' => '1',
        ]);
        $member->assignRole([$memberRole->id]);

        $role = Role::insert([
            [
                'name' => 'Super Admin',
                'guard_name' => 'web',
                'price' => '1',
                'validity' => '1825',
                'is_default' => '1',
            ],
        ]);
        $adminRole = Role::where('name', 'Super Admin')->first();
        $permissions = Permission::select('id')->get()->pluck('id');
        $adminRole->syncPermissions($permissions);

        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '01712340889',
            'address' => 'Dhaka, BD',
            'status' => '1',
        ]);
        $admin->assignRole([$adminRole->id]);
    }
}
