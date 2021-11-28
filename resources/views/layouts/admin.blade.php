<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="/css/theme.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper">
    
        <header class="header-desktop " style= "background-color: #191851" >
            <div class="section__content section__content--p30">    
                <div class="header-wrap">          
                    <div class="content">
                        <a class="js-acc-btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>  
                </div>
            </div>
        </header>
    
        
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">   
    
                  <div class="row">
                  <div class="jumbotron container" style= "margin-top: 40px; background-color: #191851">
   <h2 class="display-4 text-light">Manage Data</h2>
   <div class="row" >
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body"  >
                    <h5 class="card-title">View Data</h5>
                    <p class="card-text">View Data of Security Personnel, Office Staff and Office.</p>
                    <a href="/events/create"class="btn btn-primary" style="background:#FFA500;border-color:#FFA500;" >View Data</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Register Data</h5>
                    <p class="card-text">Register Security Personnel, Office Staff or Office.</p>
                    <a href=""class="btn btn-primary" style="background:#FFA500;border-color:#FFA500;" >Register Now</a>
                </div>  
            </div>
        </div>
    </div>
</div>
<div class="jumbotron container" style= "background-color: #191851">
   <h2 class="display-4 text-light">Visitor</h2>
   <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Visitor</h5>
                    <p class="card-text">View visitor information and All visit history of Visitor.</p>
                    <a href=""class="btn btn-primary" style="background:#FFA500;border-color:#FFA500;" >View All</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Today's Visit</h5>
                    <p class="card-text">View today's visit Information and see Visitor visit history.</p>
                    <a href=""class="btn btn-primary" style="background:#FFA500;border-color:#FFA500;" >View Today's Visit</a>
                </div>  
            </div>
        </div>
    </div>
</div>

    
                       
                        
                  </div>
    
                </div>
            </div>
        </div>
    
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/vendor/jquery-3.2.1.min.js"></script>
    <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="/vendor/animsition/animsition.min.js"></script>
    <script src="/js/main.js"></script>

</body>

</html>
