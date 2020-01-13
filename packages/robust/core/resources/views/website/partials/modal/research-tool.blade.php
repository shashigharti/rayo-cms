<div class="modal fade" tabindex="-1" role="dialog" id="researchToolModal">
    <div class="modal-dialog" role="document">
        <form action="#" method="Post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h6>
                        Home Sales Activity
                    </h6>
                </div>
                <div class="modal-body" style="font-size: 1.4em;">
                    <div class="form-group mr-t-20 row">
                        <div class="col s12">
                            <input id="seller" type="radio" name="lead_type[]" value="0" checked/>
                            <label for="seller">Local Home Owners - View Recent Home Sales & Prices in your Neighborhood
                            </label>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col s12">
                            <input id="buyer" type="radio" name="lead_type[]" value="1"/>
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
