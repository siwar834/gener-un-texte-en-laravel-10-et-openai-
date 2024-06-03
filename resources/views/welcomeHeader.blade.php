<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Labortaire</title>
  
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-black" href="#page-top">Start Search</a>
                <button class="navbar-toggler text-black" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0 ">
                        <li class="nav-item"><a class="nav-link text-black" href="/">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link text-black" href="/Laboratoires">Laboratoires</a></li>
                        <li class="nav-item"><a class="nav-link text-black" href="/Projets">Projets</a></li>
                        <li class="nav-item"><a class="nav-link text-black" href="/Publications">Publications</a></li>
                        
                        @if (Route::has('login'))
        
                 @auth
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link text-black" role="button">Tableau de bord</a>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;"> @csrf </form>
            <a class="nav-link text-black"  href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
             Déconnecte
            </a>
          </li>
        @else
          <li class="nav-item">
  
            <a href="{{ route('login') }}" class="nav-link text-black" role="button">
             Connexion
            </a>
          </li>
       

        @endauth
    
  @endif

                         </ul>
                </div>
            </div>
        </nav>
   
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
