@include ('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajouter un nouvel utilisateur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowUsers')}}">Utilisateurs</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.cont   ainer-fluid -->
    </div>
    <!-- /.content-header -->

    
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <form id="quickForm" method="POST" action="{{route('adminAddUserPost')}}">
           @csrf
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
                        <input  type="text" name="nom" class="form-control" id="exampleInputName1" placeholder="  Nom" required>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputName2">Prénom </label>
                        <input  type="text" name="prenom" class="form-control" id="exampleInputName2" placeholder=" Prénom " required>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampletel">Téléphone(s)</label>
                        <input type="text" name="tel" class="form-control" id="exampletel" placeholder="00 000 000">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="examplecin">N° CIN</label>
                        <input type="text" name="cin" class="form-control" id="examplecin" placeholder="N° CIN">
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
                        <input type="text" name="fonction" class="form-control"  placeholder="Ajouter la fonction">
                      </div>
                    </div>

                    

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Compte actif</label>
                        <select name="actif" class="form-control" style="width: 100%;">
                          <option value="oui">Oui : le compte est actif</option>
                          <option value="non">Non : le compte n'est plus actif</option>
                        </select>
                      </div>
                    </div>
                      
                  </div>
                </div>
              </div>
            </div>

 

            <div class="col-md-6">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Affectation des rôles</h3>
                </div>
                
                  <div class="card-body">
                    <div class="row">
               

                  <div class="col-md-12">
                      <div class="form-group mb-0">
                        <label for="">Accès permanant</label>
                        <div class="row">
                          @foreach ($roles->groupBy('categorie') as $roleGroup)
                            <div class="col-md-6">
                              <div class="card  text-white bg-secondary mb-3">
                                <div class="card-header">
                                  <h3 class="card-title">{{$roleGroup->first()->categorie}} </h3>
                                  <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                      <i class="fas fa-minus"></i>
                                    </button>
                                    
                                  </div>
                                </div>
                                <div class="card-body">
                                  @foreach ($roleGroup->sortBy('ordre') as $role)
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox"  @if ($role->name=="user") checked @endif name="roles[]" class="@if(in_array($role->name,['Eval1','Eval2','Eval_DP','Eval_DG'])) CanNotBeChanged @endif custom-control-input" id="role{{$role->id}}" value="{{$role->id}}"
                                      >
                                      <label style="font-weight: normal;" class="custom-control-label" for="role{{$role->id}}">{{$role->display_name}} </label>
                                    </div>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>

                  </div>

                  
                    


          
                  </div>
                </div>
              </div>
            </div>

          <div class="col-md-6">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Données d'identification</h3>
                </div>
                
                  <div class="card-body">
                    <div class="row">
                      
                     <div class="col-md-6"> 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adresse mail *</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="exemple@sarost.com" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="emailvalide">Adresse vérifiée ?</label>
                        <select name="emailvalide" class="form-control" style="width: 100%;">
                            <option value="non">Non</option>
                            <option value="oui">Oui</option>
                          </select>
                       </div>
                    </div>

                      

                      <div class="col-md-12">
                          <label for="exampleInputPassword1">Mot de passe *</label>
                        <div class="input-group input-group mb-0">
                          <input type="text" name="password" autocomplete="off" minlength="8" value="" class="ZonePassword form-control" placeholder="Mot de passe" required>
                          <div class="btnGeneratePassword input-group-append">
                            <span title="Générer un mot de passe" class="input-group-text"><i class="fa fa-retweet"></i></span>
                          </div>
                        </div>
                      </div>


                  </div>
                </div>
              </div>
            </div>
            
            



            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Confirmation de l'ajout</h3>
                </div>
                
                  <div class="card-body">
                    <div class="row">
               
                    Est ce que vous êtes sur de vouloir ajouter ce User ?
                    


          
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ajouter</button>
                  <a class="btn btn-secondary" href="{{route('adminShowUsers')}}">Annuler</a>
                </div>


              </div>
            </div>
                  
   
              



              </div>
              </form>
            </div>
            <!-- /.card -->
           
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->

  


 @include ('footer')
  


<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>




$(".liPrime").click(function(){
  $(this).next().toggle();
});


$(function () {
 
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: false,
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



function forceLower(strInput) 
{
strInput.value=strInput.value.toLowerCase();
}



function generateRandomString() {
    var length=12;
    var characters = '0123456*+789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*+';
    var randomString = '';
    for (var i = 0; i < length; i++) {
        var randomIndex = Math.floor(Math.random() * characters.length);
        randomString += characters.charAt(randomIndex);
    }
    return randomString;
}

$(".btnGeneratePassword").click(function(){
  $('.ZonePassword').val(generateRandomString());
});

</script>
  
