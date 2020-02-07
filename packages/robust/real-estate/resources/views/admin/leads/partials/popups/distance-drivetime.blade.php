<div class="column-action__distance-drivetime">
    <a href="#" title="Distance / Drivetime" class='popup-trigger' href='#'>
        <i aria-hidden="true" class="fa fa-car"></i>
        <small>
            <sub>1</sub>
        </small>
    </a>
    <ul class='popup-content hide'>
        <div class="info-dialog view-box">
            <div class="box-title">
                {{ $lead->first_name }} {{ $lead->last_name }} - Distance DriveTime
                <i class="fa fa-times pull-right clickable"></i>
            </div>
            <div class="box-content">
                <div class="row viewed-lead">
                    @foreach($lead->drives as $drive)
                        @set('image',$drive->listing->images()->first())
                        <a href="{{route('website.realestate.single',['slug'=>$drive->listing->slug])}}" target="_blank">
                        <div class="col s4">
                            <img src="{{$image ? $image->url : ''}}" alt="6903 Lagoon, Panama City Beach 32408" class="img-responsive">
                        </div>
                        <div class="col s8">
                            <div class="vw-lead-name">
                                {{$lead->first_name}} calculated the distance
                            </div>
                            <div class="vw-lead-price">
                                For: {{$drive->listing->name}}
                            </div>
                            <div class="vw-lead-address">
                                From: {{$drive->from}}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="row vw-view-more">
                    <a href="#" class="">
                        <div class="col s12">
                            <a href="{{ route('admin.leads.details.edit', ['id' => $lead->id,'type'=>'distance-drive'])}}">View more
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </ul>
</div>
