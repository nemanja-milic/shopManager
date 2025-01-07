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
                    <div class="flex items-center">
                        <input
                            name="is_working[{{$exceptionTime->id}}]"
                            data-working=true
                            type="radio"
                            @if ($exceptionTime->is_working)
                                checked=true
                            @endif
                            class="is-working-rb w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        >
                        <label for="is_working_yes" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yes</label>
                    </div>
                    <div class="flex items-center">
                        <input
                            name="is_working[{{$exceptionTime->id}}]"
                            data-working=false
                            type="radio"
                            @if (!$exceptionTime->is_working)
                                checked=true
                            @endif
                            class="is-working-rb w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        >
                        <label for="is_working_no" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No</label>
                    </div>
                </div>
            </div>
            <div class="exception-time flex items-center gap-2">
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
