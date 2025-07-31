<div class="container">
<div class="sixteen columns" style="background-color: #393232; box-shadow: 0 1px 5px #999999;height:40px;">
<div style="display: inline-block;float: left;width: 960px;border-bottom: 4px solid #e48257;">
<div class="col" id="div-lang" style="height: 25px;">
<div id="newNavigation"></div>
<div id="div-lang-sel" style="float: left;">
<div style="float: left;margin-left: 5px; font-size: 14px;text-align:center">
                            <a href="{{ route('public') }}">{{$setting->college_name}} </a>
                    </div>
</div>
</div>
</div>
</div>

<div class="sixteen columns">
<div class="callbacks_container" style="box-shadow: 0 1px 5px #999999;">
<ul class="rslides" id="front-image-slider">

 <li>
    @foreach($sliders as $slider)
<img src="{{ asset('upload/sliderimage') }}/{{ $slider->image }}" alt="Hi Tech Polytechnic Institute - Slide" width="960" height="220"/>
</li>
@endforeach
    </ul>
<style>.rslides img{height:220px}</style>
</div>

<div class="header-site-info" id="header-site-info">
<div>
<div id="logo">
<a title="Home" href="{{ route('public') }}"><img alt="Home" src="{{ asset('upload/settingimage') }}/{{ $setting->logo }}"></a>
</div>
<div class="clearfix" id="site-name-wrapper">
<span id="site-name">
<a title="Home" href="{{ route('public') }}">{{$setting->college_name}} </a>
</span>
</div>
<!-- /site-name-wrapper -->

</div>
<!-- /header-site-info-inner -->

</div>

</div>
﻿


<div class="sixteen columns" id="jmenu">
<div class="sixteen columns">
<a href="javascript:;" class="show-menu menu-head"> মেনু নির্বাচন করুন</a>
<div role="navigation" id="dawgdrops">
<ul class="meganizr mzr-slide mzr-responsive" >
<!-- Build The Menu -->
<li class="col0 "><a title="Home" href="{{ route('public') }}" style="background-image: url({{ asset('frontend') }}/assets/images/icon/home_dark.png);margin-top:5px;"></a></li>
<li class="col1 mzr-drop"><a href="#" class="submenu">বিদ্যালয়ের তথ্য</a>
<div class="mzr-content drop-one-columns">
    <div class="one-col">
        <ul class="mzr-links">
        <li><a href="{{ route('history') }}">ইতিহাস</a></li>
        <li><a href="{{ route('structure') }}">প্রধান শিক্ষকের বাণী</a></li>
        <li><a href="{{ route('infrastructure') }}">সম্পদ</a></li>
         <li><a href="{{ route('teacher') }}">শিক্ষক</a></li>
        <li><a href="{{ url('/sikriti') }}">স্বীকৃতি</a></li>
        <li><a href="{{ route('our-student') }}">ছাত্র-ছাত্রী</a></li>
         <li><a href="{{ url('principal-details/1') }}">প্রতিষ্ঠাতা</a></li>
         <li><a href="{{ route('stuff') }}"> কর্মচারী</a></li>
        </ul>
    </div>
</div>
</li>

<li class="col4 mzr-drop"><a href="#" class="submenu">কার্যাবলী</a>
<div class="mzr-content drop-one-columns">
    <div class="one-col">
        <h6> </h6>
    <ul class="mzr-links">
    <li><a href="{{ route('class-routine') }}">পরীক্ষার রুটিন</a></li>
    <li><a href="{{ route('academic-syllabus') }}">একাডেমিক সিলেবাস</a></li>
    <li><a href="{{ route('calendar') }}">শিক্ষা বর্ষপঞ্জি</a></li>
    <li><a href="{{ route('class-routine') }}">ক্লাস রুটিন</a></li>
    <li><a href="{{ route('our-student') }}">উপস্থিতি</a></li>
    {{-- <li><a href="{{ route('class-routine') }}">প্রকাশনা</a></li> --}}
       </ul>
    </div>
</div>
</li>


<li class="col8 mzr-drop"><a href="#" class="submenu">একাডেমিক রেকর্ড</a>
<div class="mzr-content drop-one-columns">
    <div class="one-col">
        <h6>  </h6>
        <ul class="mzr-links">
                <li><a href="http://www.educationboardresults.gov.bd/"><span>পাবলিক পরীক্ষা</span></a></li>
                <li><a href="{{ route('admission.rules') }}"><span>ভর্তি পরীক্ষা</span></a></li>
                {{-- <li><a href="#"><span>সাময়িক পরীক্ষা</span></a></li>
                <li><a href="#"><span>টিউটরিয়াল পরীক্ষা</span></a></li>
                <li><a href="#"><span>কুইজ টেস্ট</span></a></li> --}}
                <li><a href="{{ route('curricullam') }}">বর্তমান শিক্ষা ব্যবস্থা</a></li>
                <li><a href="{{ route('tution') }}">শিক্ষার্থীদের বেতন</a></li>
                <li><a href="{{ route('student-success') }}">শিক্ষার্থীদের সাফল্যের গল্প</a></li>
                <li><a href="{{ route('admission.notice') }}">ভর্তি নোটিশ</a></li>
                <li><a href="{{ route('exam.notice') }}">পরীক্ষার নোটিশ</a></li>
                <li><a href="{{ route('result.notice') }}">ফলাফলের নোটিশ</a></li>
        </ul>
    </div>
</div>
</li>


<li class="col6 mzr-drop"><a href="#" class="submenu">রেজাল্ট ও এডমিন কার্ড</a>
<div class="mzr-content drop-one-columns">
    <div class="one-col">
        <h6> </h6>
        <ul class="mzr-links">
    {{-- <li><a href="{{$setting->admit_card}}">এডমিট কার্ড ডাউনলোড</a></li>
	<li><a href="{{$setting->result}}">রেজাল্ট ডাউনলোড</a></li> --}}
	{{-- <li><a href="{{$setting->certificate}}">সার্টিফিকেট ডাউনলোড</a></li> --}}
            <li><a href="http://www.educationboardresults.gov.bd/">বোর্ড পরীক্ষার ফলাফল</a></li>
</ul>
    </div>
</div>
</li>
<li class="col7 mzr-drop"><a href="#" class="submenu">ক্রিয়াকলাপ</a>
<div class="mzr-content drop-one-columns">
    <div class="one-col">
        <h6> </h6>
        <ul class="mzr-links">
            <li><a href="{{ route('class-content') }}">বার্ষিক অনুষ্ঠান</a></li>
             		{{-- <li><a href="#"><span>শিক্ষা সফর</span></a></li>
						<li><a href="#"><span>ক্রীড়া</span></a></li> --}}
						<li><a href="https://dshe.gov.bd/site/moedu_office_order/6ebafea9-307a-4f46-be99-dc2fd3a1db5d"><span>ছুটি</span></a></li>
						{{-- <li><a href="https://tmed.gov.bd/site/notices/ae1e6eb5-946f-43f2-9c4b-6e51f894142e/%E0%A6%AE%E0%A6%BE%E0%A6%A6%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%B8%E0%A6%BE-%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%A4%E0%A6%BF%E0%A6%B7%E0%A7%8D%E0%A6%A0%E0%A6%BE%E0%A6%A8%E0%A6%B8%E0%A6%AE%E0%A7%82%E0%A6%B9%E0%A7%87%E0%A6%B0-%E0%A6%9C%E0%A6%A8%E0%A7%8D%E0%A6%AF-%E0%A7%A8%E0%A7%A6%E0%A7%A8%E0%A7%AB-%E0%A6%B8%E0%A6%BE%E0%A6%B2%E0%A7%87%E0%A6%B0-%E0%A6%9B%E0%A7%81%E0%A6%9F%E0%A6%BF%E0%A6%B0-%E0%A6%A4%E0%A6%BE%E0%A6%B2%E0%A6%BF%E0%A6%95%E0%A6%BE-%E0%A6%93-%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE%E0%A6%AA%E0%A6%9E%E0%A7%8D%E0%A6%9C%E0%A6%BF%E0%A5%A4"><span>শিক্ষা পঞ্জিকা</span></a></li> --}}
            <li><a href="{{ route('co-education') }}">সহ-পাঠক্রম সংক্রান্ত কার্যক্রম</a></li>
</ul>
    </div>
</div>
</li>

<li class="col8 mzr-drop"><a href="#" class="submenu">গ্যালারী</a>
<div class="mzr-content drop-one-columns">
    <div class="one-col">
        <h6>  </h6>
        <ul class="mzr-links">
            <li><a href="{{ route('photo.gallery') }}">ফটো গ্যালারী</a></li>
            <li><a href="{{ route('video.gallery') }}">ভিডিও গ্যালারী</a></li>
        </ul>
    </div>
</div>
</li>
<li class="col8 mzr-drop"><a href="{{url('/contact')}}" class="submenu">যোগাযোগ</a>

<li class="col8 mzr-drop"><a href="#" class="submenu">লগইন</a>
<div class="mzr-content drop-one-columns">
    <div class="one-col">
        <h6>  </h6>
        <ul class="mzr-links">
            <li><a href="{{url('/login')}}">লগইন</a></li>
             {{-- <li><a target="_blank" href="{{$setting->student_login}}">শিক্ষার্থী লগইন</a></li> --}}
        </ul>
    </div>
</div>
</li>


</ul>
</div>
</div>
</div>

<script>
        /* Responsive Design*/
        $(document).ready(function () {
            var wi = $( window ).width();
            if(wi < 980){

                $('#jmenu .show-menu').click(function () {
                    //$('.mzr-responsive').show();
                    $(".mzr-responsive").slideToggle(400,"linear", function () {

                    });
                });

                $("#jmenu a.submenu").click(function() {

                    $('#jmenu a.submenu').siblings().addClass('sibling-toggle');
                    $(this).parent().find(".mzr-content").removeClass('sibling-toggle').addClass('slide-visible').slideToggle(400,"linear", function() {
                        return false;
                    });
                    // return false;
                });
            }

        });

    </script>