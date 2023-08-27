
<style>
@font-face {font-display: swap;   font-family: 'La Belle Aurore';font-style: normal;font-weight: 400; src: url('{{ asset("fonts/la-belle-aurore-v16-latin-regular.woff2")}}') format('woff2'); }    
@font-face {font-display: swap;font-family: 'Orbitron';font-style: normal;font-weight: 400;src: url('{{ asset("fonts/orbitron-v29-latin-regular.woff2")}}') format('woff2');}
@font-face {font-display: swap;font-family: 'Sacramento';font-style: normal;font-weight: 400;src: url('{{ asset("fonts/sacramento-v13-latin-regular.woff2")}}') format('woff2');}

/*
@font-face {font-display: swap;   font-family: 'La Belle Aurore';font-style: normal;font-weight: 400; src: url('{{ asset("fonts/la-belle-aurore-v16-latin-regular.woff2")}}') format('woff2'); }    
@font-face {font-display: swap;font-family: 'Orbitron';font-style: normal;font-weight: 400;src: url('{{ public_path("fonts/Orbitron-Regular.ttf")}}') format('truetype');}
@font-face {font-display: swap;font-family: 'Sacramento';font-style: normal;font-weight: 400;src: url('{{ public_path("fonts/Sacramento-Regular.ttf")}}') format('truetype');}*/

#certificate-wrapper p{ margin:0px; padding:0px;}

#certificate-wrapper { font-family: Arial, sans-serif; width:900px; height:636px; margin: 20px auto;padding: 20px;border: 2px solid #000; border-radius: 10px; display:block; overflow:hidden; position: relative;}
#certificate-wrapper .bgimage{ width: inherit; position: absolute; top:20px; z-index: -1;}
#certificate-wrapper .bgimage img{ width: 100%;}

#certificate-wrapper .body{display: block; position: relative;}
#certificate-wrapper .body .registration {text-align:right;font-size: 16px; font-family: 'Orbitron'}
#certificate-wrapper .body .candidate {text-align:center;font-size: 32px; font-weight: 400; font-family: 'Sacramento'}
#certificate-wrapper .body .course{ font-size:32px; text-align:center; font-weight:400; font-family: 'Orbitron';}

#certificate-wrapper .footer{display: block; position: relative; padding-bottom:88px;}

#certificate-wrapper .footer .date{ position: absolute; left:194px; top:35px; font-family: 'Orbitron'}
#certificate-wrapper .footer .rank{  font-size:28px; font-weight:400; font-family: 'Orbitron'; position: absolute; left:442px; top:35px;}
#certificate-wrapper .footer .signature{ font-size:32px; font-family: 'Sacramento'; position: absolute; right:204px; top:15px;}

</style>
<div id="certificate-wrapper">
    <div class="bgimage"><img src="{{asset('certificates/course.png?sdadsa')}}" /></div>
    <div class="body">
        <p class="registration">{{$key}}</p>
        <p style="height:254px;">&nbsp;</p>
        <p class="candidate">{{$user_name}}</p>
        <p style="height:62px;">&nbsp;</p>
        <p class="course">{{$course_name}}</p>  
    </div>  
    <div class="footer">
        <div class="date">{{$date}}</div>
        <div class="rank">5</div>
        <div class="signature">{{$signature}}</div>
    </div>
</div>
