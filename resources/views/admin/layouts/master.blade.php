<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/png">

    <title>@yield('title') {{ env('APP_NAME') }} </title>


    <link href="{{ asset('admin/assets/css/loader.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('admin/assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('admin/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link href="{{ asset('admin/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/elements/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/font-icons/fontawesome/css/all.min.css')}}">

    @yield('css')

</head>
<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

@include('admin.layouts.header-nav')

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>
        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">
                    @yield('breadcrumbs')
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->



<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

@include('admin.layouts.siderbar')

<!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            @include('admin.layouts.notification')

            @yield('content')
        </div>

        @include('admin.layouts.footer')
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('admin/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<script src="{{ asset('admin/plugins/font-icons/feather/feather.min.js') }}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('admin/plugins/apex/apexcharts.min.js') }}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ asset('admin/plugins/highlight/highlight.pack.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<script>
    checkall('todoAll', 'todochkbox');
    $('[data-toggle="tooltip"]').tooltip()
</script>
<script type="text/javascript">
    feather.replace();
</script>
@yield('js')

<!----pusher notification starts here------->
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script type="text/javascript">
var PUSHER_APP_KEY = '{{ env("PUSHER_APP_KEY") }}';
  var PUSHER_APP_CLUSTER = '{{ env("PUSHER_APP_CLUSTER") }}';
  var PUSHER_APP_CHANNELNAME = '{{ env("PUSHERNOTIFICATIONVALUE").env("APP_NAME") }}';
  var PUSHER_APP_EVENTNAME = '{{ env("PUSHERNOTIFICATIONVALUE").env("APP_NAME") }}Event';
    // Enable pusher logging - don't include this in production
    //Pusher.logToConsole = true;
    var pusher = new Pusher( PUSHER_APP_KEY , {
      cluster: PUSHER_APP_CLUSTER
    });

var channel = pusher.subscribe(PUSHER_APP_CHANNELNAME);
        channel.bind(PUSHER_APP_EVENTNAME, function(data) {
        sendPushernotification(data);  //alert(JSON.stringify(data)); 
});
    
$(document).ready(function(){
Notification.requestPermission().then(function(permission) {
    if(permission === 'granted') {
        //sendPushernotification();
    }
});
});

function sendPushernotification(data){
        if(typeof refreshthistablecls == 'function') { refreshthistablecls();}
        const myNoti = new Notification(data.title, {
        body: data.message,
        icon: data.icon,
        image: data.image.
        link = data.linkurl,
        });
        myNoti.onclick = function(event) {
            event.preventDefault(); 
            if(data.linkurl!=''){ window.open(data.linkurl, '_blank'); }
        }
}


</script>
<!----pusher notification ends here------->
</body>
</html>
