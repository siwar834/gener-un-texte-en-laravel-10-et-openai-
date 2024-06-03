@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 >Supprimer une maintenance</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
             <li class="breadcrumb-item active"><a href="{{route('technicienShowMaintenances')}}">Maintenances</a></li>
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
                <h3 class="card-title">Etes vous sur de vouloir supprimer cette maintenance ?</h3>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                    <form id="quickForm" method="POST" action="{{route('technicienDeleteMaintenancePost')}}">
                @csrf 
                <input type="hidden"value="{{$maintenance->id}}" name="id"/>
          
        <div class="detail">
            <label>Nom :</label>
            <span>{{$maintenance->equipement->nom}}</span>
        </div>
        <div class="detail">
            <label>Montant :</label>
            <span>{{$maintenance->montant}}</span>
        </div>
        <div class="detail">
            <label>Description :</label>
            <span>{{$maintenance->description}}</span>
        </div>
        <div class="detail">
            <label>Date :</label>
            <span>{{$maintenance->date}}</span>
        </div>
                   <div class="card-footer">
                

                  
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <a href="{{route('technicienShowMaintenances')}}" class="btn btn-secondary">Annuler</a>
                
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







