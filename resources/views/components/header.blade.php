<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 pt-4">
    <li class="me-2">
        <a href="/"
           class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300
                  {{ Request::is('/') ? 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-blue-500' : '' }}">
           Home
        </a>
    </li>
    <li class="me-2">
        <a href="/shops"
           class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300
                  {{ Request::is('shops') ? 'text-blue-600 bg-gray-100 dark:bg-gray-800 dark:text-blue-500' : '' }}">
           Shops
        </a>
    </li>
</ul>
