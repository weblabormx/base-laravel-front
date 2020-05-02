@extends('front::layout')

@section('styles')

    @if(!is_null($page->style()))
        <style type="text/css">
            {!! $page->style() !!}
        </style>
    @endif

@endsection

@section('content')

    <!-- Content -->
    <div class="container-fluid container">
        @component('front::elements.breadcrumbs')
            @foreach($page->breadcrumbs() as $link => $title)
                <li class="breadcrumb-item"><a href="{{$link}}">{{$title}}</a></li>
            @endforeach
            <li class="breadcrumb-item active">{{$page->title}}</li>
        @endcomponent

        @if($page->has_big_card)
            <div class="card card-default">
                <div class="card-header">
                    {{$page->title}}
                </div>
                <div class="card-body">
        @endif
        <div class="row">
            @foreach($page->allFields() as $field)
                {!! $field->html() !!}
            @endforeach
        </div>
        @if($page->has_big_card)
                </div>
            </div>
        @endif
    </div>

@endsection

