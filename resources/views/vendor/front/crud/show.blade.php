@extends('front::layout')

@section('content')
    
    @include('front::elements.breadcrumbs')

    <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
          <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{!! $front->getTitle($object) !!}</h2>
        </div>
        <div class="mt-4 flex flex-shrink-0 md:mt-0 md:ml-4">
            @foreach($front->getLinks($object) as $button)
                {!! $button->form() !!}
            @endforeach
        </div>
    </div>

    <div class="mx-auto mt-8 grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
      <div class="space-y-6 lg:col-span-2 lg:col-start-1">
        <!-- Description list-->
        @foreach($front->showPanels() as $panel)
            {!! $panel->showHtml($object) !!}
        @endforeach
        
        @php 
          $porcentage = 0; 
        @endphp
        
        @foreach($front->showRelations() as $key => $relation)
            @php $porcentage += $relation->width_porcentage(); @endphp
            <div class="relation" style="{{$relation->style_width()}}">
                <div class="pb-4">
                    <h4 class="d-flex justify-content-between align-items-center">
                        <div>{{$relation->title}}</div>
                        <div>
                            @foreach($relation->getLinks($object, $key, $front) as $button)
                                {!! $button->form() !!}
                            @endforeach
                        </div>
                    </h4>
                    {!! $relation->getValue($object) !!}
                </div>
            </div>
            @if($porcentage>=100)
                @php $porcentage = 0; @endphp
                <div style="clear:both;"></div>
            @endif
        @endforeach
      </div>

      <section aria-labelledby="timeline-title" class="lg:col-span-1 lg:col-start-3">
        @include('front.extra-show')
        @include('front.timeline')
      </section>
    </div>

        
   
@endsection


