<div class="system-settings__real-estate">
    {{Form::open(['route' => ['admin.settings.store'], 'method' => $ui->getMethod()])}}
    {{ Form::hidden('slug', $slug, [ 'class' => 'form-control' ]) }}
        <fieldset>
            <legend>System Health Checkup </legend>
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Last Executed</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Data Pull from Server</td>
                        <td>Jan 24, 2019</td>
                        <td>Success <i class="material-icons status services__status--green">fiber_manual_record</i>  </td>
                        <th>20 Listings Pulled</th>
                    </tr>
                    <tr>
                        <td>Listing Alerts</td>
                        <td>Jan 24, 2019</td>
                        <td>Success <i class="material-icons status services__status--red">fiber_manual_record</i> </td>
                        <th>20 Emails Sent</th>
                    </tr>
                </tbody>
            </table>           
        </fieldset>
        
        <div class="form-group form-material row mt-3">
            <div class="col s12">
                {{ Form::submit($ui->getSubmitText(), ['class' => 'btn btn-primary theme-btn']) }}
            </div>
        </div>
    {{Form::close()}}
</div>
