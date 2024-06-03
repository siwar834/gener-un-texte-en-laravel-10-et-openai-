@include ('header')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mettre à jour un maintenance</h1>
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="m-0">Mettre à jour un maintenance</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('technicienEditMaintenancePost')}}">
                @csrf
                <input type="hidden" name="id" value="{{$maintenance->id}}" />
                <div class="card-body">
                  <div class="form-group">
                    <label>Equipement </label>
                   
                    <select name="equipement_id" value="{{$maintenance->equipement_id}}"  class="form-control">
                    @foreach ($equipements as $equipement)
                        <option value="{{$equipement->id}}" @if ($equipement->id==$maintenance->equipement_id) selected @endif >
                          {{$equipement->nom}}  
                        </option>
                      @endforeach
                    </select>
                    </div>
                  
                  <div class="form-group">
                    <label>Montant</label>
                    <input type="number" value="{{$maintenance->montant}}" required name="montant" class="form-control" placeholder="Entrer un montant">
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea  required name="description" class="form-control" placeholder="Entrer une description d'une maintenance"rows="2">{{$maintenance->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" value="{{$maintenance->date}}" required name="date" class="form-control" >
                  </div>
              
                <!-- /.card-body -->
               
                  <button type="submit" class="btn btn-warning ">Mettre à jour</button>
                  <a href="{{route('technicienShowMaintenances')}}" class="btn btn-secondary">Annuler</a>
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

  




  


  
