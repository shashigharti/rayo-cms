<div class="modal fade" tabindex="-1" role="dialog" id="researchToolModal">
    <div class="modal-dialog" role="document">
        <form action="#" method="Post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <p style="text-align: center;">
                        <span class="text-capitalize">

                        </span>
                        Home Sales Activity
                    </p>
                </div>
                <div class="modal-body" style="font-size: 1.4em;">
                    <div class="form-group row">
                        <div class="col-sm-1">
                            <input id="seller" type="radio" name="lead_type[]" value="0" checked/>
                        </div>
                        <div class="col-sm-11">
                            <label for="seller">Local Home Owners - View Recent Home Sales & Prices in your Neighborhood
                            </label>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-1">
                            <input id="buyer" type="radio" name="lead_type[]" value="1"/>
                        </div>
                        <div class="col-sm-11">
                            <label for="buyer">Home Buyers - Analyze Home Sales Patterns in
                                <span class="text-capitalize">{{ isset($model) && isset($page) ? $model->slug : ' the area.' }}</span>
                            </label>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <span>
                        <button type="submit" class="btn btn-primary" style="width: fit-content !important;">
                        Explore the market
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
