<div class="relative overflow-x-auto mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Shop name
                </th>
                <th scope="col" class="px-6 py-3">
                    Country
                </th>
                <th scope="col" class="px-6 py-3">
                    City
                </th>
                <th scope="col" class="px-6 py-3">
                    Street
                </th>
                <th scope="col" class="px-6 py-3">

                </th>
                <th scope="col" class="px-6 py-3">

                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shops as $shop)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$shop->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{ $shop->country->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $shop->city }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $shop->street }}
                    </td>
                    <td class="px-6 py-4">
                        <a href={{"/shop/edit/".$shop->id}} class="font-medium text-yellow-600 hover:underline">Edit</a>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('delete-shop', $shop->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this shop?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $shops->links() }}
</div>
