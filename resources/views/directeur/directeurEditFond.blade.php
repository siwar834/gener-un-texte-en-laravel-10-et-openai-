@include ('header')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Modifier un fond</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
             <li class="breadcrumb-item active"><a href="{{route('directeurShowFonds')}}">Fonds</a></li>
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
                <h3 class="card-title">Modifier un fond</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('directeurEditFondPost')}}">
                @csrf
                <div class="card-body">
                <input type="hidden" name="id" value="{{$Fond->id}}" />
        
                  <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="{{$Fond->nom}}" required name="nom" class="form-control">
                  </div>
                  
                  <div class="form-group">
                    <label>Montant</label>
                    <input type="number" required value="{{$Fond->montant_debut}}"name="montant_debut" class="form-control" >
                  </div>
                  

                  <div class="form-group">
                    <label>Description</label>
                    <textarea required name="description" class="form-control" rows="2">{{$Fond->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Statut</label>
                    <select  required name="statut" class="form-control">
                     <option value="disponible"@if($Fond->statut=='disponible') selected @endif>Disponible</option>
                     <option value="non disponible"@if($Fond->statut=='non disponible') selected @endif >Non disponible</option>
                   </select>  
       
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Modifier</button>
                  <a href="{{route('directeurShowFonds')}}" class="btn btn-secondary">Annuler</a>
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

  


