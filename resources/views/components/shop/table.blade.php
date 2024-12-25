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
                        <a href={{"/shop/edit/".$shop->id}} class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                    <td class="px-6 py-4">
                        <a
                            shopId="{{$shop->id}}"
                            href="#" class="delete-shop font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $shops->links() }}
</div>
@push('scripts')
    <script>

        (function(){
            const deleteLinks = document.querySelectorAll('.delete-shop');

            deleteLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    const url = `/shop/delete/${this.getAttribute("shopId")}`;

                    if (confirm("Are you sure you want to delete this shop?")) {
                        fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json',
                            },
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('There was an error deleting the shop.');
                        });
                    }
                });
            });
        })()

    </script>
@endpush
