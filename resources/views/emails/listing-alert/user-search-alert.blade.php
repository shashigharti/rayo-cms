@extends('emails.listing-alert.layout')

@section('title'," Property Updates")

@section('logo')
    <img src="{{$logo_path}}" style="margin-top: 20px;max-height:200px">
@endsection

@section('text_1')
    @parent
    <td style="border: none; border-bottom: 1px solid lightgrey;background-color: #F9F9F9;">
        <p style="padding: 10px 20px;">
            <span style="font-size: 15px;">Hi {{ $lead->firstname }},</span>
        </p>
        <p style="padding: 5px 20px;">
            @if( !empty($client_name) )

                Here are latest property updates from {{ $client_name }}.
                {{$active_count}} properties for sale, a sample of the recent activity...

            @else

                Here  are  your  latest  property  updates :
                <br>
                @if($active_count > 0)
                    {{$active_count}} properties for sale
                @endif
                @if($sold_count > 0)
                    and {{$sold_count}} sold properties
                @endif
                in the areas you requested.
                <br>
                A  sample  of  the  recent  activity...

            @endif

        </p>
    </td>
@endsection

@section('sign-off')
    <p style="padding: 20px 20px;">
        Please let me know if you have questions about any of these homes or if you would like to schedule a showing.
        <br><br>
        <i>{{ $agentObj->first_name }} {{ $agentObj->last_name }}</i>
        <br>
        <a href="mailto:{{ $agentObj->email }}">{{ $agentObj->email }}</a>
    </p>
@endsection
