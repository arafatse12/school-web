 @extends('frontend.layouts.index')

 @section('content')

<div id="contents" class="sixteen columns">

	<div class="twelve columns" id="left-content">
	<br>
	
	<h4 style="font-weight: bold;">শিক্ষকগণ :</h4>
	<hr>
  		{{-- <div style="text-align: justify;">
            <p>{!!$academic->teacher!!}</p>
        </div> --}}

  	<style>
		nav svg{
			height: 20px;

		}
		nav .hidden{
			display: block !important ;
		}
	</style>
	<div >
  	<style>
		nav svg{
			height: 20px;

		}
		nav .hidden{
			display: block !important ;
		}
	</style>

    @if($teachers->isEmpty())
     <h4 style="color:red">Data Not Found!!!</h4>
      @else

  	 <table class="table table-bordered table-hover" id="example" width="100%">
                <thead>
                <tr style="background-color: #001f3f;color: white;font-weight:bold;">
                    <td width="20%">Name</td>
					          <td width="20%">Designation</td>
                    <td width="20%">Email</td>
                    <td width="20%">Mobile</td>
                    <td width="20%">Image</td>
                </tr>
                </thead>
                <tbody>
                	@foreach($teachers as $key=> $teacher)
                   <tr>
                   {{-- <td>{{ $key+1 }}</td> --}}
                   <td>
                      {{ $teacher->name }}
                   </td>
				            <td>
                     {{ $teacher->designation_name ?? '' }}
                   </td>
                    <td>
                    {{ $teacher->email }} 
                            
                    </td>
                  <td>
                       {{ $teacher->mobile }}
                   </td>
                      <td><img src="{{ !empty($teacher->image) ? asset('upload/teacherimage/' . $teacher->image) : asset('upload/teacherimage/default.png') }}"
                        width="100" height="100" alt="Teacher Image">

                    </td>
                  </tr>
                      @endforeach      
                 </tbody>
            </table>

            {{ $teachers->links() }}
    @endif
   </div>
</div>
 @endsection
