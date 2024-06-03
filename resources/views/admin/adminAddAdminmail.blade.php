@include ('header')

<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajouter un nouveau mail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="{{route('adminShowAdminmails')}}">Envoi de mail</a></li>
            </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <section class="content">


        
    <form id="quickForm" method="POST" action="{{route('adminAddAdminmailPost')}}">
    @csrf
       
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-secondary">
              <div class="card-header">
                <p class="card-title">Destinataires (ayant une adresse mail valide)</p>
              </div>
              <div class="card-body">
                
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="form-group">
                        <select name="users_id[]" class="duallistbox employeSelect" multiple="multiple" required>
                          @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}} - {{$user->fonction}}</option>'
                          @endforeach
                        </select>
                    </div>  
                  </div>

                </div>
               </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        


       
            
    </section>


    <section class="content">
      <div class="container-fluid">
        
        

        <div class="row">

          
          
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-secondary">
              <div class="card-header">
                <p class="card-title">Courrier</p>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="row">


                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Sujet : </label>
                        <input type="text"  name="sujet" class="form-control" required>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Courrier : </label>
                        <textarea name="courrier" class="wysiwyg form-control" required></textarea> 
                      </div>
                    </div>

                    
    
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success btnAdd">Envoyer</button>
                  <a class="btn btn-default" href="{{route('adminShowAdminmails')}}">Annuler</a>
                </div>

                

              </div>
            </div>
        
        </div>
       
      </div>
    </section>
    

      
 </form>

  </div>
 

  



  @include ('footer')
  

<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script>
$(function () {


 //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

   



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