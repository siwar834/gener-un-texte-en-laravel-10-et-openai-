@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Ajouter un  équipement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('directeurShowEquipements')}}">Equipements</a></li>
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ajouter un équipement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('directeurAddEquipementPost')}}">
           @csrf

                <div class="card-body">
                  
        
                  <div class="form-group">
                    <label>Nom</label>
                    <input type="text" required name="nom" class="form-control"placeholder="Entre un nom d'un équipement">
                  </div>
                  
                  <div class="form-group">
                    <label>Disponibilité</label>

                    <select  name="disponibilite" required class="form-control">
                    
                      <option value="disponible">Disponible</option>
                      <option value="non disponible" >Non disponible</option>
               

             </select>
  

                  
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea required name="description" class="form-control"placeholder="Entre un description d'un équipement" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Date achat</label>
                    <input type="date" required name="date_achat" class="form-control" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('directeurShowEquipements')}}" class="btn btn-secondary">Annuler</a>
                  </div>

                

              </div>
            </div>
        
        </div>
       
      </div>
    </section>
    

      
 </form>

  </div>

