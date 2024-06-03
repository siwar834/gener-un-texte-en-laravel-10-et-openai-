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
<section class="page-section bg-light" id="publications">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading ">Publications</h2>

                  
                </div>
                
                
              




                <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
    @foreach($publications as $publication)
   
      <div class="card">
        <div class="card-body">
      <div class="col-lg-12">
     
         @foreach($photoprofiles as $photoprofile)
             @if($photoprofile->entite_id==$publication->auteur)
                 <img src="photos/{{$photoprofile->description}}" width="90px" height="90px" class="brand-image rounded-circle" />
            
             
             @endif
        @endforeach
        @foreach($auteurs as $auteur)   
             @if( $auteur->id==$publication->auteur)
               <h2 style="margin-left:100px;margin-bottom:80px;margin-top:-80px">  {{$auteur->nom}} {{$auteur->prenom}} </h2>
             @endif  
        @endforeach
        <p style="margin-left:110px;margin-top:-90px;">
        @php
       
        $datePublication = \Carbon\Carbon::parse($publication->date_publication);
        $daysAgo = $datePublication->diffForHumans();
        @endphp
        {{$daysAgo}}</p>
        <p style="margin-top:50px;">{{$publication->description}}</p>
        @foreach($photos as $photo)
        @if($photo->entite_id==$publication->id)
        <img src="photos publications/{{$photo->description}}" width="100%" height="100px"/>
        @endif
        @endforeach
      
      </div><!-- /.col-lg-4 -->
      </div><!-- /.card -body-->
      </div><!-- /.card -->
       
      @endforeach
</div>
</div>



</div>

        </section>