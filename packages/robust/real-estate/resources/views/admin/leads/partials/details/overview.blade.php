@set('login_count',$activity_helper->getLastLoginByDate($model->user->id))
@set('logins',$activity_helper->bySlug($model->user->id,'logged-in'))
@set('activities',$activity_helper->getAll($model->user->id)->take(10))
<div class="row">
    @include("real-estate::admin.leads.partials.details.overview-info")
    <div class="col s9">
        <div class="row">
            <div class="col s6">
                <div class="panel card">
                    <div class="col s12">
                        <h5>Login</h5>
                    </div>
                    <div class="details">
                        <div class="col s6">
                            <label>Last Login:</label>
                            <span>{{$activity_helper->getLastLogin($model->user->id)}}</span>
                        </div>
                        <div class="col s6">
                            <label>Logins this month:</label>
                            <span>{{$login_count['current_month']}}</span>
                        </div>
                        <div class="col s6">
                            <label>Logins from past month:</label>
                            <span>{{$login_count['past_month']}}</span>
                            <span></span>
                        </div>
                        <div class="col s6">
                            <label>Logins this year:</label>
                            <span>{{$login_count['current_year']}}</span>
                        </div>
                    </div>
                    <div class="col s12">
                        <table class="mt-5 mb-5">
                            <tr>
                                <th>#</th>
                                <th>When</th>
                                <th>Duration</th>
                            </tr>
                            @foreach($logins as $counter => $login)
                                <tr>
                                    <td>{{$counter+=1}}</td>
                                    <td>{{$login->created_at->diffForHumans()}}</td>
                                    <td>-</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="panel card">
                    <div class="col s12">
                        <h5>Activity</h5>
                    </div>
                    <div class="details">
                        <div class="col s6">
                            <label>Recent Activities:</label>
                        </div>
                        <div class="col s6">
                            <label> <a href="{{ route('admin.leads.details.edit', ['id' => $model->id,'type'=>'activities'])}}">View all</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <table class="mt-5 mb-5">
                            <tr>
                                <th>#</th>
                                <th>When</th>
                                <th>Action</th>
                            </tr>
                            @foreach($activities as $counter => $activity)
                                <tr>
                                    <td>{{$activity->title}}</td>
                                    <td>{{$activity->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($activity->url)
                                            <a href="{{$activity->url}}" target="_blank">View</a>
                                        @else
                                            {{'-'}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
