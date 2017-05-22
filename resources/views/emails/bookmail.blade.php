<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> - Booking Request</title>
</head>
<body style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color:#f0f2ea; margin:0; padding:0; color:#333333;">

<table width="100%" bgcolor="#f0f2ea" cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td style="padding:40px 0;">
                <!-- begin main block -->
                <table cellpadding="0" cellspacing="0" width="608" border="0" align="center">
                    <tbody>
                        <tr>
                            <td>
                                <a href="http://www.fedupproject.com.au" style="display:block; width:407px; height:100px; margin:0 auto 30px;">
                                    <img src="http://www.fedupproject.com.au/images/email/header_logo.png" width="407" height="100" alt="" style="display:block; border:0; margin:0;">
                                </a>
                                <p style="margin:0 0 36px; text-align:center; font-size:14px; line-height:20px; text-transform:uppercase; color:#626658;">
                                     - {!! $name !!} Booking Confirmation Summary -
                                </p>
                                <!-- begin wrapper -->
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td width="8" height="4" colspan="2" style="background:url(http://demo.artlance.ru/email/shadow-top-left.png) no-repeat 100% 100%;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td height="4" style="background:url(http://demo.artlance.ru/email/shadow-top-center.png) repeat-x 0 100%;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="8" height="4" colspan="2" style="background:url(http://demo.artlance.ru/email/shadow-top-right.png) no-repeat 0 100%;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                        </tr>
                                        
                                        <tr>
                                            <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-left-top.png) no-repeat 100% 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td colspan="3" rowspan="3" bgcolor="#FFFFFF" style="padding:0 0 30px;">
                                                <!-- begin content -->
                                                <img src="http://www.fedupproject.com.au/images/email/header.png" width="600" height="221" alt="Fed Up Project" style="display:block; border:0; margin:0 0 44px; background:#eeeeee;">
              
                                                
                                                <!-- begin articles -->
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="text-align:center; margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td>
                                                                <a style="display:block; margin:0 0 14px;" href="http://www.fedupproject.com.au"><img src="http://www.fedupproject.com.au/images/email/date.png" width="255" height="150" alt="Date" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <p style="font-size:22px; line-height:22px; text-align:center; font-weight:bold; color:#333333; margin:0 0 5px;"><a href="http://www.fedupproject.com.au/kids-birthday-parties" style="color:#6c7e44; text-decoration:none;">Date & Time</a></p>
                                                                <p style="margin:0 0 10px; font-size:18px; text-align:center; line-height:18px; color:#333333;">Date: {!! $date !!}</p>
                                                                <p style="margin:0 0 10px; font-size:18px; text-align:center; line-height:18px; color:#333333;">Time: {!! $time !!}</p>

                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td>
                                                                <a style="display:block; margin:0 0 14px;" href="http://www.fedupproject.com.au/"><img src="http://www.fedupproject.com.au/images/email/contact.png" width="255" height="150" alt="Time" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <p style="font-size:22px; text-align:center; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;"><a href="http://www.fedupproject.com.au/" style="color:#6c7e44; text-decoration:none;">Contact</a></p>
                                                                <p style="margin:0 0 10px; font-size:18px; text-align:center; line-height:18px; color:#333333;">Booking Name: {!! $name !!}</p>
                                                                <p style="margin:0 0 10px; font-size:18px; text-align:center; line-height:18px; color:#333333;">People Coming: {!! $people !!}</p>
                                                                <p style="margin:0 0 10px; font-size:18px; text-align:center; line-height:18px; color:#333333;">Email: {!! $email !!}</p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td colspan="3">
                                                                <a style="display:block; margin:0 0 14px;" href="http://www.fedupproject.com.au/location"><img src="http://www.fedupproject.com.au/images/email/map.png" width="540" height="220" alt="Map to Venue" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <p style="font-size:14px; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;"><a href="http://www.fedupproject.com.au" style="color:#6c7e44; text-decoration:none;">See you soon!</a></p>

                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- /end articles -->
                                                <p style="margin:0; border-top:2px solid #e5e5e5; font-size:5px; line-height:5px; margin:0 30px 29px;">&nbsp;</p>
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td>
                                                                <p style="margin:0 0 4px; font-weight:bold; color:#333333; font-size:14px; line-height:22px;">Fed Up Project</p>
                                                                <p style="margin:0; color:#333333; font-size:11px; line-height:18px;">
                                                                    
                                                                    Chat with Sarah or Tom: 0428 438 348<br>
                                                                    Website: <a href="http://www.fedupproject.com.au" style="color:#6d7e44; text-decoration:none; font-weight:bold;">www.fedupproject.com.au</a>
                                                                </p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td width="120">
                                                                <a href="http://www.facebook.com/fedupproject" style="float:left; width:24px; height:24px; margin:6px 8px 10px 0;">
                                                                    <img src="http://www.fedupproject.com.au/images/email/facebook.png" width="24" height="24" alt="facebook" style="display:block; margin:0; border:0; background:#eeeeee;">
                                                                </a>
                                                                <a href="https://www.snapchat.com/add/fedupproject" style="float:left; width:24px; height:24px; margin:6px 8px 10px 0;">
                                                                    <img src="http://www.fedupproject.com.au/images/email/snapchat.png" width="24" height="24" alt="twitter" style="display:block; margin:0; border:0; background:#eeeeee;">
                                                                </a>
                                                                <a href="https://www.youtube.com/channel/UCtmDLIB-t9I71J4n-hHeBng" style="float:left; width:24px; height:24px; margin:6px 8px 10px 0;;">
                                                                    <img src="http://www.fedupproject.com.au/images/email/youtube.png" width="24" height="24" alt="tumblr" style="display:block; margin:0; border:0; background:#eeeeee;">
                                                                </a>
                                                                <a href="http://instagram.com/fedupproject" style="float:left; width:24px; height:24px; margin:6px 0 10px 0;">
                                                                    <img src="http://www.fedupproject.com.au/images/email/instagram.png" width="24" height="24" alt="rss" style="display:block; margin:0; border:0; background:#eeeeee;">
                                                                </a>
                                                                <p style="margin:0; font-weight:bold; clear:both; font-size:12px; line-height:22px;">
                                                                    <a href="http://www.fedupproject.com.au" style="color:#6d7e44; text-decoration:none;">Visit website</a><br>
                                                                    <a href="http://www.fedupproject.com.au/kids-birthday-parties" style="color:#6d7e44; text-decoration:none;">Event Details</a>
                                                                </p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- end content --> 
                                            </td>
                                            <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-right-top.png) no-repeat 0 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td width="4" style="background:url(http://demo.artlance.ru/email/shadow-left-center.png) repeat-y 100% 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="4" style="background:url(http://demo.artlance.ru/email/shadow-right-center.png) repeat-y 0 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                        </tr>
                                        
                                        <tr> 
                                            <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-left-bottom.png) repeat-y 100% 100%;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-right-bottom.png) repeat-y 0 100%;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                        </tr>
                                 
                                        <tr>
                                            <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-corner-left.png) no-repeat 100% 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-left.png) no-repeat 100% 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-center.png) repeat-x 0 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-right.png) no-repeat 0 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                            <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-corner-right.png) no-repeat 0 0;"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- end wrapper-->
                                <p style="margin:0; padding:34px 0 0; text-align:center; font-size:11px; line-height:13px; color:#333333;">
                                    Don‘t want to recieve further emails? You can unsibscribe by replying back to us and letting us know =)
                                    <!-- <a href="http://www.fedupproject.com.au/unsibscribe" style="color:#333333; text-decoration:underline;">here</a> -->
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- end main block -->
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>