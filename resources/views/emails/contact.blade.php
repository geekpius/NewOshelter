@extends('emails.layout')

@section('content')
<td valign="top" align="center" style="padding:0;Margin:0;width:560px"> 
  <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
    <tr style="border-collapse:collapse"> 
     <td align="center" style="padding:0;Margin:0;padding-top:0;padding-bottom:0;font-size:0"><a target="_blank" href="https://#" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:16px;text-decoration:none;color:#0B5394"><img src="{{ asset('assets/images/form-logo.png') }}" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="60" height="63"></a></td> 
    </tr> 

    <tr style="border-collapse:collapse"> 
     <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:5px"><h1 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333;text-align: center"><strong>CONTACT SUPPORT </strong></h1><h1 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333;text-align:center"><strong>&nbsp;</strong></h1></td> 
    </tr> 
    <tr style="border-collapse:collapse"> 
     <td align="center" style="padding:0;Margin:0;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:left">Hi,&nbsp;{{ $data['name'] }}</p></td> 
    </tr> 
    <tr style="border-collapse:collapse"> 
     <td align="left" style="padding:0;Margin:0;padding-right:35px;padding-left:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:left">Thank you for contacting us. We confirm the receipt of your support message:</p></td> 
    </tr> 

    <tr style="border-collapse:collapse"> 
      <td align="left" style="padding:0;Margin:0;padding-right:35px;padding-left:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666;text-align:left">Our team will get back to you soon as soon as possible.</p></td> 
     </tr> 

    <tr style="border-collapse:collapse"> 
     <td align="left" style="padding:0;Margin:0;padding-top:25px;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#666666">Thanks.</p></td> 
    </tr>  
</table></td> 
@endsection