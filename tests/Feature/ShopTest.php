<?php

use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

test('admin can add shop', function () {

    $user = User::factory()->create([
        'is_admin' => true,
    ]);

    // Authenticate the user
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
