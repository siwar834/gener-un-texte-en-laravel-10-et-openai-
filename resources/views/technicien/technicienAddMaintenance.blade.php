@include ('header')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajouter une maintenance</h1>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ajouter une maintenance</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('technicienAddMaintenancePost')}}">
                @csrf
                <div class="card-body">
                  
        
                  <div class="form-group">
                    <label>Equipement </label>

                    <select name="equipement_id"required  class="form-control">
                  
                      @foreach ($equipements as $equipement)
                        <option value="{{$equipement->id}}">
                          {{$equipement->nom}}  
                        </option>
                      @endforeach
                    </select>
                   
                  </div>
                  
                  <div class="form-group">
                    <label>Montant</label>
                    <input type="number" required name="montant" class="form-control" placeholder="Entre un montant">
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea  required name="description" placeholder="Entre un description de maintenance" rows="2" class="form-control" ></textarea>
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" required name="date" class="form-control" >
                  </div>
               
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('technicienShowMaintenances')}}" class="btn btn-secondary">Annuler</a>
                  </div>

                

              </div>
            </div>
        
        </div>
       
      </div>
    </section>
    

      
 </form>

  </div>





<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
  
