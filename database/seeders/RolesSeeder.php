<?php

namespace Database\Seeders;

use App\Enums\RolesEnums;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = RolesEnums::values();
        foreach($roles as $role) {
            Role::create(["name" => $role]);

        }
    }
}
