<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\ShopDeletedTDO;
use App\DataTransferObjects\WorkingTimeShopExceptionDTO;
use App\Enums\DaysInWeek;
use App\Http\Requests\BasicShopRequest;
use App\Http\Requests\EditShopRequest;
use App\Http\Requests\StoreNewShopRequest;
use App\Models\Country;
use App\Models\Shop;
use App\Models\ShopDeleted;
use App\Models\WorkingTimeShop;
use App\Models\WorkingTimeShopException;
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
        $dataForExceptionTime = WorkingTimeShopExceptionDTO::fromRequest($data);
        $workingTimeForShopService->addExceptionTime($shop, $dataForExceptionTime);

        return redirect()->route("shops");
    }

    public function create()
    {
        $countries = Country::all();
        return view("shop.add", compact("countries"));
    }

    public function delete(Shop $shop)
    {
        $shopDeletedTDO = new ShopDeletedTDO(
            $shop->id,
            $shop->name,
            $shop->country_id,
            $shop->city,
            $shop->street
        );
        ShopDeleted::create($shopDeletedTDO->toArray());
        $shop->delete();
        return redirect()->route("shops");
    }

    public function update(Shop $shop, EditShopRequest $request, WorkingTimeShopService $workingTimeForShopService)
    {
        $data = $request->validated();

        $dataForExceptionTime = WorkingTimeShopExceptionDTO::fromRequest($data);
        $workingTimeForShopService->updateExceptionTime($shop, $dataForExceptionTime);

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
        $workingTimeExceptions = WorkingTimeShopException::getExceptions($shop->id)->get();
        return view("shop.edit", compact("countries", "shop", "workingTimeForShop", "workingTimeExceptions"));

    }

}
