<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 pt-4">
    <li class="me-2">
        <a href="/"
           class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300
                  {{ Request::is('/') ? 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-white-500' : '' }}">
           Home
        </a>
    </li>
    <li class="me-2">
        <a href="/shops"
           class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300
                  {{ Request::is('shops') ? 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-white-500' : '' }}">
           Shops
        </a>
    </li>
    <li class="ml-auto my-auto">
        <label class="inline-flex items-center cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-gray-300 dark:peer-focus:ring-gray-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-gray-600"></div>
            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{-- Is dark or light theme --}}
                Light theme
            </span>
        </label>
    </li>
</ul>
