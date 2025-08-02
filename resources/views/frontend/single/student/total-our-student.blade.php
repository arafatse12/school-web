
@extends('frontend.layouts.index')

 @section('content')

<div id="contents" class="sixteen columns">

	<div class="twelve columns" id="left-content">
	<br>
	
	<h4 style="font-weight: bold;">মোট ছাত্র-ছাত্রী : {{$grand_total}} জন </h4>
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

  <table style="width: 100%; border-collapse: collapse; text-align: center;" border="1">
    <thead>
        <tr>
            <th style="border: 1px solid #000;">Class</th>
            <th style="border: 1px solid #000;">Section</th>
            <th style="border: 1px solid #000;">Section Students</th>
            <th style="border: 1px solid #000;">Total</th>
        </tr>
    </thead>
    <tbody>
        @php $grand_total = 0; @endphp
        @foreach($grouped_students as $class => $info)
            @php $rowspan = count($info['sections']); $i = 0; @endphp
            @foreach($info['sections'] as $section => $count)
                <tr>
                    @if($i == 0)
                        <td rowspan="{{ $rowspan }}" style="border: 1px solid #000;">{{ $class }}</td>
                    @endif
                    <td style="border: 1px solid #000;">{{ $section }}</td>
                    <td style="border: 1px solid #000;">{{ $count }}</td>
                    @if($i == 0)
                        <td rowspan="{{ $rowspan }}" style="border: 1px solid #000;">{{ $info['total'] }}</td>
                        @php $grand_total += $info['total']; @endphp
                    @endif
                </tr>
                @php $i++; @endphp
            @endforeach
        @endforeach
        <tr>
            <td colspan="3" style="font-weight: bold; border: 1px solid #000;">Total Students</td>
            <td style="font-weight: bold; border: 1px solid #000;">{{ $grand_total }}</td>
        </tr>
    </tbody>
    </table>
   </div>
</div>
 @endsection

