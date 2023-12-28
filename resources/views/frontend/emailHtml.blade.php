<div class="email-template-root"
    bgcolor="#f6fafb">
    <center class="template-inner">
        <table class="template-table" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"
            bgcolor="#f6fafb">
            <tbody>
                <tr>
                    <td class="first-td" align="center" valign="top"
                        >
                        <center>
                            <a href="{{url('/')}}">
                                <img class="table-image" src="{{url(GetSetting('site_logo'))}}">
                            </a>
                        </center>
                    </td>
                </tr>
                <tr >
                    <td class="second-td" align="center" valign="top"
                        >
                        <table class="second-tbl" border="0" cellpadding="0" cellspacing="0" width="580"
                            bgcolor="#fff">
                            <tbody>
                                <tr>
                                    <td class="third-td" align="left" valign="top"
                                        >

                                        {!! clean($body) !!}

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td class="five-td" align="center" valign="top"
                        >
                        <p> {{@App\Models\FooterInformation::first()->copyright}}</p>
                    </td>
                </tr>

            </tbody>
        </table>
    </center>
</div>
