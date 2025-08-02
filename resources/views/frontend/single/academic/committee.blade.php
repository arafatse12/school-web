 @extends('frontend.layouts.index')

 @section('content')

<div id="contents" class="sixteen columns">

	<div class="twelve columns" id="left-content">
	<br>
	
	<h4 style="font-weight: bold;">Committee :</h4>
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

    @if($committees->isEmpty())
     <h4 style="color:red">Data Not Found!!!</h4>
      @else

  	 <table class="table table-bordered table-hover" id="example" width="100%">
                <thead>
                <tr style="background-color: #001f3f;color: white;font-weight:bold;">
                    <td width="10%">Sl</td>
                    <td width="20%">Name</td>
                    <td width="20%">Designation</td>
                    <td width="20%">Mobile</td>
                    <td width="20%">Address</td>
                    <td width="70%">Image</td>
                </tr>
                </thead>
                <tbody>
                	@foreach($committees as $key=> $committee)
                   <tr>
                   <td>{{ $key+1 }}</td>
                   <td>
                      {{ $committee->name }}
                   </td>
                   <td>
                      {{ $committee->designation }}
                   </td>
                   <td>
                      {{ $committee->mobile }}
                   </td>
                   <td>
                      {{ $committee->address }}
                   </td>
                   
                    <td><img src="{{ !empty($committee->image) ? asset('upload/committee/' . $committee->image) : asset('upload/committee/default.png') }}"
                        width="100" height="100" alt="committee Image">

                    </td>
                  </tr>
                      @endforeach      
                 </tbody>
            </table>

            {{ $committees->links() }}
    @endif
   </div>
</div>
 @endsection
