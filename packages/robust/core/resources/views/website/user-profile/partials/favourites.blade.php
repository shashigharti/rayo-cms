<div class="">
    <h3 class="title-more-detail favourite-title">My Favourites Properties (0)</h3>
    <div class="sort-filter">
        <div class="left-align col s8">
            <span class="btn btn-xs btn-theme compare-favourite">
                Compare Checkmarked Properties
            </span>
            <span class="btn btn-xs btn-green map-favourite">
                 Show Properties on Map
            </span>
        </div>
        <div class="right-align">
            <div class="sort-favourite">
                Sort By- <button class="btn btn-xs btn-default">$High-Low</button> <button class="btn btn-xs btn-default">$Low-High</button>
            </div>
        </div>
    </div>
    <div class="favourite--table col s12 mr-t-20">
        <table class="striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Property Type</th>
                <th>Asking Price</th>
            </tr>
            </thead>

            <tbody>
                @if(isset($lead->favourites) && !empty($lead->favourites))
                    @foreach($lead->favourites as $favourite)
                        <tr>
                            <td>{{$favourite->name}}</td>
                            <td>{{$favourite->class}}</td>
                            <td>{{$favourite->system_price}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
