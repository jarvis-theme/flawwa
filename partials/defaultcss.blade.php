{{ generate_theme_css('flawwa/assets/css/bootstrap.css') }} 
{{ generate_theme_css('flawwa/assets/css/bootstrap-responsive.css') }} 

@if($tema->isiCss=='')
{{ generate_theme_css('flawwa/assets/css/style.css?v=001') }} 
@else
{{ generate_theme_css('flawwa/assets/css/editstyle.css') }} 
@endif
{{ generate_theme_css('flawwa/assets/css/flexslider.css') }} 

{{ favicon() }} 
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
