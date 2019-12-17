<div class="search--right--section change" id="thebar">
    <a href="javascript:void(0)" class="right-icon bar-open">
        <i class="arrow material-icons">keyboard_arrow_right</i>
    </a>
    <div class="right--single--block">
        <div class="map">
            <div class="gmap_canvas">
                <div id="map" style="height: 300px;" data-url="{{route('website.realestate.map-data')}}" data-ids="{{implode(',',$results->pluck('id')->toArray())}}"></div>
            </div>
        </div>
        <div class="intro--section">
            <h3>Ohau hi sold real state</h3>
            <p>Search homes for sale in the Greater Anchorage Area. Real Estate LIstings include large photos, virtual tours.</p>
        </div>
        <div class="data--section intro--section">
            @if(isset($report))
                <h3>Sales activity in {{$location->name}}</h3>
                <table>
                    <tr>
                        <td colspan="3"><label>Total Properties </label></td>
                        <td>{{$report->total_listings ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Properties for sale(Today's date)</label></td>
                        <td>{{$report->total_listings_active ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Sold Properties </label></td>
                        <td>{{$report->total_listings_sold ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Sold properties in past year</label></td>
                        <td>{{$report->total_listings_sold_past_year ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Sold properties in this year</label></td>
                        <td>{{$report->total_listings_sold_this_year ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Active Median Price</label></td>
                        <td>{{$report->median_price_active ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Sold Median Price</label></td>
                        <td>{{$report->median_price_sold ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Median price sold past year</label></td>
                        <td>{{$report->median_price_sold_past_year ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Median price sold this year</label></td>
                        <td>{{$report->median_price_sold_this_year ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Active Average Price</label></td>
                        <td>{{$report->average_price_active ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Sold Average Price</label></td>
                        <td>{{$report->average_price_sold ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Average price sold past year</label></td>
                        <td>{{$report->average_price_sold_past_year ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>Average price sold this year</label></td>
                        <td>{{$report->average_price_sold_this_year ?? '-'}}</td>
                    </tr>
                </table>
            @endif
        </div>
        <div class="comment--section">
            <div class="row">
                <div class="col-sm-12">
                    <p>With subdivision Info being few and far between on the Internet, our members are encouraged to share useful information.</br>

                        If you live in Bellaire Heights Ph 5 or have information that will help others make home buying or selling decisions here, please share it with us!</p>
                    <textarea class="text-left">Write your comment here..
                                    </textarea>
                    <div>
                        <input type="checkbox">
                        <span>Allow other members to contact me with questions</span>
                    </div>
                    <a href="#" class="btn theme-btn">Add Comment</a>
                </div>
            </div>
        </div>
    </div>
</div>
