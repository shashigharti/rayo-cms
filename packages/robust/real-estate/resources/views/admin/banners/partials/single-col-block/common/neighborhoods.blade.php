@inject('tabs_helper', 'Robust\RealEstate\Helpers\TabsHelper')
@set('subdivisions', $tabs_helper->neighborhoods('cities', $properties->locations->cities))
<div class="row">
    <div id="{{ $key }}" class="col s12">
        @foreach ($subdivisions as $key => $subdivision)
{{--            <li>--}}
{{--                <a href="#" title="" class="alaska-frontpage-subdiv">--}}
{{--                    <i class="glyphicon glyphicon-triangle-right"></i> {{ $subdivision->name }}--}}
{{--                    ({{ $subdivision->active }})--}}
{{--                </a>--}}
{{--            </li>--}}
        @endforeach
    </div>
</div>
