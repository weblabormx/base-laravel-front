@extends('front::layout')

@section('content')
    @include('front::elements.breadcrumbs')

    <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                {!! $front->getTitle($object) !!}</h2>
        </div>
        <div class="flex flex-shrink-0 mt-4 md:mt-0 md:ml-4">
            @foreach ($front->getLinks($object) as $button)
                {!! $button->form() !!}
            @endforeach
        </div>
    </div>

    <div class="flex gap-6 mx-auto mt-8">
        <div class="flex-1 space-y-6">
            @foreach ($front->showPanels() as $panel)
                {!! $panel->showHtml($object) !!}
            @endforeach

            @php
                $porcentage = 0;
            @endphp

            @foreach ($front->showRelations() as $key => $relation)
                @php $porcentage += $relation->width_porcentage(); @endphp
                <div class="relation" style="{{ $relation->style_width() }}">
                    <div class="pb-4">
                        <h4 class="d-flex justify-content-between align-items-center">
                            <div>{{ $relation->title }}</div>
                            <div>
                                @foreach ($relation->getLinks($object, $key, $front) as $button)
                                    {!! $button->form() !!}
                                @endforeach
                            </div>
                        </h4>
                        {!! $relation->getValue($object) !!}
                    </div>
                </div>
                @if ($porcentage >= 100)
                    @php $porcentage = 0; @endphp
                    <div style="clear:both;"></div>
                @endif
            @endforeach
        </div>

        @if (method_exists($object, 'getActivitylogOptions'))
            <section class="w-1/3">
                @include('front.timeline', ['object' => $object])
            </section>
        @endif
    </div>
@endsection
