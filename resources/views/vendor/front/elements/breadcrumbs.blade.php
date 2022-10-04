<nav class="hidden sm:flex" aria-label="Breadcrumb">
  <ol role="list" class="flex items-center space-x-4">
    <li>
      <div class="flex">
        <a href="/admin" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Home') }}</a>
      </div>
    </li>
    @isset($slot)
        {{$slot}}
    @endisset
    @isset($front)
        @foreach($front->getBreadcrumbs($object ?? null, $data ?? null) as $breadcrumb)
            <li>
              <div class="flex items-center">
                <!-- Heroicon name: mini/chevron-right -->
                <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
                <span href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{!! $breadcrumb['html'] !!}</span>
              </div>
            </li>
        @endforeach
    @endisset
  </ol>
</nav>