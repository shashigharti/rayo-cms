<div class="row">
    @include("real-estate::admin.leads.partials.details.overview-info")
    <div class="col s9">
        <div class="panel card">
            <div class="col s12">
                <h5>Emails Sent</h5>
            </div>
            <div class="col s12 communication--block">
                <ul class="collapsible" data-collapsible="accordion">
                    @foreach($model->emails as $email)
                        <li>
                            <div class="collapsible-header"><i class="material-icons">add</i>{{  $email->created_at->format('l') }} Property Update <span></span></div>
                            <div class="collapsible-body">
                                <div class="right-align">
                                    <i class="material-icons">close</i>
                                </div>
                                <table cellpadding="0" cellspacing="0" width="600" style="border:1px solid #111;margin-top: 10px;">
                                    <tbody>
                                    <tr>
                                        <td style="text-align:center;padding:5px 5px 10px 5px;background-color:white;border-bottom:0px;">
                                            <img src="../../../app-assets/images/logo.max.jpg" style="margin-top: 20px;max-height:200px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none; border-bottom: 1px solid lightgrey;background-color: #F9F9F9;">
                                            <p style="padding: 10px 20px;">
                                                <span style="font-size: 15px;">Hi {{ $model->first_name }},</span>
                                            </p>
                                            <p style="padding: 5px 20px;"> Here are your latest property updates :
                                                <br> 1 properties for sale in the areas you requested.
                                                <br> A sample of the recent activity...
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#ffffff" style="border:none; padding: 20px 15px;">
                                            <table width="740" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                <tr>
                                                    <td> Displaying 1-1 of 1
                                                        <a href="#" title="" style="color:#1F7ABD;">See All 1 Listings</a>
                                                        <hr style="border:1px solid #f5f5f5">
                                                        <table width="740" border="0" cellspacing="0" cellpadding="20" align="left">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="article" style="float: left;width:65%">
                                                                        <p class="bodytext"> <img src="../../../app-assets/images/property.jpg" style="float:left;margin-right: 20px;" width="160" height="150" alt="" title="">
                                                                            <span style="font-size: 14px">7600 Randamar, Anchorage 99507</span> </p>
                                                                        <p>
                                                                            <br>
                                                                            <br> <i style="color: grey;">3 Bed, 2 Bath, 1196 Sqft.</i> </p>
                                                                        <p></p> <a href="#" style="margin-top: 12px;background:#1F7ABD;color:white;border:none;position:relative;height:90px;font-size:1.1em;font-weight: bolder;font-family: verdana;padding:10px 20px;cursor:pointer;border: 1;border-radius: 4px;outline:none;text-decoration:none;">View Property</a>
                                                                    </div>
                                                                    <div style="float: right;"> <a href="#" style="color: #1F7ABD;font-size: 24px; font-weight: bold;">$294,900</a>
                                                                        <br> <i style="color: red; padding: 20px 0;">New Home!</i>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="border-top:2px solid #f5f5f5;padding: 20px 20px;"> Please let me know if you have questions about any of these homes or if you would like to schedule a showing.
                                                <br>
                                                <br> <i>Rod Stone</i>
                                                <br> <a href="mailto:rod@rodstone.com">rod@rodstone.com</a>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center; background-color: #315C85; padding: 10px 15px;">
                                            <p>
                                                <a style="text-decoration: none; font-family: verdana; color: white; font-weight: bold; font-size: 18px;" href="#">https://4alaskarealestate.com</a>
                                                <br>
                                                <br>
                                                <i style="color: white; font-family: verdana; font-size: 12px;background-color: #315C85">This message is intended for Vega Norma who registered on <a style="color:#1ba71b" href="#">https://4alaskarealestate.com</a> To stop these emails, <a style="color:#1ba71b" href="#">Click here</a>.</i>
                                            </p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
