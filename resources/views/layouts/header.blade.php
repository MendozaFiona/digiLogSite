<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>USTP Digital Logbook</title>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="jquery.datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="/css/theme.css" rel="stylesheet" media="all">
    

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

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    
    <script src="jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
    
    <script src="/js/table2excel.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/vendor/animsition/animsition.min.js"></script>
    <script src="/js/main.js"></script>
    
    <script>
        $(function(){
            $('#datepick').daterangepicker({
                autoApply: true,
                locale: {
                    format: 'YYYY-MM-DD',
                }
            })
        });
    </script>

    <script>
        function printDiv() {
            var divContents = document.getElementById("pdfprint").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body >');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>

    <script>
        function exportTableToExcel(){
            var table2excel = new Table2Excel();
            try {
                table2excel.export(document.querySelectorAll("#tblData"));
            } catch (error) {
                alert("There's nothing to export");
            }     
        }
    </script>
    

</body>

</html>
