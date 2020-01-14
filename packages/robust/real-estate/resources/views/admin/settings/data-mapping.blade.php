<div class="system-settings__data-mapping">
    {{ Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()]) }}
        {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
        <ul class="collapsible">
            @foreach($settings as $header => $properties)
                <li>
                    <div class="collapsible-header black-text"> {{ $header }} </div>
                    <div class="collapsible-body">
                        <table>
                            <thead>
                            <tr>
                                <th>Property Name</th>
                                <th>Display</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $key => $property)
                                <tr>
                                    <td>{{ $property['name'] }}</td>
                                    <td>
                                        {{ Form::hidden($header."[$key][name]", isset($settings[$header][$key]['name'])? $settings[$header][$key]['name']:$property['name'], [
                                                'class' => 'form-control'
                                            ])
                                        }}
                                        {{ Form::text($header."[$key][display]", isset($settings[$header][$key]['display'])? $settings[$header][$key]['display']:$property['display'], [
                                                'class' => 'form-control'
                                            ])
                                        }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </li>
            @endforeach
            <div class="form-group form-material mt-3">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
            </div>
        </ul>
        
    {{Form::close()}}
</div>
