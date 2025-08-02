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
              <li class="breadcrumb-item active">Sikriti</li>
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
                <h5>Sikriti
                 <button type="button" class="btn btn-warning float-right btn" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus-circle"></i>Sikriti Added</button>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table  table-hover table-sm">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">
                    <th>SL</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($alldata as $key => $class)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$class->title}}</td>
                      <td ><img src="{{asset('upload/sikriti/'.$class->image)}}" alt="" height="300" width="300"></td>
                     
                    <td> 
                     <button type="button" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#editClass-{{ $class->id }}"><i class="fa fa-edit"></i></button>

                    <a title="Delete" id="delete" href="{{route('admin.sikriti.delete',$class->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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

  <div class="modal fade" id="addClass" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #605ca8 ;">
            <div class="modal-header " style="background-color: #605ca8;color: white;padding: 10px">
              <h4 class="modal-title">Sikriti Add</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('admin.sikriti.store')}}"  enctype="multipart/form-data">
                @csrf
                  <div class="form-group row">
                     <label for="title"  class="col-sm-4 col-form-label">Title</label>
                 <div class="col-sm-8">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
                     <font style="color:red">{{($errors)->has('title')?($errors->first('title')):''}}</font>
                  </div>
                </div>

                <div class="form-group row">
                     <label for="image"  class="col-sm-4 col-form-label">Image</label>
                 <div class="col-sm-8">
                    <input type="file" name="image" id="image" class="form-control">
                     <font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font>
                  </div>
                </div>

              <div class="modal-footer ">
                 <button type="button" class="btn btn-danger "  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success ">Sikriti Added</button>
             
            </div>
            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>
  <!-- /.content-wrapper -->
@foreach($alldata as $key => $class)
  <div class="modal fade" id="editClass-{{ $class->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #605ca8 ;">
            <div class="modal-header " style="background-color: #605ca8;color: white;padding: 10px">
              <h4 class="modal-title">Sikriti Edit </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('admin.sikriti.update',$class->id)}}" id="myform2" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group row">
                     <label for="title"  class="col-sm-4 col-form-label">Title</label>
                 <div class="col-sm-8">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter title"  value="{{$class->title}}">
                     <font style="color:red">{{($errors)->has('title')?($errors->first('title')):''}}</font>
                  </div>
                </div>

                <div class="form-group row">
                     <label for="image"  class="col-sm-4 col-form-label">Image</label>
                 <div class="col-sm-8">
                    <img src="{{asset('upload/sikriti/'.$class->image)}}" alt="" height="100" width="100">
                    <input type="file" name="image" id="image" class="form-control"  >
                     <font style="color:red">{{($errors)->has('title')?($errors->first('image')):''}}</font>
                  </div>
                </div>

              <div class="modal-footer ">
                 <button type="button" class="btn btn-danger "  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning ">Update Class</button>
             
            </div>
            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add class -->
</div>

@endforeach

 <!-- /.content-wrapper -->



 
  @endsection