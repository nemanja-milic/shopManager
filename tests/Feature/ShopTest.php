<?php

use App\Enums\RolesEnums;
use App\Models\Role;
use App\Models\Shop;
use App\Models\ShopDeleted;
use App\Models\User;
use Carbon\Carbon;
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

test("can admin add working time for the shop", function(){

    $shop = Shop::create();
    WorkingTimeShop::create([
        "id_shop" => $shop->id,
        "monday" => Carbon::createFromTime(8, 0, 0) . "-" . Carbon::createFromTime(17, 0, 0),
        "tuesday" => Carbon::createFromTime(8, 0, 0) . "-" . Carbon::createFromTime(17, 0, 0),
        "wednesday" => Carbon::createFromTime(8, 0, 0) . "-" . Carbon::createFromTime(17, 0, 0),
        "thursday" => Carbon::createFromTime(8, 0, 0) . "-" . Carbon::createFromTime(17, 0, 0),
        "friday" => Carbon::createFromTime(8, 0, 0) . "-" . Carbon::createFromTime(17, 0, 0),
        "saturday" => Carbon::createFromTime(8, 0, 0) . "-" . Carbon::createFromTime(17, 0, 0),
        "sunday" => Carbon::createFromTime(8, 0, 0) . "-" . Carbon::createFromTime(17, 0, 0),
        "exceptions" => [
            [
                "start_time" => null,
                "end_time" => null,
                "reason" => "Christmas"
            ],
        ],
    ]);

});

