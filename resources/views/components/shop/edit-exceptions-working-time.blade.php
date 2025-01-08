<div id="exceptions">
    <div class="grid place-content-end mt-3">
        <button type="button" id="add-exceptions" class="btn-green">
            Add more exceptions
        </button>
    </div>
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white my-3">Exceptions</h2>
    @foreach ($workingTimeExceptions as $exceptionTime)
        <div class="exception-block flex gap-3 mt-3">
            <div>
                <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason</label>
                <input
                    value="{{ $exceptionTime->reason }}"
                    name="reason[]"
                    type="text"
                    id="reason"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                <input
                    value="{{ $exceptionTime->date }}"
                    name="date[]"
                    type="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="flex gap-3 flex-col">
                <label class="text-sm font-medium text-gray-900 dark:text-white">Shop is working that day</label>
                <div class="flex justify-between">
                    <select name="is_working[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose an option</option>
                        <option @selected($exceptionTime->is_working === true) value=true>Yes</option>
                        <option @selected($exceptionTime->is_working === false) value=false>No</option>
                    </select>
                </div>
            </div>
            <div
                @if ($exceptionTime->is_working)
                    class="exception-time flex items-center gap-2"
                @else
                    class="exception-time hidden items-center gap-2"
                @endif
            >
                <div>
                    <label for="opening_time">Opening time</label>
                    <input
                        value="{{ $exceptionTime->opening_time }}"
                        id="opening_time"
                        name="opening_time[]"
                        type="time"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-1 text-gray-700 dark:text-white bg-gray-50 dark:bg-gray-800 focus:ring focus:ring-blue-300 dark:focus:ring-blue-500"

                    />
                </div>
                <span class="text-gray-700 dark:text-white">-</span>
                <div>
                    <label for="closing_time">Closing time</label>
                    <input
                        value="{{ $exceptionTime->closing_time }}"
                        name="closing_time[]"
                        id="closing_time"
                        type="time"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-1 text-gray-700 dark:text-white bg-gray-50 dark:bg-gray-800 focus:ring focus:ring-blue-300 dark:focus:ring-blue-500"
                    />
                </div>
            </div>
            <div class="delete-exception-block mt-auto">
                <button type="button" class="btn-red">-</button>
            </div>
        </div>

    @endforeach
</div>
