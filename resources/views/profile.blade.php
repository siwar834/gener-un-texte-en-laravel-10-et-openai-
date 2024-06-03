@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mon profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="#">Profil</a></li>
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
          
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Etat Civil</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputName1">Nom </label>
                        <input disabled type="text" value="{{$user->nom}}"  class="form-control" id="exampleInputName1" placeholder=" Prénom et nom" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputName1">Prénom</label>
                        <input disabled type="text" value="{{$user->prenom}}"  class="form-control" id="exampleInputName1" placeholder=" Prénom et nom" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampletel">Téléphone</label>
                        <input disabled type="text" value="{{$user->tel}}"  class="form-control" id="exampletel" placeholder="00 000 000">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplecin">N° CIN</label>
                        <input disabled type="text" value="{{$user->cin}}"  class="form-control" id="examplecin" placeholder="N° CIN">
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Informations Professionnelles</h3>
                </div>
                
                  <div class="card-body">
                    <div class="row">
                      
                      

                      <div class="col-md-12">
                      <div class="form-group">
                        <label>Fonction</label>
                        <input disabled  type="text" value="{{$user->fonction}}"  class="form-control"  placeholder="...">
                      </div>
                    </div>

                   
                    

                   
                      

                      
                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-6">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Photo de profil</h3>
                </div>
                
                <div class="card-body">
                   
                <div class="row">
                      
                <form id="quickForm1" method="POST" action="{{route('photoprofilePost')}}"  enctype="multipart/form-data">
                @csrf 
                    
                      <div class="col-md-12">
                      <div class="form-group">
                        <label>Photo de profil</label>
                        <input  type="file" name="description" require class="form-control"  >
                      </div>
                      <div class="form-group">
                    
                      <button type="submit" class="btn btn-secondary">Ajouter</button>
                 
                      </div>
                      </div>
                      </div>
                      </form>
                   

                   
                    

                   
                      

                      
                

                </div>
              </div>
            </div>




            <div class="col-md-6">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Données d'identification</h3>
                </div>
                
                  <div class="card-body">
                    <form id="quickForm" method="POST" action="{{route('profilePost')}}">
                        @csrf
                      
                    <div class="row">
                      
                     <div class="col-md-6"> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adresse mail *</label>
                        <input disabled type="email" value="{{$user->email}}" name="email" class="form-control" id="exampleInputEmail1" placeholder="exemple@sarost-group.com" required>
                      </div>
                      </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Mot de passe actuel</label>
                                <input type="password" name="passwordActuel" class="form-control" id="" placeholder="Mot de passe actuel" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Nouveau mot de passe</label>
                                <input type="password" name="passwordNew1" class="form-control" id="" placeholder="Nouveau mot de passe" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Confirmer mot de passe</label>
                                <input type="password" name="passwordNew2" class="form-control" id="" placeholder="Confirmer votre nouveau mot de passe" >
                              </div>
                            </div>
                          
                          <button type="submit" class="btn btn-danger">Valider</button>
                      </div>
                      </form>

                </div>
              </div>
            </div>

                             

        </div>
   



  



        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->

  



  @include ('footer')
 
<script>
$(function () {
 
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      passwordNew1: {
        required: true,
        minlength: 8
      },
      passwordNew2: {
        required: true,
        minlength: 8
      },
      name: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Please enter a name"
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
  
