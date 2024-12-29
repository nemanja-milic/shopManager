<?php

use App\Enums\RolesEnums;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class);

test("can admin login", function(){

    $user = User::factory()->create([
        "role_id" => (Role::create(["name"=> RolesEnums::ADMIN->value]))->id
    ]);

    $response = $this->post("/login", [
        "email" => $user->email,
        "password" => $user->password,
    ]);

    $response->assertStatus(302);

});

// test("can manager log", function(){



// });

// test("can employee log", function(){



// });

