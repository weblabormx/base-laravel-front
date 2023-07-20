@if (Auth::user()->can('viewAny', App\Models\User::class))
    <a href="/admin/users"
        class="flex items-center px-2 py-2 text-base font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900 group">
        <svg class="flex-shrink-0 mr-4 w-6 h-6 text-gray-400 group-hover:text-gray-500" aria-hidden="true" fill="none"
            stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        @lang('Users')
    </a>
@endif
@yield('sidebar')
