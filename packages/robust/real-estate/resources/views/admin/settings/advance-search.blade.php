@inject('advancesearch_helper', '\Robust\RealEstate\Helpers\AdvanceSearchHelper')
<div class="system-settings__email">
    {{Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
        <div class="row multi-select-container">
            <div class="col s12">
                {{ Form::select('first_block[]', $advancesearch_helper->getAdvanceSearchFilters(), [], 
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ]) 
                }}
            </div>
        </div>
       <div class="row multi-select-container">
           <div class="col s12">
                {{ Form::label('second_block') }}
                {{ Form::select('second_block[]', $advancesearch_helper->getAdvanceSearchFilters(), [], 
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ]) 
                }}
            </div>
        </div>
        <div class="row multi-select-container">
           <div class="col s12">
                {{ Form::label('third_block') }}
                {{ Form::select('third_block[]',  $advancesearch_helper->getAdvanceSearchFilters(), [], 
                    [
                        'class'=>'browser-default multi-select',
                        'multiple'
                    ]) 
                }}
            </div>
        </div>
        <div class="row multi-select-container">
           <div class="col s12">
                {{ Form::label('fourth_block') }}
                {{ Form::select('fourth_block[]',  $advancesearch_helper->getAdvanceSearchFilters(), [], 
                    [
                       'class'=>'browser-default multi-select',
                       'multiple'
                    ]) 
                }}
            </div>
        </div>
        <div class="form-group form-material">
            {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
        </div>
    {{Form::close()}}
</div>