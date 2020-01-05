@section('core.partials.breadcrumb')
    <div class="col s10 m6 l6 breadcrumbs-left">
        <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down">
            <a href="{{ route('website.home') }}">
                Home
            </a>
        </h5>
        <ol class="breadcrumbs mb-0">
            @section('core.partials.breadcrumbs.crumbs')
                @foreach ($crumbs as $crumb)
                        @if ($crumb['has_link'])
                            @if ($crumb['is_url'])
                                <li class="breadcrumb-item"><a href="{{ $crumb['is_url'] }}">{{ $crumb['name'] }}</a></li>
                            @else
                                <li class="breadcrumb-item">{{ link_to_route($crumb['route'], $crumb['name'], $crumb['parameters']) }}</li>
                            @endif
                        @else
                        <li class=" breadcrumb-item active">{{ $crumb['name'] }}</li>
                    @endif
                @endforeach
            @show
        </ol>
    </div>
@show
