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
                            <span>{{ \Carbon\Carbon::parse( $model->last_active)->diffForHumans() }}</span>
                        </div>
                        <div class="col s6">
                            <label>Logins this month:</label>
                            <span>13</span>
                        </div>
                        <div class="col s6">
                            <label>Logins past month:</label>
                            <span>1 day ago</span>
                        </div>
                        <div class="col s6">
                            <label>Logins this year:</label>
                            <span>6</span>
                        </div>
                    </div>
                    <div class="col s12">
                        <table class="mt-5 mb-5">
                            <tr>
                                <th>#</th>
                                <th>When</th>
                                <th>Duration</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
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
                            <label>Last Login:</label>
                            <span>1 day ago</span>
                        </div>
                        <div class="col s6">
                            <label>Logins this month:</label>
                            <span>6</span>
                        </div>
                        <div class="col s6">
                            <label>Last Login:</label>
                            <span>1 day ago</span>
                        </div>
                        <div class="col s6">
                            <label>Logins this month:</label>
                            <span>6</span>
                        </div>
                    </div>
                    <div class="col s12">
                        <table class="mt-5 mb-5">
                            <tr>
                                <th>#</th>
                                <th>When</th>
                                <th>Duration</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>1 day ago</td>
                                <td>-</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
