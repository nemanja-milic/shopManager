<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class);

test("can admin login", function(){
    $user = User::factory()->create();

    $response = $this->post("/login", [
        "email" => $user->email,
        "password" => $user->password,
    ]);

    $response->assertStatus(302);

});
