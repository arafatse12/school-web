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
              <li class="breadcrumb-item active">Committee</li>
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
                <h5>Committee
                 <button type="button" class="btn btn-warning float-right btn" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus-circle"></i>Committee Add</button>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table  table-hover table-sm">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">
                    <th>SL</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($alldata as $key => $committee)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$committee->name}}</td>
                      <td>{{$committee->designation}}</td>
                      <td>{{$committee->mobile}}</td>
                      <td>{{$committee->address}}</td>
                      <td ><img src="{{ !empty($committee->image) ? asset('upload/committee/' . $committee->image) : asset('upload/committee/default.png') }}" alt="" height="100" width="100"></td>
                     
                    <td> 
                     <button type="button" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#editClass-{{ $committee->id }}"><i class="fa fa-edit"></i></button>

                    <a title="Delete" id="delete" href="{{route('admin.committee.delete',$committee->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
              <h4 class="modal-title">Committee Add</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('admin.committee.store')}}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                     <label for="name"  class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                        <font style="color:red">{{($errors)->has('name')?($errors->first('name')):''}}</font>
                      </div>
                </div>

                 <div class="form-group row">
                     <label for="designation"  class="col-sm-4 col-form-label">Designation</label>
                    <div class="col-sm-8">
                        <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter designation">
                        <font style="color:red">{{($errors)->has('designation')?($errors->first('designation')):''}}</font>
                      </div>
                </div>

                 <div class="form-group row">
                     <label for="mobile"  class="col-sm-4 col-form-label">Mobile</label>
                    <div class="col-sm-8">
                        <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter mobile">
                        <font style="color:red">{{($errors)->has('mobile')?($errors->first('mobile')):''}}</font>
                      </div>
                </div>

                 <div class="form-group row">
                     <label for="address"  class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter address">
                        <font style="color:red">{{($errors)->has('address')?($errors->first('address')):''}}</font>
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
                <button type="submit" class="btn btn-success ">Committee Add</button>
             
            </div>
            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>
  <!-- /.content-wrapper -->
@foreach($alldata as $key => $committee)
  <div class="modal fade" id="editClass-{{ $committee->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #605ca8 ;">
            <div class="modal-header " style="background-color: #605ca8;color: white;padding: 10px">
              <h4 class="modal-title">Committee Edit </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('admin.committee.update',$committee->id)}}" id="myform2" enctype="multipart/form-data">
                @csrf
                
                 <div class="form-group row">
                     <label for="name"  class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="name" class="form-control" value="{{$committee->name}}">
                        <font style="color:red">{{($errors)->has('name')?($errors->first('name')):''}}</font>
                      </div>
                </div>

                 <div class="form-group row">
                     <label for="designation"  class="col-sm-4 col-form-label">Designation</label>
                    <div class="col-sm-8">
                        <input type="text" name="designation" id="designation" class="form-control" value="{{$committee->designation}}">
                        <font style="color:red">{{($errors)->has('designation')?($errors->first('designation')):''}}</font>
                      </div>
                </div>

                 <div class="form-group row">
                     <label for="mobile"  class="col-sm-4 col-form-label">Mobile</label>
                    <div class="col-sm-8">
                        <input type="number" name="mobile" id="mobile" class="form-control" value="{{$committee->mobile}}">
                        <font style="color:red">{{($errors)->has('mobile')?($errors->first('mobile')):''}}</font>
                      </div>
                </div>

                 <div class="form-group row">
                     <label for="address"  class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <input type="text" name="address" id="address" class="form-control"  value="{{$committee->address}}">
                        <font style="color:red">{{($errors)->has('address')?($errors->first('address')):''}}</font>
                      </div>
                </div>

                <div class="form-group row">
                     <label for="image"  class="col-sm-4 col-form-label">Image</label>
                 <div class="col-sm-8">
                    <img src="{{asset('upload/committee/'.$committee->image)}}" alt="" height="100" width="100">
                    <input type="file" name="image" id="image" class="form-control"  >
                     <font style="color:red">{{($errors)->has('title')?($errors->first('image')):''}}</font>
                  </div>
                </div>

              <div class="modal-footer ">
                 <button type="button" class="btn btn-danger "  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning ">Update</button>
             
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