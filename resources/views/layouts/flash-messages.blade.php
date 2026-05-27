<div class="space-y-3" x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)">
    @if (session('info'))
        <div
            x-show="show"
            x-transition
            class="flex items-center p-4 text-indigo-900 bg-blue-50"
            role="alert"
        >
            <svg class="shrink-0 w-4 h-4 me-3 text-indigo-900" aria-hidden="true" xmlns="http://w3.org" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="text-sm font-medium text-indigo-900">{{ session('info') }}</div>
        </div>
    @endif

    @if (session('success'))
        <div
            x-show="show"
            x-transition
            class="flex items-center p-4 text-green-800 bg-green-50"
            role="alert"
        >
            <svg class="shrink-0 w-4 h-4 me-3" aria-hidden="true" xmlns="http://w3.org" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 1 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <div class="text-sm font-medium">{{ session('success') }}</div>
        </div>
    @endif

    @if (session('error'))
        <div
            x-show="show"
            x-transition
            class="flex items-center p-4 text-red-800 bg-red-50"
            role="alert"
        >
            <svg class="shrink-0 w-4 h-4 me-3" aria-hidden="true" xmlns="http://w3.org" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
            </svg>
            <div class="text-sm font-medium">{{ session('error') }}</div>
        </div>
    @endif

    @if (session('warning'))
        <div
            x-show="show"
            x-transition
            class="flex items-center p-4 text-yellow-800 bg-yellow-50"
            role="alert"
        >
            <svg class="shrink-0 w-4 h-4 me-3" aria-hidden="true" xmlns="http://w3.org" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
            </svg>
            <div class="text-sm font-medium">{{ session('warning') }}</div>
        </div>
    @endif

    @if ($errors->any())
        <div
            x-show="show"
            x-transition
            class="p-4 text-red-800 bg-red-50"
            role="alert"
        >
            <div class="font-medium mb-2 text-sm">Проверьте поля формы:</div>
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
