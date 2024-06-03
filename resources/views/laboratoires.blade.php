@include('welcomeHeader')
   
<div id="carouselExampleIndicators" class="carousel slide" style="margin-top:100px;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/header.jpg" class="d-block w-200" width="100%" height="400px"alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/header1.jpg" width="100%" height="400px"class="d-block w-200" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/img/header3.jpg" width="100%" height="400px"class="d-block w-200" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading ">Laboratoires</h2>

                  
                </div>
                @foreach($laboratoires as $laboratoire)
              
<!---- labortaire--->
    <div class="row mb-2">
    <div class="col-md-12">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
         
          <h3 class="mb-0">{{$laboratoire->nom}}</h3>
          <div class="mb-1 text-muted">{{$laboratoire->directeur_id}}</div>
          <p class="card-text mb-auto">{{$laboratoire->description}}</p>
         
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="logos/{{$laboratoire->logo}}" class="bd-placeholder-img" width="500" height="250"  />

        </div>
      </div>
    </div>
<!---- fin labortaire--->
<h3 > Liste des membres</h3>
                <div class="row">
                 
                   @foreach($membres as $membre)
                   @if($membre->laboratoire_id ==$laboratoire->id)
                    <div class="col-lg-4">
                        <div class="team-member">
                          @foreach($photos as $photo)
                          @if($membre->user_id == $photo->entite_id)
                            <img class="mx-auto rounded-circle" src="photos/{{$photo->description}}" alt="..." />
                            @endif
                            @endforeach
                            <h4>{{$membre->user->nom}} {{$membre->user->prenom}}</h4>
                            <p class="text-muted">{{$membre->fonction}}</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
         
             @endforeach
            </div>
        </section>