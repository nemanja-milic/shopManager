<?php

use App\Models\Shop;
use App\Models\ShopDeleted;
use App\Models\WorkingTimeShop;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Enums\DaysInWeek;

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

    $shop = Shop::factory()->create();

    $workingTimes = [
        [
            'shop_id'      => $shop->id,
            'day_of_week'  => DaysInWeek::MONDAY->name,
            'opening_time' => '09:00:00',
            'closing_time' => '17:00:00',
        ],
        [
            'shop_id'      => $shop->id,
            'day_of_week'  => DaysInWeek::TUESDAY->name,
            'opening_time' => '09:00:00',
            'closing_time' => '17:00:00',
        ],
        [
            'shop_id'      => $shop->id,
            'day_of_week'  => DaysInWeek::WEDNESDAY->name,
            'opening_time' => '09:00:00',
            'closing_time' => '17:00:00',
        ],
        [
            'shop_id'      => $shop->id,
            'day_of_week'  => DaysInWeek::THURSDAY->name,
            'opening_time' => '09:00:00',
            'closing_time' => '17:00:00',
        ],
        [
            'shop_id'      => $shop->id,
            'day_of_week'  => DaysInWeek::FRIDAY->name,
            'opening_time' => '09:00:00',
            'closing_time' => '17:00:00',
        ],
        [
            'shop_id'      => $shop->id,
            'day_of_week'  => DaysInWeek::SATURDAY->name,
            'opening_time' => '10:00:00',
            'closing_time' => '14:00:00',
        ],
        [
            'shop_id'      => $shop->id,
            'day_of_week'  => DaysInWeek::SUNDAY->name,
            'opening_time' => '10:00:00',
            'closing_time' => '14:00:00',
        ]
    ];

    foreach ($workingTimes as $workingTime) {
        WorkingTimeShop::create($workingTime);
    }

    foreach ($workingTimes as $workingTime) {
        $this->assertDatabaseHas('working_time_shops', [
            'shop_id'      => $workingTime['shop_id'],
            'day_of_week'  => $workingTime['day_of_week'],
            'opening_time' => $workingTime['opening_time'],
            'closing_time' => $workingTime['closing_time'],
        ]);
    }

});

