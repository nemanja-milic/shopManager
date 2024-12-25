<?php

use App\Models\Shop;
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

test('admin can add shop', function () {

    $user = User::factory()->create([
        'is_admin' => true,
    ]);

    $this->actingAs($user);
    $response = $this->post("/store/add", [
        "name" => "Simply shop",
        "country" => "Serbia",
        "city" => "Belgrade",
        "street" => "Mite Ruzica 9",
        "country_id" => 1,
    ]);

    $response->assertStatus(200);

    expect(
        Shop::where("name", "Simply shop")->exists()
    )->toBe(true);
});
