<div class="row">
    <div class="col-md-12">
        <h3 class="title-more-detail" id="my-saved-bookmarks">My Saved Bookmarks (0) </h3>
        <table class="table table-striped table-saved-alerts">
            <thead>
            <tr>
                <th>#</th>
                <th>Bookmark name</th>
                <th width=200>Active Count</th>
                <th width=200>Sold Count</th>
                <th style="width: 110px">Visit</th>
                <th style="width: 110px">Remove</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($lead->bookmarks) && !empty($lead->bookmarks))
                    @foreach($lead->bookmarks as $bookmark)
                        <tr>
                            <td>{{$bookmark->id}}</td>
                            <td>{{$bookmark->title}}</td>
                            <td>{{$bookmark->active_count}}</td>
                            <td>{{$bookmark->sold_count}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
