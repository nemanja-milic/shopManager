<x-layout>

    <div class="mt-5">
        <div class="flex justify-end">
            <a
                href="/shop/add"
                class="btn-green"
            >
                +
            </a>
        </div>
        {{-- filters --}}
        {{-- tables --}}
        @if (isset($shops))
            <x-shop.table :shops="$shops" />
        @else
            <x-warning-alert msg="There is not shops" />
        @endif
    </div>
</x-layout>
