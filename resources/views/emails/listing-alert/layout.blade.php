<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">

<table cellpadding="0" cellspacing="0" width="600" style="border: 1px solid black; ">
    <tr>
        <td align="center" style="padding: 5px 5px 10px 5px;background-color: white;border-bottom: 0px;">
            @yield('logo')
        </td>
    </tr>
    <tr>

        @section('text_1')
        @show
    </tr>
    <tr>
        <td bgcolor="#ffffff" style="border:none; padding: 20px 15px;">
            <table width="740" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        Displaying 1-{{ count($listings) }} of {{ $total_count }}
                        @if(isset($searchContent) && $searchContent)
                            <a href="#" title="" style="color:#1F7ABD;">See
                                All {{ $total_count }} Listings</a>
                        @else
                            @if(isset($total_count) && $total_count > count($listings))
                                <a href="#" title="" style="color:#1F7ABD;">See
                                    All {{ $total_count }} Listings</a>
                            @endif
                        @endif
                        @foreach($listings as $item)
                            <table width="740" border="0" cellspacing="0" cellpadding="20" align="left">
                                <hr style="border:1px solid #f5f5f5"></hr>
                                <tr>
                                    <td>
                                        <div class="article" style="float: left;width:65%">
                                            <p class="bodytext">
                                                @if(env('APP_CLIENT') == 'hawaii' || env('APP_CLIENT') == 'oregon' || env('APP_CLIENT') == 'atlanta-2' )
                                                    <img src="{{ url($item->firstImage->listing_url)  }}"
                                                         style="float:left;margin-right: 20px;" width="160" height="150"
                                                         alt="{{$item->listing_slug}}" title="{{$item->listing_slug}}"/>
                                                @elseif(env('APP_CLIENT') == 'north-michigan')
                                                    <img src="{{ 'https:' . $item->firstImage->listing_url }}"
                                                         style="float:left;margin-right: 20px;" width="160" height="150"
                                                         alt="{{$item->listing_slug}}" title="{{$item->listing_slug}}"/>
                                                @else
                                                    <img src="{{ $item->firstImage->listing_url }}"
                                                         style="float:left;margin-right: 20px;" width="160" height="150"
                                                         alt="{{$item->listing_slug}}" title="{{$item->listing_slug}}"/>
                                                @endif
                                                <span style="font-size: 14px">{{ $item->listing_name }}</span>
                                            <p>
                                                <br>
                                                <br>
                                                <i style="color: grey;">{{ $item->bedrooms }}
                                                    Bed, {{ $item->baths_full }} Bath, {{ $item->total_finished_area }}
                                                    Sqft.</i>
                                            </p>
                                            </p>
                                            <a href="{{ url('/real-estate/').'/'.$item->mls_number.'/'.$item->listing_slug }}?la=true&lid=<?php echo $lead->id ?>"
                                               style="margin-top: 12px;background:#1F7ABD;color:white;border:none;position:relative;height:90px;font-size:1.1em;font-weight: bolder;font-family: verdana;padding:10px 20px;cursor:pointer;border: 1;border-radius: 4px;outline:none;text-decoration:none;">View
                                                Property</a>
                                        </div>
                                        <div style="float: right;">
                                            <a href="#"
                                               style="color: #1F7ABD;font-size: 24px; font-weight: bold;">${{ number_format($item->system_price) }}</a>
                                            <br>
                                            <i style="color: red; padding: 20px 0;">New Home!</i>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        @endforeach
                    </td>
                </tr>
            </table>
            <br/><br/><br/>
        </td>
    </tr>
    <tr>
        <td>
            @yield('sign-off')
        </td>
    </tr>
    <tr>
        <td style="text-align: center; background-color: #315C85; padding: 10px 15px;">

            <p>
                <a style="text-decoration: none; font-family: verdana; color: white; font-weight: bold; font-size: 18px;"
                   href="{{ url('/') }}">{{ url('/') }}</a>
                <br>
                <br>
                <i style="color: white; font-family: verdana; font-size: 12px;background-color: #315C85">This message is
                    intended for {{ $lead->firstname }} {{ $lead->lastname }} who registered on
                    <a style="color:#1ba71b" href="{{ url('/') }}">{{ url('/') }}</a>
                    To stop these emails, <a style="color:#1ba71b"
                                             href="#">Click
                        here</a>.</i>
            </p>
        </td>
    </tr>
</table>


</body>
</html>
