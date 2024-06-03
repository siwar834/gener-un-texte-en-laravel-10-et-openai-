@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 >Supprimer un  ressource</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('directeurShowRessources')}}">Ressources</a></li>
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
                <h3 class="card-title">Etes vous sur de vouloir supprimer ce ressource?</h3>
              </div>
             

            
              <form id="quickForm" method="POST" action="{{route('directeurDeleteRessourcePost')}}">
                @csrf
                <input type="hidden" name="id" value="{{$ressource->id}}" />
                
                   <div class="card-body">

                   
                   <div class="details">
                    <label >Nom: </label>
                    <span> {{$ressource->nom}}</span>
                   </div>
                   <div class="details">
                    <label >Disponibilité :</label>
                    <span> {{$ressource->disponibilite}}</span>
                   </div>
                   <div class="details">
                    <label >Description :</label>
                    <span> {{$ressource->description}}</span>
                   </div>
                
                   <div class="details">
                    <label >Type :</label>
                    <span> {{$ressource->type}}</span>
                   </div>
                   </div>
                   <div class="card-footer">
              
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <a href="{{route('directeurShowRessources')}}" class="btn btn-secondary">Annuler</a>
                
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








