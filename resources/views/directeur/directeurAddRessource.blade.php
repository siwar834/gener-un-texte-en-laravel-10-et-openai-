@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Ajouter un ressource</h3>
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
         
          <div class="col-md-12">
           
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ajouter une ressource</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('directeurAddRessourcePost')}}">
                @csrf
                <div class="card-body">
                  
        
                  <div class="form-group">
                    <label>Nom</label>
                    <input type="text" required name="nom" class="form-control"placeholder="Entrer un nom">
                  </div>
                  
                  <div class="form-group">
                    <label>Disponibilité</label>
           
                  <select  name="disponibilite" class="form-control">
                      <option value="disponible">Disponible</option>
                      <option value="non disponible" >Non disponible</option>
               

             </select>   
                
                
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea required name="description"placeholder="Entrer une description" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Type</label>
                    <select  name="type"class="form-control">
                      <option value="labortaire">labortaire</option>
                      <option value="équipement" >équipement</option>
                      <option value="autre" >autre</option>

             </select>  
                    
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('directeurShowRessources')}}" class="btn btn-secondary">Annuler</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->

  



