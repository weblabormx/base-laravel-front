@if($result->count() > 0)
    @php $appends = isset($pagination_name) ? request()->except($pagination_name) : request()->except('page'); @endphp
    <div class="card" @isset($style) style="{{$style}}" @endisset>
        @if($result instanceof \Illuminate\Pagination\LengthAwarePaginator )
            {{ $result->appends($appends)->links() }}
        @endif
        <div class="card-datatable table-responsive">
            <table class="table table-striped table-bordered mb-0">
                <thead>
                    <tr>
                        @php $front->setObject($result->first()); @endphp
                        @foreach($front->indexFields() as $field)
                            <th class="{{$field->data_classes}}">{{$field->title}}</th>
                        @endforeach
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $object)
                        @php $front->setObject($object); @endphp
                        <tr>
                            @foreach($front->indexFields() as $field)
                                <td class="{{$field->data_classes}}">
                                    {!! $field->getValueProcessed($object) !!}
                                </td>
                            @endforeach
                            @include('front::elements.object_actions', ['base_url' => $front->base_url, 'object' => $object])
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($result instanceof \Illuminate\Pagination\LengthAwarePaginator )
            {{ $result->appends($appends)->links() }}
        @endif
    </div>
@else
    <div class="card" @isset($style) style="{{$style}}" @endisset>
        <div class="card-body">
            {{ __('No data to show') }}
        </div>
    </div>
@endif
    
