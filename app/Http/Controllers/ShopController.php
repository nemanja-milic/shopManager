<?php

namespace App\Http\Controllers;

use App\Enums\DaysInWeek;
use App\Http\Requests\BasicShopRequest;
use App\Http\Requests\EditShopRequest;
use App\Http\Requests\StoreNewShopRequest;
use App\Models\Country;
use App\Models\Shop;
use App\Models\ShopDeleted;
use App\Models\WorkingTimeShop;
use Illuminate\Contracts\View\View;

class ShopController extends Controller
{

    public function index() :View
    {
        $shops = Shop::with("country")->paginate();
        return view("shop.index", compact("shops"));
    }

    public function store(BasicShopRequest $request)
    {
        $data = $request->validated();
        Shop::create($data);
        return redirect()->route("shops");
    }

    public function create()
    {
        $countries = Country::all();
        return view("shop.add-new-shop", compact("countries"));
    }

    public function delete(Shop $shop)
    {
        ShopDeleted::create([
            "shop_id" => $shop->id,
            "name" => $shop->name,
            "country_id" => $shop->country_id,
            "city" => $shop->city,
            "street" => $shop->street,
        ]);
        $shop->delete();
        return redirect()->route("shops");
    }

    public function update(Shop $shop, EditShopRequest $request)
    {
        $data = $request->validated();
        $daysInWeek = DaysInWeek::cases();
        foreach($daysInWeek as $day)
        {
            if(isset($data[$day->value."_opening_time"]))
            {
                WorkingTimeShop::where("shop_id", $shop->id)
                    ->where("day_of_week", $day->name)
                    ->update(["opening_time" => $data[$day->value."_opening_time"]]);
            }

            if(isset($data[$day->value."_closing_time"]))
            {
                WorkingTimeShop::where("shop_id", $shop->id)
                    ->where("day_of_week", $day->name)
                    ->update(["closing_time" => $data[$day->value."_closing_time"]]);
            }
        }

        $shop->update($request->only([
            "name", "street", "country_id", "city"
        ]));
        
        return redirect()->route("shops");
    }

    public function edit(Shop $shop)
    {
        if(empty($shop)) {
            abort(404);
        }

        $countries = Country::all();
        $workingTimeForShop = WorkingTimeShop::getWorkingTimeForShop($shop->id)->get();
        return view("shop.edit", compact("countries", "shop", "workingTimeForShop"));

    }

}
