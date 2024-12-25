<?php

use App\Models\Shop;
use App\Models\ShopDeleted;
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
    $response = $this->post("/shop/add", [
        "name" => "Simply shop",
        "country" => "Serbia",
        "city" => "Belgrade",
        "street" => "Mite Ruzica 9",
        "country_id" => 1,
    ]);

    $response->assertStatus(302);

    expect(
        Shop::where("name", "Simply shop")->exists()
    )->toBe(true);
});

test("admin can delete shop", function(){
    $user = User::factory()->create([
        'is_admin' => true,
    ]);

    $this->actingAs($user);
    $shop = Shop::create([
        "name" => "Simply shop",
        "country" => "Serbia",
        "city" => "Belgrade",
        "street" => "Mite Ruzica 9",
        "country_id" => 1,
    ]);

    $response = $this->delete("/shop/delete/".$shop->id);
    $response->assertStatus(302);

    expect(
        Shop::where("id", $shop->id)->exists()
    )->toBe(false, "Shop is not deleted from table shop");
    expect(
        ShopDeleted::where("shop_id", $shop->id)->exists()
    )->toBe(true, "deleted shop is not deleted_shops");
});
