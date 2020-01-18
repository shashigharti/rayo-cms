@if(isset($model) && $model->exists)
    <ul class="tabs">
        @set('tabs', $ui->getTabs($model))
        @if(count($tabs) > 0)
            @foreach($tabs as $title => $tab)
                @can($tab['permission'])
                    <li class="tab {{is_active($tab['url'])}}">
                        <a target="_blank" href="{{$tab['url']}}">{{$title}}</a>
                    </li>
                @endcan
            @endforeach
        @else
            <li class="tab"><a class="active" href="#pages"> {{ $title }} </a></li>
        @endif
    </ul>
@endif
