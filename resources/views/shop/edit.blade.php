<x-layout>
    <div class="grid place-items-end">
        <button
            id="button-shop"
            class="btn-primary mt-5 ml-auto">
            Edit
        </button>
    </div>
    <form
        id="form-shop"
        action={{"/shop/edit/".$shop->id}}
        class="mx-auto mt-5 grid" method="POST">
        @csrf
        @method("PUT")
        <x-mistakes-alert/>
        <div class="flex gap-3">
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insert shop name</label>
                <input
                    value={{ $shop->name }}
                    type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insert shop city</label>
                <input
                    value={{ $shop->city }}
                    type="text" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insert shop street</label>
                <input
                    value={{ $shop->street }}
                    type="text" name="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select
                    name="country_id"
                    id="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a country</option>
                    @foreach ($countries as $country)
                        <option value={{ $country->id }} @selected($shop->country->id)>{{$country->name}}</option>
                    @endforeach

                </select>
            </div>
        </div>
        @if ($workingTimeForShop->isEmpty())
            <x-shop.add-working-time/>
        @else
            <x-shop.edit-working-time :workingTimeForShop="$workingTimeForShop" />
        @endif

    </form>
    @push('pageTs')
        @vite(['resources/ts/pages/editShop.ts'])
    @endpush
</x-layout>
