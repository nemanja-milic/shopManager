<?php

use App\Enums\RolesEnums;
use App\Models\Role;
use App\Models\Shop;
use App\Models\ShopDeleted;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class);

test('admin can add shop', function () {

    $user = makeAdmin();

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

    $user = makeAdmin();

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

// test("can admin on click edit see edit form with data filled", function(){

//     $user = User::factory()->create([
//         'is_admin' => true,
//     ]);

//     $this->actingAs($user);
//     $shop = Shop::create([
//         "name" => "Simply shop",
//         "country" => "Serbia",
//         "city" => "Belgrade",
//         "street" => "Mite Ruzica 9",
//         "country_id" => 1,
//     ]);
//     // make simple shop
//     // make get request to the shop/edit/shop->id
//     // see is there a form with data filled
//     // see does the button trigger the shop edit path
//     // do i get redirected

// });

test("can admin edit shop", function(){

    $user = makeAdmin();

    $this->actingAs($user);
    $shop = Shop::create([
        "name" => "Simply shop",
        "country" => "Serbia",
        "city" => "Belgrade",
        "street" => "Mite Ruzica 9",
        "country_id" => 1,
    ]);

    $response = $this->put("/shop/edit/$shop->id", [
        "name" => "Simply shop",
        "country" => "Serbia",
        "city" => "Belgrade",
        "street" => "Lajkovacka 11",
        "country_id" => 1,
    ]);

    $response->assertStatus(302);

    $updatedShop = Shop::where("id", $shop->id)->first();
    expect($updatedShop->street)->toBe("Lajkovacka 11");

});

// helpers function
function makeAdmin() {
    return User::factory()->create([
        'role_id' => (Role::where("name", RolesEnums::ADMIN->value)->first())->id,
    ]);
}
