@extends('front::layout')

@section('sidebar')

    @if(count($front->filters())>0)
        <div class="sidenav-header small font-weight-semibold mb-2">{{ __('FILTER :name', ['name' => strtoupper($front->plural_label)]) }}</div>
        {!! Form::open(['url' => request()->url(), 'method' => 'get']) !!} 
            <div class="card pt-3 sidenav-forms">
                {!! Form::hidden($front->getCurrentViewRequestName()) !!}
                @foreach($front->getFilters() as $filter)
                    {!! $filter->formHtml() !!}
                @endforeach
            </div>
            {!! Form::submit(__('Search'), ['class' => 'btn btn-secondary btn-sm btn-block']) !!}
        {!! Form::close() !!}
    @endif

@endsection

@section('content')

    <!-- This example requires Tailwind CSS v2.0+ -->
    @include('front::elements.breadcrumbs')

    <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{$front->plural_label}}</h2>
        </div>
        <div class="mt-4 flex flex-shrink-0 md:mt-0 md:ml-4">
            @foreach($front->getIndexLinks() as $button)
                {!! $button->form() !!}
            @endforeach
        </div>
    </div>

    @if($front->getLenses()->count() > 1)
        <div>
            <h4>Lenses</h4>
            @foreach($front->getLenses() as $button)
                {!! $button->form() !!}
            @endforeach
        </div>
    @endif

    @include ('front::components.cards', ['cards' => $front->cards()])
    @include ($front->getCurrentView())

@endsection

