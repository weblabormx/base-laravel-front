@include('front.sidebar-link', [
    'name' => 'Dashboard',
    'url' => '/admin',
    'icon' => 'home',
])
@foreach (collect(get_declared_classes())->filter(fn($v) => str_starts_with($v, 'App\\Front\\Resources\\')) as $resource)
    @if (auth()->user()->can('viewAny', $resource))
        @php
            $instance = new $resource();
        @endphp
        @include('front.sidebar-link', [
            'name' => str(class_basename($resource))->plural()->toString(),
            'url' => $instance->base_url,
            'icon' => $instance?->icon ?? 'collection',
        ])
    @endif
@endforeach
@yield('sidebar')
