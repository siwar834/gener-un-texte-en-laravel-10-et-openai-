@include ('header')

<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Supprimer le message ?</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowAdminmessages')}}">Messages Admin</a></li>
            </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <form id="quickForm" method="POST" action="{{route('adminDeleteAdminmessagePost')}}">
        @csrf
        <input type="hidden" name="id" value="{{$message->id}}" />
        <div class="row">

          
          
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Supprimer le message ?</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="row">
                    
                    <h3 class="text-center">Etes vous sûr de vouloir supprimer le message ?</h3>
    
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Oui, supprimer le message</button>
                  <a class="btn btn-default" href="{{route('adminShowAdminmessages')}}">Non</a>
                </div>
</form>
              </div>
            </div>
            

           




          
              
           
         
         
        </div>
       
      </div>
    </section>
    


 
  </div>
 

  



  @include ('footer')
  

<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
$(function () {


   


    $('.wysiwyg').summernote({

    toolbar: [

            ['style', ['style']],

            ['font', ['bold', 'italic', 'underline', 'clear']],

            ['fontname', ['fontname']],

            ['color', ['color']],

            ['para', ['ul', 'ol', 'paragraph']],

            ['height', ['height']],

            ['insert', ['link', 'picture']],

            ['view', ['fullscreen', 'codeview']],

            ['help', ['help']]

        ],

   });




});
</script>




  
