@include ('header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Role</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowUsers')}}">Roles</a></li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('adminEditRolePost')}}">
                @csrf
                <input type="hidden" name="id" value="{{$role->id}}" />
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input  disabled type="text" value="{{$role->name}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputDisplayName">Display name</label>
                    <input type="text" value="{{$role->display_name}}" name="display_name" class="form-control" id="exampleInputDisplayName" placeholder="Enter display name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputDescription">Description</label>
                    <input type="text" value="{{$role->description}}" name="description" class="form-control" id="exampleInputDescription" placeholder="Enter brief description">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputCategorie">Catégorie / Groupe</label>
                    <input type="text" value="{{$role->categorie}}" name="categorie" class="form-control" id="exampleInputCategorie" placeholder="Entrer la catégorie">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputOrdre">Ordre (dans le groupe)</label>
                    <input type="number" value="{{$role->ordre}}" name="ordre" class="form-control" id="exampleInputOrdre" placeholder="Entrer l'ordre">
                  </div>


                  
                </div>
                
                <button type="submit" class="btn btn-warning">Mettre à jour</button>
                  <a href="{{route('adminShowRoles')}}" class="btn btn-success">Annuler</a>
              </form>
            </div>
            <!-- /.card -->
            </div>
         
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


 
  </div>
  <!-- /.content-wrapper -->

  



  @include ('footer')


<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
$(function () {
 
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
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
        minlength: "Your password must be at least 5 characters long"
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
  
