<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>USTP Digital Logbook</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <script>
        $(function(){
            $('#datepick').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
            })
        });
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="/css/theme.css" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    

</head>

<body>
    
    
        <header class="header-desktop" style= "background-color: #191851" >

            <div class="section__content-two">
                <a href="/" class="text-white float-left my-auto">Welcome, {{ Auth::user()->username }}!</a>                
            </div> 

            <div class="section__content section__content--p30">    
                         
                    <div class="content">
                        <a class="js-acc-btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <div id="logout-sign">
                                <img src="images/logout-icon.png" alt="logout">
                            </div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>  
                
            </div>
            
        </header>
    
        
        @yield('content')
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/vendor/animsition/animsition.min.js"></script>
    <script src="/js/main.js"></script>
    

</body>

</html>
