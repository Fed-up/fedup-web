<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> - Email Confirmation</title>
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
                                <a href="http://www.fedupproject.com.au/kids-birthday-parties" style="display:block; width:407px; height:100px; margin:0 auto 30px;">
                                    <img src="http://www.fedupproject.com.au/images/email/header_logo.png" width="407" height="100" alt="" style="display:block; border:0; margin:0;">
                                </a>
                                <p style="margin:0 0 36px; text-align:center; font-size:14px; line-height:20px; text-transform:uppercase; color:#626658;">
                                     - {!! $child_name !!} Party Confirmation -
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
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td>
  																<p style="margin:0 30px 33px;; text-align:center; text-transform:uppercase; font-size:22px; line-height:30px; font-weight:bold; color:#484a42;">
				                                                	@if($errors == 1)
					                                                    <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333; font-weight: bold;">We just need to know these extra things to confim the booking:</p>
					                                                    @if(isset($error_parent_name)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_parent_name !!}</p>@endif
					                                                    @if(isset($error_mobile)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_mobile !!}</p>@endif
					                                                    @if(isset($error_email)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_email !!}</p>@endif
					                                                    @if(isset($error_date)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_date !!}</p>@endif
					                                                    @if(isset($error_child_name)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_child_name !!}</p>@endif
					                                                    @if(isset($error_child_age)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_child_age !!}</p>@endif
					                                                    @if(isset($error_child_gender)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_child_gender !!}</p>@endif
					                                                    @if(isset($error_attend)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_attend !!}</p>@endif
					                                                    @if(isset($error_invitation)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_invitation !!}</p>@endif
					                                                    @if(isset($error_package)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_package !!}</p>@endif
					                                                    @if(isset($error_intolerance)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_intolerance !!}</p>@endif
					                                                    @if(isset($error_activity)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_activity !!}</p>@endif
					                                                    @if(isset($error_parent_attend)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_parent_attend !!}</p>@endif
					                                                    @if(isset($error_parent_food)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_parent_food !!}</p>@endif
                                                                        @if(isset($error_savoury)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_savoury !!}</p>@endif
                                                                        @if(isset($error_snack)) <p style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">{!! $error_snack !!}</p>@endif			
				                                                    @endif
				                                                </p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                <!-- begin articles -->
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="text-align:center; margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td>
                                                                <a style="display:block; margin:0 0 14px;" href="http://www.fedupproject.com.au/kids-birthday-parties"><img src="http://www.fedupproject.com.au/images/email/date.png" width="255" height="150" alt="Date" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <p style="font-size:22px; line-height:22px; text-align:center; font-weight:bold; color:#333333; margin:0 0 5px;"><a href="http://www.fedupproject.com.au/kids-birthday-parties" style="color:#6c7e44; text-decoration:none;">Date & Time</a></p>
                                                                <p style="margin:0 0 10px; font-size:18px; text-align:center; line-height:18px; color:#333333;">{!! $date !!}</p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td>
                                                                <a style="display:block; margin:0 0 14px;" href="http://www.fedupproject.com.au/kids-birthday-parties"><img src="http://www.fedupproject.com.au/images/email/contact.png" width="255" height="150" alt="Time" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <p style="font-size:22px; text-align:center; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;"><a href="http://www.fedupproject.com.au/kids-birthday-parties" style="color:#6c7e44; text-decoration:none;">Contact</a></p>
                                                                <p style="margin:0 0 10px; font-size:18px; text-align:center; line-height:18px; color:#333333;">Parent Name: {!! $parent_name !!}</p>
                                                                <p style="margin:0 0 10px; font-size:18px; text-align:center; line-height:18px; color:#333333;">Mobile: {!! $mobile !!}</p>
                                                                <p style="margin:0 0 10px; font-size:18px; text-align:center; line-height:18px; color:#333333;">Email: {!! $email !!}</p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td>
                                                                <a style="display:block; margin:0 0 14px;" href="http://www.fedupproject.com.au/kids-birthday-parties"><img src="http://www.fedupproject.com.au/images/email/cooking.png" width="255" height="150" alt="Purchase" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <p style="font-size:22px; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px; text-align:center;"><a href="http://www.fedupproject.com.au/kids-birthday-parties" style="color:#6c7e44; text-decoration:none;">Children Detials</a></p>
                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Birthday Child: {!! $child_name !!}</p>
                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Age: {!! $child_age !!}</p>
                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Gender: {!! $child_gender !!}</p>
                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Children Intolerances: {!! $intolerance !!}</p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td>
                                                                <a style="display:block; text-align:center; margin:0 0 14px;" href="http://www.fedupproject.com.au/kids-birthday-parties"><img src="http://www.fedupproject.com.au/images/email/quantity.png" width="255" height="150" alt="Tickets" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <p style="font-size:22px; text-align:center; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;"><a href="http://www.fedupproject.com.au/kids-birthday-parties" style="color:#6c7e44; text-decoration:none;">Items</a></p>
                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Birthday Activity: {!! $activity !!}</p>
                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Food Package: {!! $package !!}</p>

                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Savoury Food: {!! $savoury !!}</p>

                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Snack Food: {!! $snack !!}</p>

                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Children Attending: {!! $attend !!}</p>
                                                                <p style="margin:0 0 10px; text-align:center; font-size:18px; line-height:18px; color:#333333;">Create Invitation: {!! $invitation !!}</p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td colspan="3">
                                                                <a style="display:block; margin:0 0 14px;" href="http://www.fedupproject.com.au/location"><img src="http://www.fedupproject.com.au/images/email/map.png" width="540" height="220" alt="Map to Venue" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <p style="font-size:14px; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;"><a href="http://www.fedupproject.com.au/kids-birthday-parties" style="color:#6c7e44; text-decoration:none;">We are excited to see you at the event </a></p>

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
                                                                    Let's have some fun, cook & celebrate!<br>
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