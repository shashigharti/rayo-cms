<div class="row">
    <div class="col-md-12">
        <h3 class="title-more-detail" id="my-saved-searches">My Saved Searches (0) </h3>
        <div class="pull-right">
            <a class="btn btn-xs btn-theme" href="">New search</a>
        </div>
        <table class="table table-striped table-saved-searches">
            <thead>
            <tr>
                <th>#</th>
                <th>Search Name</th>
                <th>Search Selections</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($lead->searches) && !empty($lead->searches))
                @foreach($lead->searches as $search)
                    <tr>
                        <td>{{$search->id}}</td>
                        <td>{{$search->name}}</td>
                        <td>{{$search->frequency}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
