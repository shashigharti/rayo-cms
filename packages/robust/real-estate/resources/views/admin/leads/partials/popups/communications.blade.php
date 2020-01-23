<div class="column-action__communications">
    <a href="#" title="Click to see communications" class='popup-trigger' href='#'>
        <i aria-hidden="true" class="fa fa-envelope-o"></i>
        <small>
            <sub>{{$lead->emails()->count()}}</sub>
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
                    @foreach($lead->emails as $email)
                       <a href="#">
                           <div class="col s12">
                               <div class="vw-lead-price">
                                  {{  $email->created_at->format('l') }} Property
                                  <br>
                                  Update - {{  $email->created_at->format('D, F d, Y') }}
                                  <br>
                                   {{ $email->created_at->format('g:i A') }}
                                </div>
                           </div>
                       </a>
                    @endforeach
                </div>
                <div class="row vw-view-more">
                    <div class="row">
                        <div class="col s12">
                            <a href="#">
                                View more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</div>
