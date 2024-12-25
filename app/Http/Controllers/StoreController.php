<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewShopRequest;
use App\Models\Country;
use App\Models\Shop;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store(StoreNewShopRequest $request)
    {
        $data = $request->validated();
        Shop::create($data);
        return view("shop.add-new-shop");
    }

}
