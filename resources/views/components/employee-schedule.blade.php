<div class="container mx-auto p-4">
    <!-- Calendar Header -->
    <div class="flex justify-between items-center mb-4">
        <button class="p-2 text-lg font-semibold text-gray-700 hover:bg-gray-200 rounded-lg">
            &lt;
        </button>
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">December 2024</h2>
        <button class="p-2 text-lg font-semibold text-gray-700 hover:bg-gray-200 rounded-lg">
            &gt;
        </button>
    </div>

    <!-- Calendar Grid -->
    <div class="grid grid-cols-7 gap-2">
        <div class="text-center font-semibold text-sm text-gray-700">Mon</div>
        <div class="text-center font-semibold text-sm text-gray-700">Tue</div>
        <div class="text-center font-semibold text-sm text-gray-700">Wed</div>
        <div class="text-center font-semibold text-sm text-gray-700">Thu</div>
        <div class="text-center font-semibold text-sm text-gray-700">Fri</div>
        <div class="text-center font-semibold text-sm text-gray-700">Sat</div>
        <div class="text-center font-semibold text-sm text-gray-700">Sun</div>

        <!-- Calendar Days -->
        {{-- <div class="text-center p-2 text-white-500 bg-green-700 dark:bg-green-900">
            <h3 class="text-white">29</h3>
            <h4 class="text-white">08:00-16:00</h4>
        </div> --}}
        @for ($i = 1; $i <= $daysInMonth; $i++)
            <div class="text-center p-2 text-white-900 cursor-pointer">{{ $i }}</div>
        @endfor

    </div>
</div>
