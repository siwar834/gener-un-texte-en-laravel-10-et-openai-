@include('WelcomeHeader')
   
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
<section class="page-section" id="projets">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Projets</h2>
              
                </div>
                <ul class="timeline ">
                @foreach($projets as $projet)
                    <li>
                    
                        <div class="timeline-image">
                        @foreach($photos as $photo)
                        @if($photo->entite_id==$projet->id)

                        <img class="rounded-circle img-fluid" src="photos projets/{{$photo->description}}"  />
                        @else
                        <img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." />
                        @endif
                        
                          @endforeach
                        </div>
                    
                        <div class="timeline-panel ">
                            <div class="timeline-heading text-left">
                            <h4 >Titre du projet: {{$projet->titre}}</h4>

                            </div>
                            <h4 class=" text-left">Laboratoire:{{$projet->laboratoire->nom}}</h4>
                            <h5  class=" text-left">{{$projet->date_debut}}/{{$projet->date_fin}}</h5>
                            <div class="timeline-body"><p class=" text-left" >{{$projet->description}}</p></div>
                        </div>
                    </li>
                   
                    @endforeach
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
       