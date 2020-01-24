<div class="column-action__communications">
    <a href="#" title="Click to see communications" class='popup-trigger'>
        <i aria-hidden="true" class="fa fa-envelope-o"></i>
        <small>
            <sub>{{$lead->communications()->count()}}</sub>
        </small>
    </a>
    <ul class='popup-content hide'>
        <div class="info-dialog view-box">
            <div class="box-title">
                {{ $lead->first_name }} {{ $lead->last_name }} - Communication(s)
                <i class="fa fa-times pull-right clickable"></i>
            </div>
            <div class="box-content">
                <div class="row viewed-lead">
                    @foreach($lead->communications as $communication)
                       <a href="#">
                           <div class="col s12">
                               <div class="vw-lead-price">
                                  {{  $communication->created_at->format('l') }} Property
                                  <br>
                                  Update - {{  $communication->created_at->format('D, F d, Y') }}
                                  <br>
                                   {{ $communication->created_at->format('g:i A') }}
                                </div>
                           </div>
                       </a>
                    @endforeach
                </div>
                <div class="row vw-view-more">
                    <div class="row">
                        <div class="col s12">
                            <a href="{{ route('admin.leads.details.edit', ['id' => $lead->id,'type'=>'communications'])}}">
                                View more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</div>
