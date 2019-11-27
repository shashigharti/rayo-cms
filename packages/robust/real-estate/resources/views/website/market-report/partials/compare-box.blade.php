<section class="main market-main clearfix no-home multilple-listing area-stats">
    <div class="container report">
        <h1 class="txt-title js-bookmark_title"><span>{{strtoupper($page_type)}} Real Estate Reports</span></h1>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <h2 class="text-center">Compare Selected Locations</h2>
                </div>
                <div class="row compare_selected_locations_buttons">
                    <a href="#"
                       class="btn btn-success" style="margin-right:10px"><span
                            class="glyphicon glyphicon-floppy-save">Save this Report</span></a>
                    <a href="#" class="btn btn-success print-this-page" style="margin-right:10px"><span
                            class="glyphicon glyphicon glyphicon-print">Print</span> </a>
                    <a href="#"
                       class="btn btn-success " style="margin-right:10px"><span
                            class="glyphicon glyphicon-envelope">Email Report to Friend</span> </a>
                    <a href="#"
                       class="btn btn-success" style="margin-right:10px"><span
                            class="glyphicon glyphicon-user">Discuss with Realtor</span> </a>

                        <button type="button" class="btn pull-right map-bookmark btn-primary bookmark"
                                data-toggle="modal" data-target="#save-bookmark-modal" aria-hidden="true">
                            <i class="fa fa-bookmark-o">Bookmark this Page</i>
                        </button>
                    <a href="#" title=""
                       class="btn btn-xs btn-success pull-right" style="margin-right:10px">
                        Send me prop Alerts
                    </a>
                </div>
                <br>
                <div class="row">
                    <form class="js-location-table">
                        <table class="table table-striped location-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Avg Price</th>
                                <th class="text-center">Med Price</th>
                                <th class="text-center">#Active</th>
                                <th class="text-center">#Sold</th>
                                <th class="text-center">Active</th>
                                <th class="text-center">Sold</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($records as $key => $record)
                                <tr class="js-row-info text-center">
                                    <th scope="text-left" class="location-name"
                                        data-name="{{ $record->name }}">{{ $record->name }}</th>
                                    <td class="get_average">${{ number_format($record->average_price_sold) }}</td>
                                    <td class="get_median">${{ number_format($record->median_price_sold) }}</td>
                                    <td>{{ $record->total_listings_active }}</td>
                                    <td>{{ $record->total_listings_sold }}</td>
                                    <td>
                                        <input name="location_alert[{{ $record->name }}][]" value="active"
                                               type="checkbox" class="js-location-alert">
                                    </td>
                                    <td>
                                        <input name="location_alert[{{ $record->name }}][]" value="sold"
                                               type="checkbox" class="js-location-alert">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
