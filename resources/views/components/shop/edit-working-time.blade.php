<div class="max-w-full mx-auto bg-gray-50 dark:bg-gray-800 shadow-md rounded-md p-4">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white text-center mb-4">Weekly Schedule</h2>
    <div class="flex flex-wrap justify-between gap-3">
        @foreach ($workingTimeForShop as $workingTime)
            <div class="flex flex-col items-center bg-white dark:bg-gray-700 shadow p-3 rounded-md w-1/7">
                <span class="font-medium text-gray-700 dark:text-white mb-2">{{ ucfirst($workingTime->day_of_week) }}</span>
                <div class="flex items-center gap-2">
                    <input
                        name={{ strtolower($workingTime->day_of_week) . "_opening_time" }}
                        type="time"
                        class="border border-gray-300 dark:border-gray-600 rounded-md p-1 text-gray-700 dark:text-white bg-gray-50 dark:bg-gray-800 focus:ring focus:ring-blue-300 dark:focus:ring-blue-500"
                        value="{{ $workingTime->opening_time }}"
                    />
                    <span class="text-gray-700 dark:text-white">-</span>
                    <input
                        name={{ strtolower($workingTime->day_of_week) . "_closing_time" }}
                        type="time"
                        class="border border-gray-300 dark:border-gray-600 rounded-md p-1 text-gray-700 dark:text-white bg-gray-50 dark:bg-gray-800 focus:ring focus:ring-blue-300 dark:focus:ring-blue-500"
                        value="{{ $workingTime->closing_time }}"
                    />
                </div>
            </div>
        @endforeach
    </div>
</div>
