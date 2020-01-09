<div class="col s12 system-settings__general">
    {{ Form::open(['route' => ['admin.settings.store'], 'enctype' => 'multipart/form-data', 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [
                'class' => 'form-control'
    ]) }}
    <div class="form-group form-material row">
        <div class="col s12 file-uploader">
            {{ Form::label('logo', 'Logo') }}
            @set('files', explode(',', $settings['logo']))
            <div class="col s12 file-uploader__preview">
                @foreach($files as $file)
                    <div class="file-uploader__file">
                        <img height="80" src="{{ getMedia($file) ?? ''}}"/>
                    </div>
                @endforeach                
            </div>

            <div class="col s12">(Image Size: 200 x 200)</div>
            <div class="col s12">                
                {{ Form::file('files[]', [
                        'class' =>'col s6 file-uploader__input',
                        'multiple' => 'multiple'
                    ])
                }}      
                <button type="button" data-dest=".file-uploader_files" data-path="{{route('api.file-uploader.image.upload')}}" class="btn theme-btn file-uploader__upload-btn">Upload Logo</button>
            </div>  
            {{ Form::hidden('logo', $settings['logo'] ?? '', [
                    'class' => 'file-uploader_files'
                ]) 
            }}         
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
            {{ Form::text('contact_email', isset($settings['contact_email'])?$settings['contact_email']:'', [
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

    <div class="form-group form-material mt-1 row">
        <div class="col s12">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    </div>

    {{Form::close()}}
</div>
