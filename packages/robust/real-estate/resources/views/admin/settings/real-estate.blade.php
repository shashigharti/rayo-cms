<div class="system-settings__real-estate">
    {{Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
        <fieldset>
            <legend>Site Data Mapping</legend>
            <div class="form-group form-material row">
                <div class="col s3">
                    {{ Form::label('active', 'Active', ['class' => 'control-label' ]) }}
                    {{ Form::text('active', isset($settings['active'])?$settings['active']:'Active', [
                            'class' => 'form-control'
                        ]) }}
                </div>
                <div class="col s3">
                    {{ Form::label('sold', 'Sold', ['class' => 'control-label' ]) }}
                    {{ Form::text('sold', isset($settings['sold'])?$settings['sold']:'Closed', [
                            'class' => 'form-control'
                        ]) }}
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>URL Mapping</legend>
            <div class="form-group form-material row">
                <div class="col s3">
                    {{ Form::label('url_active', 'URL for homes for sale', ['class' => 'control-label' ]) }}
                    {{ Form::text('url_active', isset($settings['url_active'])?$settings['url_active']:'homes-for-sale', [
                            'class' => 'form-control'
                        ]) }}
                </div>
                <div class="col s3">
                    {{ Form::label('url_sold', 'URL for sold', ['class' => 'control-label' ]) }}
                    {{ Form::text('url_sold', isset($settings['url_sold'])?$settings['url_sold']:'sold', [
                            'class' => 'form-control'
                        ]) }}
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Price Settings</legend>
            <div class="form-group form-material row dynamic-elem">
                <div class="col s3">
                    {{ Form::label("data['prices'][]", 'Price >=', ['class' => 'control-label' ]) }}
                    {{ Form::text("data['prices'][]", isset($settings['data']['prices[]'])?$settings['data']['prices[]']:'', [
                            'class' => 'form-control'
                        ]) 
                    }}
                </div>
                <div class="col s3">
                    {{ Form::label("data['increments'][]", 'Increment', ['class' => 'control-label' ]) }}
                    {{ Form::text("data['increments'][]", isset($settings['data']['increments[]'])?$settings['data']['increments[]']:'', [
                            'class' => 'form-control'
                        ]) 
                    }}
                </div>
                <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__add"> add </i></a>
                <a href="#"><i class="material-icons dynamic-elem__btn dynamic-elem__delete hide"> delete </i></a>
            </div>
            <div class="form-group form-material row dynamic-elem">
                <div class="col s6">
                   <a href="#"> <i class="material-icons"> settings </i> Generate Price Range  </a>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Data Pull Settings for Server</legend>
            <div class="form-group form-material row">
                <div class="col s6">

                    {{ Form::label("data['cities']", 'Cities(only)', ['class' => 'control-label' ]) }}
                    {{ Form::text("data['cities']", isset($settings['data']['cities']) ? $settings['data']['cities']:'', [
                            'class' => 'form-control',
                            'placeholder' => 'Comma separated values E.g \'boca rotan, west palm beach\''
                        ]) 
                    }}
                </div>
                <div class="col s6">
                    {{ Form::label("data['zips']", 'Zips(only)', ['class' => 'control-label' ]) }}
                    {{ Form::text("data['zips']", isset($settings['data']['zips']) ? $settings['data']['zips']:'', [
                            'class' => 'form-control',
                            'placeholder' => 'Comma separated values E.g \'33418, 33419\''
                        ]) 
                    }}
                </div>
                <div class="col s6">
                    {{ Form::label("data['counties']", 'Counties(only)', ['class' => 'control-label' ]) }}
                    {{ Form::text("data['counties']", isset($settings['data']['counties']) ? $settings['data']['counties']:'', [
                            'class' => 'form-control',
                            'placeholder' => 'Comma separated values E.g \'boca rotan, west palm beach\''
                        ]) 
                    }}
                </div>
                <div class="col s6">
                    {{ Form::label("data['min']", 'Listings Greater Than (Price)', ['class' => 'control-label' ]) }}
                    {{ Form::text("data['min']", isset($settings['data']['min']) ? $settings['data']['min']:'10000', [
                            'class' => 'form-control',
                            'placeholder' => 'numeric Value E.g \'10000\''
                        ]) 
                    }}
                </div>
            </div>
        </fieldset>
        
        <div class="form-group form-material">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    {{Form::close()}}
</div>