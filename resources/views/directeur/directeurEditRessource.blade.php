@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Modifier un ressource</h3>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Modifier un ressource</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('directeurEditRessourcePost')}}">
                @csrf
                <div class="card-body">
                <input type="hidden" name="id" value="{{$ressource->id}}" />
        
                  <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="{{$ressource->nom}}" required name="nom" class="form-control" placeholder="Entrer un nom">
                  </div>
                  
                  <div class="form-group">
                  <label>Disponibilité</label>
                  <select  name="disponibilite"  class="form-control">
                      <option value="disponible"@if($ressource->disponibilite=='disponible')selected @endif>Disponible</option>
                      <option value="non disponible"  @if($ressource->disponibilite=='non disponible')selected @endif>Non disponible</option>
               

             </select>   
                
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea required  name="description" class="form-control" placeholder="Entrer une description"rows="4">{{$ressource->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Type</label>
                    <select  name="type"  class="form-control">
                      <option value="labortaire"@if($ressource->type=='labortaire')selected @endif>labortaire</option>
                      <option value="équipement" @if($ressource->type=='équipement')selected @endif>équipement</option>
                      <option value="autre"@if($ressource->type=='autre')selected @endif >autre</option>

             </select>  
                 
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Modifier</button>
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

  


