<div class="col s12 system-settings__general">
    {{ Form::open(['route' => ['admin.settings.store'], 'enctype' => 'multipart/form-data', 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [
                'class' => 'form-control'
    ]) }}
    <div class="form-group form-material row">
        <div class="col s12 file-upload">
            <div class="row">
                <div class="col s8 file-upload__preview">
                    <img id="file-upload__img" height="80" src="{{$settings['logo'] ?? ''}}"/>
                    <div id="file-upload__logo-url">{{$settings['logo'] ?? ''}}</div>
                </div>
                @if(isset($settings['logo']) && $settings['logo'] != "")
                    <i class="md md-close-circle text-danger delete-img" data-preview="#file-upload__img"
                       data-image-path="#file-upload__logo-url" data-hidden="#logo"></i>
                @endif

                <div class="col s5 file-upload__btn">
                    {{ Form::file('files[logo]', [
                        'class' =>'image-upload',
                        'data-preview' => '#file-upload__img',
                        'data-image-path' => '#file-upload__logo-url'
                        ])
                    }}
                    {{ Form::hidden('logo', isset($settings['logo'])?$settings['logo']:'', ['id' => 'logo']) }}
                    <button type="button" id="btn__select-image" class="btn theme-btn">Upload Logo</button>
                </div>
                <div class="col s12">(Image Size: 200 x 200)</div>
            </div>
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="col s12 input-field">
            {{ Form::label('company_name', 'Company Name', ['class' => 'control-label' ]) }}
            {{ Form::text('company_name', isset($settings['company_name'])?$settings['company_name']:'', [
                    'class' => 'form-control'
                ]) 
            }}
        </div>       
    </div>    
    <div class="form-group form-material row">        
        <div class="col s6 input-field">
            {{ Form::label('contact_email', 'Contact Email', ['class' => 'control-label' ]) }}
            {{ Form::text('contact_email', isset($settings['primary_email'])?$settings['contact_email']:'', [
                    'class' => 'form-control'
                ]) 
            }}
        </div>
         <div class="col s6 input-field">
            {{ Form::label('phone_number', 'Phone Number', ['class' => 'control-label' ]) }}
            {{ Form::text('phone_number', isset($settings['phone_number'])?$settings['phone_number']:'', [
                    'class' => 'form-control'
                ]) 
            }}
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="col s12 input-field">            
            {{ Form::textarea('description', isset($settings['description'])?$settings['description']:'', [
                'class' => 'form-control'])           
            }}
            {{ Form::label('description', 'Description', ['class' => 'control-label' ]) }}
        </div>
    </div>
    <div class="form-group form-material row">
        <div class="col s12 input-field">
            {{ Form::textarea('address', isset($settings['address'])?$settings['address']:'', [
                    'class' => 'form-control'
                ]) 
            }}
             {{ Form::label('address', 'Address', ['class' => 'control-label' ]) }}
        </div>
    </div>

    <div class="form-group form-material">
        {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
    </div>

    {{Form::close()}}
</div>
