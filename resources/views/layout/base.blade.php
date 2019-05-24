<!DOCTYPE html>

<html lang="en">
    <head>
    @include('layout.partials.head')
    <style>
        @import url(//fonts.googleapis.com/earlyaccess/notosansbengali.css);
        
        body {
            font-family: 'Noto Sans Bengali',-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            font-size: large;
        }
        .no-gutters {
            margin-right: 0;
            margin-left: 0;

            > .col,
            > [class*="col-"] {
                padding-right: 0;
                padding-left: 0;
            }
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37138460-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-37138460-4');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1100433316811481');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1100433316811481&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    </head>

    <body>
    @include('layout.partials.nav')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=827680997294820&autoLogAppEvents=1"></script>
    {{-- @include('layout.partials.header') --}}
    <main role="main" style="background-color: #fff4e7; background-image: url('{{ url('storage/images/1.jpg') }}')">
        @yield('content')
    </main>
    @include('layout.partials.footer')
    @include('layout.partials.footer-scripts')
    </body> 
</html>