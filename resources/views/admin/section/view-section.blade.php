@extends('admin.layouts.index')
@section('content') 


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Section List</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
                <div class="col-sm-6">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                   <button style="margin-top: -30px" type="button" class="close text-white" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
          @endif
        </div>
           
            <div class="pannel" style="background-color:white;border-bottom: 5px solid #605ca8 ;margin-bottom: 20px;">
             <div class="pannel-header" style="background-color: #605ca8;color: white;padding: 10px">
                <h5>Section List
                 <button type="button" class="btn btn-warning float-right btn" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus-circle"></i> Add Section</button>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table  table-hover table-sm">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">
                    <th>SL</th>
                    <th>Section Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $section)
            <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$section->section_name}}</td>
                      
                      <td>
                     <button type="button" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#editCategory-{{ $section->id }}"><i class="fa fa-edit"></i></button>

                    <a title="Delete" id="delete" href="{{route('admin.section.delete',$section->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

   {{-- Add Color --}}

  <div class="modal fade" id="addCategory" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #605ca8 ;">
            <div class="modal-header " style="background-color: #605ca8;color: white;padding: 10px">
              <h4 class="modal-title">Add Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('admin.section.store')}}" id="quickForm">
                @csrf
                  <div class="form-group row">
                     <label for="section_name"  class="col-sm-4 col-form-label">Section Name</label>
                 <div class="col-sm-8">
                    <input type="text" name="section_name" id="section_name" class="form-control" placeholder="Enter Section Name" autocomplete="off" value="{{old('section_name')}}">
                     <font style="color:red">{{($errors)->has('section_name')?($errors->first('section_name')):''}}</font>
                  </div>
                </div>

              <div class="modal-footer ">
                 <button type="button" class="btn btn-danger "  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success ">Add Section</button>
             
            </div>
            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>
  <!-- /.content-wrapper -->
@foreach($alldata as $key => $section)
  <div class="modal fade" id="editCategory-{{ $section->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #605ca8 ;">
            <div class="modal-header " style="background-color: #605ca8;color: white;padding: 10px">
              <h4 class="modal-title">Edit Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('admin.section.update',$section->id)}}" id="quickForm2">
                @csrf
                
                <div class="form-group row">
                     <label for="section_name"  class="col-sm-4 col-form-label">Section Name</label>
                 <div class="col-sm-8">
                    <input type="text" name="section_name" id="cat_id" class="form-control" placeholder="Enter Section Name" autocomplete="off" value="{{$section->section_name}}">
                     <font style="color:red">{{($errors)->has('section_name')?($errors->first('section_name')):''}}</font>
                  </div>
                </div>

              <div class="modal-footer ">
                 <button type="button" class="btn btn-danger "  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning ">Update Section</button>
             
            </div>
            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>

@endforeach

 <!-- /.content-wrapper -->


<script type="text/javascript">
$(document).ready(function () {
 
  $('#quickForm').validate({
    rules: {
     
      section_name: {
        required: true,
        
      },
    },
    messages: {
      section_name: {
        required: "Please enter a section name",
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
</script>
  @endsection