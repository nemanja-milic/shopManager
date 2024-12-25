<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewShopRequest;
use App\Models\Country;
use App\Models\Shop;
use Illuminate\Contracts\View\View;

class ShopController extends Controller
{

    public function index() :View
    {
        $shops = Shop::with("country")->paginate();
        return view("shop.index", compact("shops"));
    }

    public function store(StoreNewShopRequest $request)
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

}
