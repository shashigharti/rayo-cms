@set('image',$listing->images()->first())
<table width="740" border="0" cellspacing="0" cellpadding="20" align="left">
    <tbody>
    <tr>
        <td>
            <div class="article" style="float: left;width:65%"> <p class="bodytext">  <img src="{{$image ? $image->url : ''}}" style="float:left;margin-right: 20px;" width="160" height="150" alt="" title="">
                    <span style="font-size: 14px">{{$listing->name}}</span> </p><p> <br>  <i style="color: grey;">{{$listing->bedrooms}} Bed, {{$listing->baths_full}} Bath</i> </p> <p></p> <a href="{{route('website.realestate.single',['slug' => $listing->slug])}}" style="margin-top: 12px;background:#1F7ABD;color:white;border:none;position:relative;height:90px;font-size:1.1em;font-weight: bolder;font-family: verdana;padding:10px 20px;cursor:pointer;border: 1;border-radius: 4px;outline:none;text-decoration:none;">View Property</a>
            </div>
            <div style="float: right;"> <a href="#" style="color: #1F7ABD;font-size: 24px; font-weight: bold;">{{$listing->system_price}}</a> <br> <i style="color: red; padding: 20px 0;">New Home!</i>
            </div>
        </td>
    </tr>
    </tbody>
</table>


