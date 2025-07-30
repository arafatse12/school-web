
@extends('frontend.layouts.index')

 @section('content')

<div id="contents" class="sixteen columns">

	<div class="twelve columns" id="left-content">
	<br>
	
	<h4 style="font-weight: bold;">আমাদের ছাত্র-ছাত্রী :</h4>
	<hr>
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

    @if($students->isEmpty())
     <h4 style="color:red">Data Not Found!!!</h4>
      @else

  	 <table class="table table-bordered table-hover" id="example" width="100%">
                <thead>
                <tr style="background-color: #001f3f;color: white;font-weight:bold;">
                    <td width="10%">Sl</td>
                    <td width="20%">Name</td>
                    <td width="10%">Mobile</td>
                    <td width="10%">Class</td>
                    <td width="10%">Roll No</td>
                    <td width="20%">Address</td>
                    <td width="20%">Image</td>
                </tr>
                </thead>
                <tbody>
                	@foreach($students as $key=> $student)
                   <tr>
                   <td>{{ $key+1 }}</td>
                   <td>
                      {{ $student->name }}
				   </td>
				    <td>
                      {{ $student->mobile }}
				   </td>

				    <td>
                      {{ $student->class }}
				   </td>
				    <td>
                      {{ $student->roll }}
				   </td>
				    <td>
                      {{ $student->address }}
				   </td>
                   
                    <td><img src="{{ !empty($student->image) ? asset('upload/studentimage/' . $student->image) : asset('upload/teacherimage/default.png') }}"
                        width="100" height="100" alt="student Image">
                    </td>
                  </tr>
                      @endforeach      
                 </tbody>
            </table>

            {{ $students->links() }}
    @endif
   </div>
</div>
 @endsection

