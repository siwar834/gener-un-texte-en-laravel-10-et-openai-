@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 > Supprimer d'un équipement</h3>
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
          <div class="col-md-2">
          </div>
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Etes vous sur de vouloir supprimer cette équipement?
                  </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

            
              <form id="quickForm" method="POST" action="{{route('directeurDeleteEquipementPost')}}">
                @csrf
            
                <input type="hidden"value="{{$equipement->id}}" name="id"/>
                  <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
             
        <div class="detail">
            <label>Nom :</label>
            <span>{{$equipement->nom}}</span>
        </div>
       
        <div class="detail">
            <label>Description :</label>
            <span>{{$equipement->description}}</span>
        </div>
        <div class="detail">
            <label>Date d'achat :</label>
            <span>{{$equipement->date_achat}}</span>
        </div>
        <div class="detail">
            <label>Disponibilité :</label>
            <span>{{$equipement->disponibilite}}</span>
        </div>
  
                   <div class="card-footer">
              
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    <a href="{{route('directeurShowEquipements')}}" class="btn btn-secondary">Annuler</a>
            
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







