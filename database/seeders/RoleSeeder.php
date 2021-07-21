<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $names = UserRole::getValues();

        foreach ($names as $name)
            Role::query()->create(['name' => $name]);
    }
}
