<div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
    @if (isset($msg))
        {{ $msg }}
    @else
        Message is not provided
    @endif
</div>
