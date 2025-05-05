<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert(
            [
                [
                    'name' => 'Super admin',
                    'code' => 'SUPERADMIN',
                    'access_control' => json_encode(
                        [
                            'ACCESS_USER_LIST',
                            'ACCESS_ROLE_LIST',
                            'ACCESS_DASHBOARD'
                        ]
                    ),
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'Admin',
                    'code' => 'ADMIN',
                    'access_control' => json_encode([
                        'ACCESS_USER_LIST',
                        'ACCESS_DASHBOARD'
                    ]),
                    'created_at' => Carbon::now()
                ],
                [
                    'name' => 'User',
                    'code' => 'USER',
                    'access_control' => json_encode([
                        'ACCESS_DASHBOARD'
                    ]),
                    'created_at' => Carbon::now()
                ]
            ]
        );
    }
}
