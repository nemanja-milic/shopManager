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
use App\Services\WorkingTimeShopService;
use Illuminate\Contracts\View\View;

class ShopController extends Controller
{

    public function index() :View
    {
        $shops = Shop::with("country")->paginate();
        return view("shop.index", compact("shops"));
    }

    public function store(StoreNewShopRequest $request, WorkingTimeShopService $workingTimeForShopService)
    {
        $data = $request->validated();
        $shop = Shop::create($data);
        $workingTimeForShopService->addWorkingTimeForShop($shop, $data);
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

    public function update(Shop $shop, EditShopRequest $request, WorkingTimeShopService $workingTimeForShopService)
    {
        $data = $request->validated();

        $workingTimeForShopService->addWorkingTimeForShop($shop, $data);

        $shop->update($request->only([
            "name", "street", "country_id", "city"
        ]));

        return redirect()->route("shops");
    }

    public function edit(Shop $shop, WorkingTimeShopService $workingTimeShopService)
    {
        if(empty($shop)) {
            abort(404);
        }

        $countries = Country::all();
        $workingTimeForShop = WorkingTimeShop::getWorkingTimeForShop($shop->id)->get();

        $workingTimeForShop = $workingTimeShopService->ensureAllDaysHaveWorkingTime($workingTimeForShop);

        return view("shop.edit", compact("countries", "shop", "workingTimeForShop"));

    }

}
