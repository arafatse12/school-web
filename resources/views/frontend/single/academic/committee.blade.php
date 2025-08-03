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
                    <td width="20%">Title</td>
                    <td width="70%">Image</td>
                </tr>
                </thead>
                <tbody>
                	@foreach($committees as $key=> $committee)
                   <tr>
                   <td>{{ $key+1 }}</td>
                   <td>
                      {{ $committee->title }}
                   </td>
                   
                   @php
                        $file = $committee->image;
                        $filePath = 'upload/committee/' . $file;
                        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
                    @endphp

                    <td>
                        @if( in_array($extension, ['jpg', 'jpeg', 'png']) )
                            <img src="{{ asset($filePath) }}" alt="image" height="500" width="500">
                        @elseif( $extension == 'pdf' )
                            <a target="_blank" href="{{ asset($filePath) }}">
                                <i class="fa fa-file-pdf" style="color:red; font-size: 20px;"></i>
                            </a>
                        @else
                            <img src="{{ asset('upload/committee/default.png') }}" alt="default" height="100" width="100">
                        @endif
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
