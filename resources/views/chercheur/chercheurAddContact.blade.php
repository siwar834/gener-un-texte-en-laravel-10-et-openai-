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
             <li class="breadcrumb-item active"><a href="{{route('chercheurShowContacts')}}">Contacts</a></li>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ajouter un contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('chercheurAddContactPost')}}">
                @csrf
                <div class="card-body">
                
               
                  <div class="form-group">
                    <label>Type</label>
                    <select  required name="type"  class="form-control">
                      <option value="probleme technique">Problème technique</option>
                      <option value="reclamation" >Réclamation</option>
                      <option value="demande" >Demande</option>
                      <option value=" idee" > Idée</option>
                    </select>
               
                  </div>
                  <div class="form-group">
                    <label>Demande</label>
                    <textarea required name="demande" class="form-control"placeholder="Entrer la  demande" rows="4"></textarea>
                  </div>
                 
                  
                

                 
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a href="{{route('chercheurShowContacts')}}" class="btn btn-secondary">Annuler</a>
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

  





