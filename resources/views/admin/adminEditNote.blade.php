@include ('header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mise à jour d'une note</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowNotes')}}">Notes</a></li>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Mise à jour d'une note</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{route('adminEditNotePost')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$selectednote->id}}" />
                <div class="card-body">
                  
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" required value="{{$selectednote->date}}" name="date" class="form-control" placeholder="Entrer une Date">
                  </div>

                  <div class="form-group">
                    <label>Note</label>
                    <input type="text" required value="{{$selectednote->note}}" name="note" class="form-control" placeholder="Entrer une note">
                  </div>

                  <div class="form-group">
                    <label>Lien (Taille Max 10Mo)</label>
                    <input type="file" id="lienNote" value="{{$selectednote->lien}}" name="lien" class="form-control" placeholder="Entrer un ficher (Image/Pdf)">
                  </div>
                  
                  <div class="form-group">
                    <label>Visible</label>
                    <select name="visible" class="form-control" style="width: 100%;">
                        <option value="oui" @if ($selectednote->visible=="oui") selected @endif>Oui</option>
                        <option value="non" @if ($selectednote->visible=="non") selected @endif>Non</option>
                    </select>
                  </div>

                <button type="submit" class="btn btn-warning">Mettre à jour</button>
                  <a href="{{route('adminShowNotes')}}" class="btn btn-secondary">Annuler</a>
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

  


  @include ('footer')
  


<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>

  var uploadField = document.getElementById("lienNote");
uploadField.onchange = function() {
    if(this.files[0].size > 10500000){
       alert("La taille maximale autorisée est 10 Mo !");
       this.value = "";
    };
};


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
  
