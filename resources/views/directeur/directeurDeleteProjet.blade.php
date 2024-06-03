@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 > Supprimer d'un projet</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('directeurShowProjets')}}">Projets</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-2">
          </div>
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title"> Etes vous sur de vouloir supprimer ce projet?</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
              <form id="quickForm" method="POST" action="{{route('directeurDeleteProjetPost')}}">
                @csrf
                <input type="hidden" name="id" value="{{$projet->id}}" />
                
             

      
        <div class="detail">
            <label>Titre </label>
            <span>{{$projet->titre}} </span>
        </div>
        <div class="detail">
            <label>Description :</label>
            <span>{{$projet->description}}</span>
        </div>
        <div class="detail">
            <label>Statut :</label>
            <span>{{$projet->statut}}</span>
        </div>
        <div class="detail">
            <label>Chefprojet :</label>
            <span>{{$projet->chefprojet_id}}</span>
        </div>
        <div class="detail">
            <label>Date de debut  :</label>
            <span>{{$projet->date_debut}}</span>
        </div>
        <div class="detail">
            <label>Date de fin  :</label>
            <span>{{$projet->date_fin}}</span>
        </div>
                    
                 
                  
                
                 
                

                
                  
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <a href="{{route('directeurShowProjets')}}" class="btn btn-secondary">Annuler</a>
              
                </div>
              </form>

            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->






