 @extends('frontend.layouts.index')

 @section('content')

<div id="contents" class="sixteen columns">

	<div class="twelve columns" id="left-content">
	<br>
	
	<h4 style="font-weight: bold;">স্বীকৃতি :</h4>
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

    @if($sikrities->isEmpty())
     <h4 style="color:red">Data Not Found!!!</h4>
      @else

  	 <table class="table table-bordered table-hover" id="example" width="100%">
                <thead>
                <tr style="background-color: #001f3f;color: white;font-weight:bold;">
                    <td width="10%">Sl</td>
                    <td width="20%">Title</td>
                    <td width="70%">Image</td>
                </tr>
                </thead>
                <tbody>
                	@foreach($sikrities as $key=> $teacher)
                   <tr>
                   <td>{{ $key+1 }}</td>
                   <td>
                      {{ $teacher->title }}
                   </td>
                   
                    <td><img src="{{ !empty($teacher->image) ? asset('upload/sikriti/' . $teacher->image) : asset('upload/teacherimage/default.png') }}"
                        width="500" height="600" alt="sikriti Image">

                    </td>
                  </tr>
                      @endforeach      
                 </tbody>
            </table>

            {{ $sikrities->links() }}
    @endif
   </div>
</div>
 @endsection
