@set('image',$listing->images()->first())
<table>
    <tr>
        <td>
            <table cellpadding="0" cellspacing="0" border="0" width="100%">

                <tbody>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tbody>
                            <tr>
                                <td style="font-size: 0; text-align: center; ">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table width="100%"  cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="295" valign="top">
                                    <![endif]-->
                                        <table cellpadding="0" cellspacing="0" border="0" style=" vertical-align: top; display: inline-block; max-width:295px; width:100%;">

                                            <tbody>
                                            <tr>
                                                <td height="27"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">

                                                        <tbody>
                                                        <tr>
                                                            <td width="15"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>

                                                            <td>
                                                                <table cellpadding="0" cellspacing="0" border="0" width="280px">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td><img src="{{ $image ? $image->url : '' }}" alt="" title="" height="187" width="280" data-selector="div.editable img" class="editableImg" style="display: block;"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="20"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-family: 'Lato', sans-serif; font-size: 21px; color:#3a393e; font-weight:700; text-align: left;" class="editable" data-selector="td.editable">{{ $listing->name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="16"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="16"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-family: 'Lato', sans-serif; font-size: 12px; color:#3a393e; line-height:24px; text-align: left; padding-left:8px; padding-right: 12px;" class="editable" data-selector="td.editable"><b>{{ strtoupper($listing->status) }}</b></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="20"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="20"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-family: 'Lato', sans-serif; font-size: 20px; font-weight: 700; color:#3a393e; text-align: left;" class="editable" data-selector="td.editable">${{ number_format($listing->system_price) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="20"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <table width="170" cellpadding="0" cellspacing="0" border="0" style="background:#9dd508; border-radius: 3px">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td height="10"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="31"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"> </td>
                                                                                    <td>
                                                                                        <a href="#" style="text-decoration: none;" class="editable-lni" data-selector="a.editable-lni"><img src="{{ config('app.url') }}/email-images/view.png" width="19" height="18" alt=""> </a>
                                                                                    </td>
                                                                                    <td width="10"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"> </td>
                                                                                    <td style="font-family: 'Lato', sans-serif; font-size: 14px; font-weight: 700;"><a href="{{ route('website.realestate.single', ['slug' => $listing->slug]) }}" style="color: rgb(255, 255, 255); text-decoration: none; outline: none; outline-offset: 1px; display: block; position: relative;" class="editable edit-text" data-selector="a.editable" contenteditable="false" spellcheck="false"> VIEW MORE </a></td>
                                                                                    <td width="25"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="10"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                                                                </tr>

                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>

                                                            <td width="15"><img src="{{ config('app.url') }}/email-images/spacer.gif" alt="" title="" height="1" width="1"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <!--[if (gte mso 9)|(IE)]>
                                        </td><td width="295"  valign="top">
                                        <![endif]-->
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>

                </tr>

                </tbody>
            </table>
        </td>
    </tr>
</table>


