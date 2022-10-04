@php $helper = $front->getPartialIndexHelper($result, $pagination_name ?? null, $show_filters ?? null); @endphp

@if($result->count() > 0)
    <div class="mt-6 -mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg" style="{{$style ?? ''}}">
        <table class="min-w-full divide-y divide-gray-300">
          <thead class="bg-gray-50">
            <tr>
                @foreach($helper->headers() as $field)
                    <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 {{$field->class}}">{{$field->title}}</th>
                @endforeach
                @if($helper->show_actions)
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Edit</span>
                    </th>
                @endif
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($helper->rows() as $row)
                <tr>
                    @foreach($row->columns as $field)
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500 sm:pl-6 {{$field->class}}">
                            {!! $field->value !!}
                        </td>
                    @endforeach
                    @if($helper->show_actions)
                        @include('front::elements.object_actions', ['base_url' => $front->getBaseUrl(), 'object' => $row->object])
                    @endif
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <div class="pt-2 text-gray-500">
        {{ $helper->views() }}
        {{ $helper->totals() }}
        {{ $helper->filters() }}
    </div>
    <div class="mt-4">
        {{ $helper->links() }}
    </div>
@else
    <div class="bg-white text-center py-20 mt-4 ring-1 ring-black ring-opacity-5 md:rounded-lg text-gray-500">
        {{ __('No data to show') }}
    </div>
@endif