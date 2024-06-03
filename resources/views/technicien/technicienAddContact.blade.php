@include ('header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Ajouter un contact</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
             <li class="breadcrumb-item active"><a href="{{route('technicienShowContacts')}}">Contacts</a></li>
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
                <h3 class="card-title">Ajouter un contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('technicienAddContactPost')}}">
                @csrf
                <div class="card-body">
                  
        
                  <div class="form-group">
                    <label>Type</label>
                    <select  required name="type"  class="form-control">
                      <option value="reclamation" >Réclamation</option>
                    
                      <option value=" idee" > Idée</option>
                    </select>
               
                  </div>
                  <div class="form-group">
                    <label>Demande</label>
                    <textarea required name="demande" class="form-control" placeholder="Entre une demande "rows="4"></textarea>
                  </div>
                  
                

                  
                 
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('technicienShowContacts')}}" class="btn btn-secondary">Annuler</a>
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
  
