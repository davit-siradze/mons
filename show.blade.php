@extends('app')

@section('content')
    @include('includes.header-festival')
    <script src="https://js.stripe.com/v3/"></script>

    <section class="video">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="v-title">
                    <h1>{{$data->title}}</h1>
                    <p>{!! $data->short_desc !!}</p>
                        @if($data->file)
                    <a href="{{Storage::url($data->file)}}">@lang("common.btn_text")</a>
                        @endif
                    </div>
                    <!-- /.v-title -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        @if($data->video)
            <video src="{{Storage::url($data->video)}}" playsinline="" autoplay="" muted="" playi="" loop="" id="episoda-audio-bg"></video>
        @else
            <img src="{{Storage::url($data->cover)}}" class="cover-img__bg" alt="">
        @endif
    </section>

    <section class="courses-full">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="courses-full__infos2 mb-5">
                        <div class="spead">
                            <ul>
                                <li><a href="#"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.4384 20C19.3561 20 20.1493 19.3726 20.2725 18.4632C20.3895 17.5988 20.5 16.4098 20.5 15C20.5 12 20.6683 10.1684 17.5 7C16.0386 5.53865 14.4064 4.41899 13.3024 3.74088C12.4978 3.24665 11.5021 3.24665 10.6975 3.74088C9.5935 4.41899 7.96131 5.53865 6.49996 7C3.33157 10.1684 3.49997 12 3.49997 15C3.49997 16.4098 3.61039 17.5988 3.72745 18.4631C3.85061 19.3726 4.64378 20 5.56152 20H18.4384Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg> @lang("common.home")</a></li>
                                <li><a href="{{route('festival.index')}}">@lang("common.festival")</a></li>
                                <li class="active">{{$data->title}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="section-title">
                        <h1>@lang("common.choose_package")</h1>
                        <ul>
                            <li class="sprev2"><a href="#"><i class="icofont-rounded-left"></i></a></li>
                            <li class="snext2"><a href="#"><i class="icofont-rounded-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="choose">
                        <div class="choose-carousel swiper-container" id="choose">
                            <div class="swiper-wrapper">
                                @foreach($upcomingPackages as $package)
                                <div class="swiper-slide">
                                    <div class="choose-item" data-toggle="modal" data-target="#register">
                                        <div class="country">
                                            <h2>{{$package->title}}</h2>
                                        </div>
                                        <div class="date">
                                            <span>
                                                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 10V7C20 5.89543 19.1046 5 18 5H6C4.89543 5 4 5.89543 4 7V10M20 10V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V10M20 10H4M8 3V7M16 3V7" stroke="#000000" stroke-width="2" stroke-linecap="round"/>
                                                    <rect x="6" y="12" width="3" height="3" rx="0.5" fill="#000000"/>
                                                    <rect x="10.5" y="12" width="3" height="3" rx="0.5" fill="#000000"/>
                                                    <rect x="15" y="12" width="3" height="3" rx="0.5" fill="#000000"/>
                                                    </svg>
                                                {{$package->upComingFormat}}
                                            </span>
                                            <p>
                                                <strong>
                                                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,12.692,11.308,3H3v8.308L12.692,21ZM9.923,9.923a1.958,1.958,0,1,1,0-2.769A1.957,1.957,0,0,1,9.923,9.923Z"/></svg>
                                                    @if($package->location_id == 1)
                                                        £{{ number_format($package->price * 1.2, 2) }}
                                                        <div style="margin-top:5px; font-size:12px; color:#000000;font-weight:normal;">
                                                            Includes VAT (20%)
                                                        </div>
                                                    @else
                                                        £{{ number_format($package->price, 2) }}
                                                    @endif
                                                </strong>
                                                <a href="{{route('transaction.festival', $package)}}" class="register_c">

                                                    @lang("common.register")
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">

                    <div class="courses-full__tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    <svg width="800px" height="800px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>@lang("common.c_overview")</title>
                                        <g id="Overview" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="Container" x="0" y="0" width="24" height="24">
                                            </rect>
                                            <path d="M19,10.5714286 L19,18 C19,19.1045695 18.1045695,20 17,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,7 C4,5.8954305 4.8954305,5 6,5 L13.4285714,5 L13.4285714,5" id="shape-1" stroke="#030819" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="0,0">
                                            </path>
                                            <path d="M18,7 C18.5522847,7 19,6.55228475 19,6 C19,5.44771525 18.5522847,5 18,5 C17.4477153,5 17,5.44771525 17,6 C17,6.55228475 17.4477153,7 18,7 Z" id="shape-2" stroke="#030819" stroke-width="2" stroke-linecap="round" stroke-dasharray="0,0">
                                            </path>
                                            <path d="M8,15 L11,11 L13.000781,13 L16,9" id="shape-3" stroke="#030819" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="0,0">
                                            </path>
                                        </g>
                                    </svg> @lang("common.c_overview")
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1750.176 0v1468.235h-225.882v338.824h169.412V1920H451.353c-82.447 0-161.506-36.141-215.718-99.388-42.917-50.824-66.635-116.33-66.635-182.965V282.353C169 126.494 295.494 0 451.353 0h1298.823Zm-338.823 1468.235H463.776c-89.223 0-166.023 60.989-179.576 140.047-1.13 9.036-2.259 18.07-2.259 25.977v3.388c0 40.659 13.553 79.059 40.659 109.553 31.624 38.4 79.059 59.859 128.753 59.859h960v-112.941H408.435v-112.942h1002.918v-112.94Zm-56.47-564.706h-790.59v112.942h790.588V903.529Zm56.47-564.705h-903.53v451.764h903.53V338.824ZM620.765 677.647h677.647V451.765H620.765v225.882Z" fill-rule="evenodd"/>
                                    </svg> @lang("common.c_agenda")
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="content-in">
                                    {!! $data->overview !!}
                                </div>
                                <div class="btns-in">
                                    <a href="#" data-toggle="modal" data-target="#form"><svg width="800px" height="800px" viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" style="enable-background:new 0 0 192 192" xml:space="preserve"><path d="M104.1 65.7v88.5c6.1-6.3 18.3-17.2 37-23.4 11.5-3.8 21.6-4.6 28.9-4.5V37.8c-8 .5-18.7 2.1-30.7 6.5-16.5 6.2-28.2 15.1-35.2 21.4zm-16.2 0v88.5c-6.1-6.3-18.3-17.2-37-23.4-11.5-3.8-21.6-4.6-28.9-4.5V37.8c8 .5 18.7 2.1 30.7 6.5 16.5 6.2 28.2 15.1 35.2 21.4z" style="fill:none;stroke:#000000;stroke-width:12;stroke-linejoin:round;stroke-miterlimit:10"/></svg> @lang("common.quick_enq")</a>
                                    <a href="#" data-toggle="modal" data-target="#form2"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V11C19 11.5523 19.4477 12 20 12C20.5523 12 21 11.5523 21 11V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM10.3078 23.5628C10.4657 23.7575 10.6952 23.9172 10.9846 23.9762C11.2556 24.0316 11.4923 23.981 11.6563 23.9212C11.9581 23.8111 12.1956 23.6035 12.3505 23.4506C12.5941 23.2105 12.8491 22.8848 13.1029 22.5169C14.2122 22.1342 15.7711 21.782 17.287 21.5602C18.1297 21.4368 18.9165 21.3603 19.5789 21.3343C19.8413 21.6432 20.08 21.9094 20.2788 22.1105C20.4032 22.2363 20.5415 22.3671 20.6768 22.4671C20.7378 22.5122 20.8519 22.592 20.999 22.6493C21.0755 22.6791 21.5781 22.871 22.0424 22.4969C22.3156 22.2768 22.5685 22.0304 22.7444 21.7525C22.9212 21.4733 23.0879 21.0471 22.9491 20.5625C22.8131 20.0881 22.4588 19.8221 22.198 19.6848C21.9319 19.5448 21.6329 19.4668 21.3586 19.4187C21.11 19.3751 20.8288 19.3478 20.5233 19.3344C19.9042 18.5615 19.1805 17.6002 18.493 16.6198C17.89 15.76 17.3278 14.904 16.891 14.1587C16.9359 13.9664 16.9734 13.7816 17.0025 13.606C17.0523 13.3052 17.0824 13.004 17.0758 12.7211C17.0695 12.4497 17.0284 12.1229 16.88 11.8177C16.7154 11.4795 16.416 11.1716 15.9682 11.051C15.5664 10.9428 15.1833 11.0239 14.8894 11.1326C14.4359 11.3004 14.1873 11.6726 14.1014 12.0361C14.0288 12.3437 14.0681 12.6407 14.1136 12.8529C14.2076 13.2915 14.4269 13.7956 14.6795 14.2893C14.702 14.3332 14.7251 14.3777 14.7487 14.4225C14.5103 15.2072 14.1578 16.1328 13.7392 17.0899C13.1256 18.4929 12.4055 19.8836 11.7853 20.878C11.3619 21.0554 10.9712 21.2584 10.6746 21.4916C10.4726 21.6505 10.2019 21.909 10.0724 22.2868C9.9132 22.7514 10.0261 23.2154 10.3078 23.5628ZM11.8757 23.0947C11.8755 23.0946 11.8775 23.0923 11.8824 23.0877C11.8783 23.0924 11.8759 23.0947 11.8757 23.0947ZM16.9974 19.5812C16.1835 19.7003 15.3445 19.8566 14.5498 20.0392C14.9041 19.3523 15.2529 18.6201 15.5716 17.8914C15.7526 17.4775 15.9269 17.0581 16.0885 16.6431C16.336 17.0175 16.5942 17.3956 16.8555 17.7681C17.2581 18.3421 17.6734 18.911 18.0759 19.4437C17.7186 19.4822 17.3567 19.5287 16.9974 19.5812ZM16.0609 12.3842C16.0608 12.3829 16.0607 12.3823 16.0606 12.3823C16.0606 12.3822 16.0607 12.3838 16.061 12.3872C16.061 12.386 16.0609 12.385 16.0609 12.3842Z" fill="#000000"/>
                                        </svg> @lang("common.download_outline")</a>
                                    <a href="#" class="scroll-up"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 11C15 12.6569 13.6569 14 12 14C10.3431 14 9 12.6569 9 11M4 7H20M4 7V13C4 19.3668 5.12797 20.5 12 20.5C18.872 20.5 20 19.3668 20 13V7M4 7L5.44721 4.10557C5.786 3.428 6.47852 3 7.23607 3H16.7639C17.5215 3 18.214 3.428 18.5528 4.10557L20 7" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg> @lang("common.register")</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="content-in">
                                    {!! $data->outline !!}
                                </div>
                                <div class="btns-in">
                                    <a href="#" data-toggle="modal" data-target="#form"><svg width="800px" height="800px" viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" style="enable-background:new 0 0 192 192" xml:space="preserve"><path d="M104.1 65.7v88.5c6.1-6.3 18.3-17.2 37-23.4 11.5-3.8 21.6-4.6 28.9-4.5V37.8c-8 .5-18.7 2.1-30.7 6.5-16.5 6.2-28.2 15.1-35.2 21.4zm-16.2 0v88.5c-6.1-6.3-18.3-17.2-37-23.4-11.5-3.8-21.6-4.6-28.9-4.5V37.8c8 .5 18.7 2.1 30.7 6.5 16.5 6.2 28.2 15.1 35.2 21.4z" style="fill:none;stroke:#000000;stroke-width:12;stroke-linejoin:round;stroke-miterlimit:10"/></svg> @lang("common.quick_enq")</a>
                                    <a href="#"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V11C19 11.5523 19.4477 12 20 12C20.5523 12 21 11.5523 21 11V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM10.3078 23.5628C10.4657 23.7575 10.6952 23.9172 10.9846 23.9762C11.2556 24.0316 11.4923 23.981 11.6563 23.9212C11.9581 23.8111 12.1956 23.6035 12.3505 23.4506C12.5941 23.2105 12.8491 22.8848 13.1029 22.5169C14.2122 22.1342 15.7711 21.782 17.287 21.5602C18.1297 21.4368 18.9165 21.3603 19.5789 21.3343C19.8413 21.6432 20.08 21.9094 20.2788 22.1105C20.4032 22.2363 20.5415 22.3671 20.6768 22.4671C20.7378 22.5122 20.8519 22.592 20.999 22.6493C21.0755 22.6791 21.5781 22.871 22.0424 22.4969C22.3156 22.2768 22.5685 22.0304 22.7444 21.7525C22.9212 21.4733 23.0879 21.0471 22.9491 20.5625C22.8131 20.0881 22.4588 19.8221 22.198 19.6848C21.9319 19.5448 21.6329 19.4668 21.3586 19.4187C21.11 19.3751 20.8288 19.3478 20.5233 19.3344C19.9042 18.5615 19.1805 17.6002 18.493 16.6198C17.89 15.76 17.3278 14.904 16.891 14.1587C16.9359 13.9664 16.9734 13.7816 17.0025 13.606C17.0523 13.3052 17.0824 13.004 17.0758 12.7211C17.0695 12.4497 17.0284 12.1229 16.88 11.8177C16.7154 11.4795 16.416 11.1716 15.9682 11.051C15.5664 10.9428 15.1833 11.0239 14.8894 11.1326C14.4359 11.3004 14.1873 11.6726 14.1014 12.0361C14.0288 12.3437 14.0681 12.6407 14.1136 12.8529C14.2076 13.2915 14.4269 13.7956 14.6795 14.2893C14.702 14.3332 14.7251 14.3777 14.7487 14.4225C14.5103 15.2072 14.1578 16.1328 13.7392 17.0899C13.1256 18.4929 12.4055 19.8836 11.7853 20.878C11.3619 21.0554 10.9712 21.2584 10.6746 21.4916C10.4726 21.6505 10.2019 21.909 10.0724 22.2868C9.9132 22.7514 10.0261 23.2154 10.3078 23.5628ZM11.8757 23.0947C11.8755 23.0946 11.8775 23.0923 11.8824 23.0877C11.8783 23.0924 11.8759 23.0947 11.8757 23.0947ZM16.9974 19.5812C16.1835 19.7003 15.3445 19.8566 14.5498 20.0392C14.9041 19.3523 15.2529 18.6201 15.5716 17.8914C15.7526 17.4775 15.9269 17.0581 16.0885 16.6431C16.336 17.0175 16.5942 17.3956 16.8555 17.7681C17.2581 18.3421 17.6734 18.911 18.0759 19.4437C17.7186 19.4822 17.3567 19.5287 16.9974 19.5812ZM16.0609 12.3842C16.0608 12.3829 16.0607 12.3823 16.0606 12.3823C16.0606 12.3822 16.0607 12.3838 16.061 12.3872C16.061 12.386 16.0609 12.385 16.0609 12.3842Z" fill="#000000"/>
                                        </svg> @lang("common.download_outline")</a>
                                    <a href="#" class="scroll-up"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 11C15 12.6569 13.6569 14 12 14C10.3431 14 9 12.6569 9 11M4 7H20M4 7V13C4 19.3668 5.12797 20.5 12 20.5C18.872 20.5 20 19.3668 20 13V7M4 7L5.44721 4.10557C5.786 3.428 6.47852 3 7.23607 3H16.7639C17.5215 3 18.214 3.428 18.5528 4.10557L20 7" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg> @lang("common.register")</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <section class="section authors">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="section-title">--}}
{{--                        <h1>@lang("common.speakers_title")</h1>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @foreach($data->lecturers as $l)--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="authors-item" data-toggle="modal" data-target="#my-modal" data-company="{{$l->company_name}}" data-title="{{$l->name}}" data-position="{{$l->job}}" data-img="{{$l->imageLink}}" data-text="{{$l->bio}}" data-small="{{$l->job}}">--}}
{{--                        <div class="authors-item__img">--}}
{{--                            <div class="badge-icon"><img src="{{Storage::url($l->logo)}}" alt=""></div>--}}
{{--                            <figure><img src="{{$l->imageLink}}" alt="" /></figure>--}}
{{--                        </div>--}}
{{--                        <div class="authors-item__title">--}}
{{--                            <h3>{{$l->name}}</h3>--}}
{{--                            <strong class="mb-2">{{$l->job}}</strong>--}}
{{--                            <strong  class="mb-2 color-red">{{$l->company_name}}</strong>--}}

{{--                            <h4><a href="mailto:{{$l->email}}">{{$l->email}}</a></h4>--}}
{{--                            @if($c = data_get($l->contacts, 'mobile'))--}}
{{--                            <h4><a href="tel:{{$c}}">{{$c}}</a></h4>--}}
{{--                            @endif--}}
{{--                            @if($c = data_get($l->contacts, 'whatsapp'))--}}
{{--                            <h5 class="whatsapp"><a href="whatsapp:{{$c}}"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M17.6 6.31999C16.8669 5.58141 15.9943 4.99596 15.033 4.59767C14.0716 4.19938 13.0406 3.99622 12 3.99999C10.6089 4.00135 9.24248 4.36819 8.03771 5.06377C6.83294 5.75935 5.83208 6.75926 5.13534 7.96335C4.4386 9.16745 4.07046 10.5335 4.06776 11.9246C4.06507 13.3158 4.42793 14.6832 5.12 15.89L4 20L8.2 18.9C9.35975 19.5452 10.6629 19.8891 11.99 19.9C14.0997 19.9001 16.124 19.0668 17.6222 17.5816C19.1205 16.0965 19.9715 14.0796 19.99 11.97C19.983 10.9173 19.7682 9.87634 19.3581 8.9068C18.948 7.93725 18.3505 7.05819 17.6 6.31999ZM12 18.53C10.8177 18.5308 9.65701 18.213 8.64 17.61L8.4 17.46L5.91 18.12L6.57 15.69L6.41 15.44C5.55925 14.0667 5.24174 12.429 5.51762 10.8372C5.7935 9.24545 6.64361 7.81015 7.9069 6.80322C9.1702 5.79628 10.7589 5.28765 12.3721 5.37368C13.9853 5.4597 15.511 6.13441 16.66 7.26999C17.916 8.49818 18.635 10.1735 18.66 11.93C18.6442 13.6859 17.9355 15.3645 16.6882 16.6006C15.441 17.8366 13.756 18.5301 12 18.53ZM15.61 13.59C15.41 13.49 14.44 13.01 14.26 12.95C14.08 12.89 13.94 12.85 13.81 13.05C13.6144 13.3181 13.404 13.5751 13.18 13.82C13.07 13.96 12.95 13.97 12.75 13.82C11.6097 13.3694 10.6597 12.5394 10.06 11.47C9.85 11.12 10.26 11.14 10.64 10.39C10.6681 10.3359 10.6827 10.2759 10.6827 10.215C10.6827 10.1541 10.6681 10.0941 10.64 10.04C10.64 9.93999 10.19 8.95999 10.03 8.56999C9.87 8.17999 9.71 8.23999 9.58 8.22999H9.19C9.08895 8.23154 8.9894 8.25465 8.898 8.29776C8.8066 8.34087 8.72546 8.403 8.66 8.47999C8.43562 8.69817 8.26061 8.96191 8.14676 9.25343C8.03291 9.54495 7.98287 9.85749 8 10.17C8.0627 10.9181 8.34443 11.6311 8.81 12.22C9.6622 13.4958 10.8301 14.5293 12.2 15.22C12.9185 15.6394 13.7535 15.8148 14.58 15.72C14.8552 15.6654 15.1159 15.5535 15.345 15.3915C15.5742 15.2296 15.7667 15.0212 15.91 14.78C16.0428 14.4856 16.0846 14.1583 16.03 13.84C15.94 13.74 15.81 13.69 15.61 13.59Z" fill="#000000"/>--}}
{{--                                    </svg>--}}
{{--                                    Whatsapp</a></h5>--}}
{{--                            @endif--}}
{{--                            <ul class="mt-0">--}}
{{--                                @if($c = data_get($l->contacts, 'fb'))--}}
{{--                                <li><a href="{{$c}}" target="_blank"><i class="icofont-facebook"></i></a></li>--}}
{{--                                @endif--}}
{{--                                @if($c = data_get($l->contacts, 'twitter'))--}}
{{--                                <li><a href="{{$c}}" target="_blank"><i class="icofont-twitter"></i></a></li>--}}
{{--                                @endif--}}
{{--                                @if($c = data_get($l->contacts, 'linkedin'))--}}
{{--                                <li><a href="{{$c}}" target="_blank"><i class="icofont-linkedin"></i></a></li>--}}
{{--                                @endif--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    @foreach($data->components as $c)
        <x-shuttle-dynamic-component :loader="$c->pivot" :name="$c->name" :c="$c" :data="$c->pivot->setting"></x-shuttle-dynamic-component>
    @endforeach

{{--    <div class="modal smallmodal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}

{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}

{{--                    <div class="top">--}}
{{--                        <div class="top-title">--}}
{{--                            <div class="top-title__title">--}}
{{--                                <h1 class="modal-title" id="exampleModalLabel"></h1>--}}
{{--                                <div id="small"></div>--}}
{{--                                <div id="title"></div>--}}
{{--                            </div>--}}
{{--                            <!-- /.top-title__title -->--}}
{{--                            <div class="imgs">--}}
{{--                                <figure>--}}
{{--                                    <img src="" alt="" id="img">--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                            <!-- /.imgs -->--}}
{{--                        </div>--}}
{{--                        <!-- /.top-title -->--}}
{{--                    </div>--}}
{{--                    <!-- /.top -->--}}


{{--                    <div id="text"></div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="modal  fade" id="register_c" tabindex="-1" role="dialog" aria-labelledby="register_c" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" class="modal-content" id="festival-form">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Reserve Your Place</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <i class="icofont-close"></i>
                    </button>
                </div>
                <div class="modal-body modal-body__form">
                    <div class="row" >
                        @csrf
                        <div class="col-md-12">
                            <div class="loginform-form">
                                <input name="name"  class="f-input" type="text" placeholder="@lang('common.full_name')"  data-validation="required">
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="loginform-form">
                                <input name="company"  class="f-input" type="text" placeholder="@lang('common.company_name')"  data-validation="required">
                            </div>
                        </div>
                        <!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="loginform-form">
                                <input name="job"  class="f-input" type="text" placeholder="@lang('common.jobs_title')"  data-validation="required">
                            </div>
                        </div>
                        <!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="loginform-form">
                                <input name="email"  class="f-input" type="email" placeholder="@lang('common.mail')"  data-validation="required">
                            </div>
                        </div>
                        <!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="loginform-form">
                                <input name="mobile"  class="f-input" type="number" placeholder="@lang('common.number')"  data-validation="required">
                            </div>
                        </div>
                        <!-- /.col-md-6 -->

                        <div class="col-md-12">
                            <div class="loginform-form">
                                <input name="address1"  class="f-input" type="text" placeholder="@lang('common.street_line1')"  data-validation="required">
                            </div>
                        </div>
                        <!-- /.col-md-6 -->

                        <div class="col-md-12">
                            <div class="loginform-form">
                                <input name="address2"  class="f-input" type="text" placeholder="@lang('common.street_line2')" >
                            </div>
                        </div>
                        <!-- /.col-md-6 -->


                        <div class="col-md-6">
                            <div class="loginform-form">
                                <input name="city"  class="f-input" type="text" placeholder="@lang('common.city')"  data-validation="required">
                            </div>
                        </div>
                        <!-- /.col-md-6 -->


                        <div class="col-md-6">
                            <div class="loginform-form">
                                <input name="zip_code"  class="f-input" type="text" placeholder="@lang('common.zip_code')"  data-validation="required">
                            </div>
                        </div>
                        <!-- /.col-md-6 -->

                        <div class="col-md-12">
                            <div class="loginform-form">
                                <select name=country"" id="" class="select">
                                    <option value="">@lang("common.country")</option>
                                    <option value="225" selected >United Kingdom</option>
                                    <option value="1" >AFGHANISTAN</option>
                                    <option value="2" >ALBANIA</option>
                                    <option value="3" >ALGERIA</option>
                                    <option value="4">AMERICAN SAMOA</option>
                                    <option value="5" >ANDORRA</option>
                                    <option value="6" >ANGOLA</option>
                                    <option value="7" >ANGUILLA</option>
                                    <option value="8" >ANTARCTICA</option>
                                    <option value="9" >ANTIGUA AND BARBUDA</option>
                                    <option value="10" >ARGENTINA</option>
                                    <option value="11" >ARMENIA</option>
                                    <option value="12" >ARUBA</option>
                                    <option value="13" >AUSTRALIA</option>
                                    <option value="14" >AUSTRIA</option>
                                    <option value="15" >AZERBAIJAN</option>
                                    <option value="16" >BAHAMAS</option>
                                    <option value="17" >BAHRAIN</option>
                                    <option value="18" >BANGLADESH</option>
                                    <option value="19" >BARBADOS</option>
                                    <option value="20" >BELARUS</option>
                                    <option value="21" >BELGIUM</option>
                                    <option value="22" >BELIZE</option>
                                    <option value="23" >BENIN</option>
                                    <option value="24" >BERMUDA</option>
                                    <option value="25" >BHUTAN</option>
                                    <option value="26" >BOLIVIA</option>
                                    <option value="27" >BOSNIA AND HERZEGOVINA</option>
                                    <option value="28" >BOTSWANA</option>
                                    <option value="29" >BOUVET ISLAND</option>
                                    <option value="30" >BRAZIL</option>
                                    <option value="31" >BRITISH INDIAN OCEAN TERRITORY</option>
                                    <option value="32" >BRUNEI DARUSSALAM</option>
                                    <option value="33" >BULGARIA</option>
                                    <option value="34" >BURKINA FASO</option>
                                    <option value="35" >BURUNDI</option>
                                    <option value="36" >CAMBODIA</option>
                                    <option value="37" >CAMEROON</option>
                                    <option value="38" >CANADA</option>
                                    <option value="39" >CAPE VERDE</option>
                                    <option value="40" >CAYMAN ISLANDS</option>
                                    <option value="41" >CENTRAL AFRICAN REPUBLIC</option>
                                    <option value="42" >CHAD</option>
                                    <option value="43" >CHILE</option>
                                    <option value="44" >CHINA</option>
                                    <option value="45" >CHRISTMAS ISLAND</option>
                                    <option value="46" >COCOS (KEELING) ISLANDS</option>
                                    <option value="47" >COLOMBIA</option>
                                    <option value="48" >COMOROS</option>
                                    <option value="49" >CONGO</option>
                                    <option value="50" >CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
                                    <option value="51" >COOK ISLANDS</option>
                                    <option value="52" >COSTA RICA</option>
                                    <option value="53" >COTE D'IVOIRE</option>
                                    <option value="54" >CROATIA</option>
                                    <option value="55" >CUBA</option>
                                    <option value="56" >CYPRUS</option>
                                    <option value="57" >CZECH REPUBLIC</option>
                                    <option value="58" >DENMARK</option>
                                    <option value="59" >DJIBOUTI</option>
                                    <option value="60" >DOMINICA</option>
                                    <option value="61" >DOMINICAN REPUBLIC</option>
                                    <option value="62" >ECUADOR</option>
                                    <option value="63" >EGYPT</option>
                                    <option value="64" >EL SALVADOR</option>
                                    <option value="65" >EQUATORIAL GUINEA</option>
                                    <option value="66" >ERITREA</option>
                                    <option value="67" >ESTONIA</option>
                                    <option value="68" >ETHIOPIA</option>
                                    <option value="69" >FALKLAND ISLANDS (MALVINAS)</option>
                                    <option value="70" >FAROE ISLANDS</option>
                                    <option value="71" >FIJI</option>
                                    <option value="72" >FINLAND</option>
                                    <option value="73" >FRANCE</option>
                                    <option value="74" >FRENCH GUIANA</option>
                                    <option value="75" >FRENCH POLYNESIA</option>
                                    <option value="76" >FRENCH SOUTHERN TERRITORIES</option>
                                    <option value="77" >GABON</option>
                                    <option value="78" >GAMBIA</option>
                                    <option value="79" >GEORGIA</option>
                                    <option value="80" >GERMANY</option>
                                    <option value="81" >GHANA</option>
                                    <option value="82" >GIBRALTAR</option>
                                    <option value="83" >GREECE</option>
                                    <option value="84" >GREENLAND</option>
                                    <option value="85" >GRENADA</option>
                                    <option value="86" >GUADELOUPE</option>
                                    <option value="87" >GUAM</option>
                                    <option value="88" >GUATEMALA</option>
                                    <option value="89" >GUINEA</option>
                                    <option value="90" >GUINEA-BISSAU</option>
                                    <option value="91" >GUYANA</option>
                                    <option value="92" >HAITI</option>
                                    <option value="93" >HEARD ISLAND AND MCDONALD ISLANDS</option>
                                    <option value="94" >HOLY SEE (VATICAN CITY STATE)</option>
                                    <option value="95" >HONDURAS</option>
                                    <option value="96" >HONG KONG</option>
                                    <option value="97" >HUNGARY</option>
                                    <option value="98" >ICELAND</option>
                                    <option value="99" >INDIA</option>
                                    <option value="100" >INDONESIA</option>
                                    <option value="101" >IRAN, ISLAMIC REPUBLIC OF</option>
                                    <option value="102" >IRAQ</option>
                                    <option value="103" >IRELAND</option>
                                    <option value="104" >ISRAEL</option>
                                    <option value="105" >ITALY</option>
                                    <option value="106" >JAMAICA</option>
                                    <option value="107" >JAPAN</option>
                                    <option value="108" >JORDAN</option>
                                    <option value="109" >KAZAKHSTAN</option>
                                    <option value="110" >KENYA</option>
                                    <option value="111" >KIRIBATI</option>
                                    <option value="112" >KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF</option>
                                    <option value="113" >KOREA, REPUBLIC OF</option>
                                    <option value="114" >KUWAIT</option>
                                    <option value="115" >KYRGYZSTAN</option>
                                    <option value="116" >LAO PEOPLE'S DEMOCRATIC REPUBLIC</option>
                                    <option value="117" >LATVIA</option>
                                    <option value="118" >LEBANON</option>
                                    <option value="119" >LESOTHO</option>
                                    <option value="120" >LIBERIA</option>
                                    <option value="121" >LIBYAN ARAB JAMAHIRIYA</option>
                                    <option value="122" >LIECHTENSTEIN</option>
                                    <option value="123" >LITHUANIA</option>
                                    <option value="124" >LUXEMBOURG</option>
                                    <option value="125" >MACAO</option>
                                    <option value="126" >MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option>
                                    <option value="127" >MADAGASCAR</option>
                                    <option value="128" >MALAWI</option>
                                    <option value="129" >MALAYSIA</option>
                                    <option value="130" >MALDIVES</option>
                                    <option value="131" >MALI</option>
                                    <option value="132" >MALTA</option>
                                    <option value="133" >MARSHALL ISLANDS</option>
                                    <option value="134" >MARTINIQUE</option>
                                    <option value="135" >MAURITANIA</option>
                                    <option value="136" >MAURITIUS</option>
                                    <option value="137" >MAYOTTE</option>
                                    <option value="138" >MEXICO</option>
                                    <option value="139" >MICRONESIA, FEDERATED STATES OF</option>
                                    <option value="140" >MOLDOVA, REPUBLIC OF</option>
                                    <option value="141" >MONACO</option>
                                    <option value="142" >MONGOLIA</option>
                                    <option value="143" >MONTSERRAT</option>
                                    <option value="144" >MOROCCO</option>
                                    <option value="145" >MOZAMBIQUE</option>
                                    <option value="146" >MYANMAR</option>
                                    <option value="147" >NAMIBIA</option>
                                    <option value="148" >NAURU</option>
                                    <option value="149" >NEPAL</option>
                                    <option value="150" >NETHERLANDS</option>
                                    <option value="151" >NETHERLANDS ANTILLES</option>
                                    <option value="152" >NEW CALEDONIA</option>
                                    <option value="153" >NEW ZEALAND</option>
                                    <option value="154" >NICARAGUA</option>
                                    <option value="155" >NIGER</option>
                                    <option value="156" >NIGERIA</option>
                                    <option value="157" >NIUE</option>
                                    <option value="158" >NORFOLK ISLAND</option>
                                    <option value="159" >NORTHERN MARIANA ISLANDS</option>
                                    <option value="160" >NORWAY</option>
                                    <option value="161" >OMAN</option>
                                    <option value="162" >PAKISTAN</option>
                                    <option value="163" >PALAU</option>
                                    <option value="164" >PALESTINIAN TERRITORY, OCCUPIED</option>
                                    <option value="165" >PANAMA</option>
                                    <option value="166" >PAPUA NEW GUINEA</option>
                                    <option value="167" >PARAGUAY</option>
                                    <option value="168" >PERU</option>
                                    <option value="169" >PHILIPPINES</option>
                                    <option value="170" >PITCAIRN</option>
                                    <option value="171" >POLAND</option>
                                    <option value="172" >PORTUGAL</option>
                                    <option value="173" >PUERTO RICO</option>
                                    <option value="174" >QATAR</option>
                                    <option value="175" >REUNION</option>
                                    <option value="176" >ROMANIA</option>
                                    <option value="177" >RUSSIAN FEDERATION</option>
                                    <option value="178" >RWANDA</option>
                                    <option value="179" >SAINT HELENA</option>
                                    <option value="180" >SAINT KITTS AND NEVIS</option>
                                    <option value="181" >SAINT LUCIA</option>
                                    <option value="182" >SAINT PIERRE AND MIQUELON</option>
                                    <option value="183" >SAINT VINCENT AND THE GRENADINES</option>
                                    <option value="184" >SAMOA</option>
                                    <option value="185" >SAN MARINO</option>
                                    <option value="186" >SAO TOME AND PRINCIPE</option>
                                    <option value="187" >SAUDI ARABIA</option>
                                    <option value="188" >SENEGAL</option>
                                    <option value="189" >SERBIA AND MONTENEGRO</option>
                                    <option value="190" >SEYCHELLES</option>
                                    <option value="191" >SIERRA LEONE</option>
                                    <option value="192" >SINGAPORE</option>
                                    <option value="193" >SLOVAKIA</option>
                                    <option value="194" >SLOVENIA</option>
                                    <option value="195" >SOLOMON ISLANDS</option>
                                    <option value="196" >SOMALIA</option>
                                    <option value="197" >SOUTH AFRICA</option>
                                    <option value="198" >SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
                                    <option value="199" >SPAIN</option>
                                    <option value="200" >SRI LANKA</option>
                                    <option value="201" >SUDAN</option>
                                    <option value="202" >SURINAME</option>
                                    <option value="203" >SVALBARD AND JAN MAYEN</option>
                                    <option value="204" >SWAZILAND</option>
                                    <option value="205" >SWEDEN</option>
                                    <option value="206" >SWITZERLAND</option>
                                    <option value="207" >SYRIAN ARAB REPUBLIC</option>
                                    <option value="208" >TAIWAN, PROVINCE OF CHINA</option>
                                    <option value="209" >TAJIKISTAN</option>
                                    <option value="210" >TANZANIA, UNITED REPUBLIC OF</option>
                                    <option value="211" >THAILAND</option>
                                    <option value="212" >TIMOR-LESTE</option>
                                    <option value="213" >TOGO</option>
                                    <option value="214" >TOKELAU</option>
                                    <option value="215" >TONGA</option>
                                    <option value="216" >TRINIDAD AND TOBAGO</option>
                                    <option value="217" >TUNISIA</option>
                                    <option value="218" >TURKEY</option>
                                    <option value="219" >TURKMENISTAN</option>
                                    <option value="220" >TURKS AND CAICOS ISLANDS</option>
                                    <option value="221" >TUVALU</option>
                                    <option value="222" >UGANDA</option>
                                    <option value="223" >UKRAINE</option>
                                    <option value="224" >UNITED ARAB EMIRATES</option>
                                    <option value="225" >UNITED KINGDOM</option>
                                    <option value="226" >UNITED STATES</option>
                                    <option value="227" >UNITED STATES MINOR OUTLYING ISLANDS</option>
                                    <option value="228" >URUGUAY</option>
                                    <option value="229" >UZBEKISTAN</option>
                                    <option value="230" >VANUATU</option>
                                    <option value="231" >VENEZUELA</option>
                                    <option value="232" >VIET NAM</option>
                                    <option value="233" >VIRGIN ISLANDS, BRITISH</option>
                                    <option value="234" >VIRGIN ISLANDS, U.S.</option>
                                    <option value="235" >WALLIS AND FUTUNA</option>
                                    <option value="236" >WESTERN SAHARA</option>
                                    <option value="237" >YEMEN</option>
                                    <option value="238" >ZAMBIA</option>
                                    <option value="239" >ZIMBABWE</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="loginform-form">
                                <input name="name"  class="f-input" type="text" placeholder="@lang('common.promo_code')" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="loginform-form">
                                <input name="name"  class="f-input" type="text" placeholder="@lang('common.how_u_know')" >
                            </div>
                        </div>
                        <div>
                        <div class="col-md-12 text-center my-4">
                            <p class="mb-0">
                                <strong>Price: </strong>
                                @if($package->location_id == 1)
                                    £{{ number_format($package->price * 1.2, 2) }}
                                    <small class="text-muted">(Includes 20% VAT )</small>
                                @else
                                    £{{ number_format($package->price, 2) }}
                                @endif
                            </p>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="choose">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="choose-title">
                                            <h3>@lang("common.payment_method")</h3>
                                        </div>
                                        <!-- /.choose-title -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input" id="pm1"
                                                name="pm" value="invoice">
                                            <label class="custom-control-label" for="pm1">@lang('common.by_invoice')</label>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input" id="pm2"
                                                name="pm" value="card" checked>
                                            <label class="custom-control-label" for="pm2">@lang('common.by_card')</label>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <div id="form-errors" role="alert" style="color: #dc3545; margin-top: 10px;">
                        </div>
                        <div class="col-12" id="card-section">
                            <div class="row">
                                <div class="col-md-12 mb-3  d-flex justify-content-between align-items-center">
                                    <h2 class="mb-0"
                                        style="font-weight: 500;font-size: 24px;line-height: 130%;font-family: p_bold">
                                        Payment Details</h2>
                                    <img src="https://www.longislandmarinatn.com/wp-content/uploads/2017/08/Major-Credit-Card-Logo-PNG-Image.png"
                                        alt="Card Icons" style="height: 40px;">
                                </div>
                                <div class="col-md-12">
                                    <small class="text-muted">Enter your card details below. Your payment is secure and
                                        encrypted.</small>
                                    <div class="mt-3 loginform-form"
                                        style="padding: 12px 20px;border-radius: 5px;border: 2px solid #f2f2f2;"
                                        id="card-element">
                                        <!-- Stripe will inject card elements here -->
                                    </div>
                                    <div id="card-errors" role="alert" style="color: #dc3545; margin-top: 10px;"></div>
                                </div>
                            </div>
                        </div>


            </form>
            <!-- /.row -->
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">@lang('common.register')</button>
        </div>
    </div>
    </div>
    </div>



    <!-- For Modal -->
    <div class="modal largemodal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="form"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="title-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1284.000000pt" height="1058.000000pt"
                            viewBox="0 0 1284.000000 1058.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,1058.000000) scale(0.100000,-0.100000)" fill="#000000"
                                stroke="none">
                                <path
                                    d="M5409 8514 c-80 -71 -174 -154 -210 -185 -35 -31 -224 -197 -419
                                                                                                                   -369 -195 -172 -440 -388 -544 -479 -104 -91 -196 -173 -205 -181 -9 -8 -144
                                                                                                                   -127 -301 -265 -157 -137 -328 -287 -380 -334 -52 -46 -108 -96 -125 -110 -16
                                                                                                                   -15 -187 -165 -380 -335 -192 -170 -399 -352 -460 -404 -226 -197 -277 -265
                                                                                                                   -311 -419 -20 -92 -14 -189 17 -281 l21 -63 27 24 c14 13 37 34 51 46 82 74
                                                                                                                   203 140 327 177 78 24 105 27 238 28 223 1 268 -15 570 -198 502 -304 578
                                                                                                                   -348 621 -363 62 -21 164 -13 224 17 25 13 122 90 215 173 94 82 313 275 487
                                                                                                                   428 174 153 345 311 379 351 115 134 199 284 253 458 41 128 72 368 47 358 -4
                                                                                                                   -1 -39 -31 -77 -64 -38 -34 -172 -153 -299 -264 -126 -111 -355 -313 -508
                                                                                                                   -449 -154 -135 -300 -259 -327 -274 -103 -60 -225 -43 -312 44 -29 29 -48 56
                                                                                                                   -46 67 3 14 224 215 503 455 33 29 85 75 115 102 30 28 89 80 130 115 41 36
                                                                                                                   77 67 80 70 3 3 41 37 85 76 44 39 127 112 185 163 58 51 131 123 164 160 166
                                                                                                                   187 278 435 306 678 21 178 54 194 -366 -176 -205 -179 -405 -356 -445 -392
                                                                                                                   -41 -36 -150 -132 -244 -214 -93 -82 -193 -169 -220 -194 -28 -25 -100 -89
                                                                                                                   -160 -141 -61 -52 -128 -111 -149 -130 -57 -51 -54 -49 -146 -130 -47 -41 -87
                                                                                                                   -77 -90 -80 -32 -32 -37 -32 -130 15 -50 25 -130 56 -177 69 l-86 22 124 110
                                                                                                                   c68 60 205 181 304 269 100 88 286 252 415 365 129 113 259 228 290 255 97 87
                                                                                                                   203 181 261 231 230 199 457 404 504 457 159 174 276 423 310 656 9 60 15 126
                                                                                                                   13 146 l-3 37 -146 -128z" />
                                <path
                                    d="M1563 8149 c13 -196 91 -423 204 -591 72 -107 148 -190 303 -326 385
                                                                                                                   -341 519 -458 624 -551 51 -44 61 -49 75 -38 9 8 57 49 106 92 197 172 211
                                                                                                                   187 186 197 -5 2 -60 48 -122 103 -62 55 -158 140 -213 189 -56 49 -117 103
                                                                                                                   -136 120 -19 17 -163 144 -320 281 -157 137 -290 254 -296 260 -73 67 -399
                                                                                                                   351 -407 354 -7 3 -8 -25 -4 -90z" />
                                <path
                                    d="M1560 7168 c0 -201 92 -467 228 -663 70 -101 117 -151 265 -282 104
                                                                                                                   -93 120 -103 135 -92 9 8 71 61 137 120 66 58 130 114 143 125 12 10 22 21 22
                                                                                                                   25 0 4 -86 82 -192 175 -204 180 -450 397 -508 448 -19 17 -73 65 -120 106
                                                                                                                   -47 41 -86 78 -88 83 -11 23 -22 0 -22 -45z" />
                                <path
                                    d="M1880 3849 l0 -480 278 3 c258 3 281 5 333 26 59 24 111 68 136 116
                                                                                                                   20 39 28 132 14 181 -15 56 -66 122 -113 146 -22 11 -36 24 -32 28 5 4 26 20
                                                                                                                   48 35 105 78 99 264 -11 355 -78 64 -115 71 -398 71 l-255 0 0 -481z m548 349
                                                                                                                   c57 -38 75 -69 76 -131 0 -67 -27 -109 -87 -132 -34 -13 -77 -15 -232 -13
                                                                                                                   l-190 3 -3 140 c-1 76 0 145 3 153 4 11 40 13 198 10 192 -3 194 -3 235 -30z
                                                                                                                   m-15 -408 c67 -25 102 -62 117 -122 11 -43 10 -52 -11 -95 -21 -41 -32 -51
                                                                                                                   -79 -70 -51 -21 -68 -22 -250 -20 l-195 2 -3 150 c-1 82 0 155 2 162 4 10 47
                                                                                                                   13 185 13 156 0 188 -3 234 -20z" />
                                <path
                                    d="M4360 4310 c-24 -24 -26 -67 -4 -98 20 -28 83 -31 107 -4 25 28 22
                                                                                                                   87 -5 106 -31 22 -74 20 -98 -4z" />
                                <path
                                    d="M7950 3850 l0 -480 360 0 360 0 0 85 0 85 -272 2 -273 3 -3 90 c-2
                                                                                                                   50 0 100 3 113 l5 22 260 0 260 0 0 80 0 80 -262 2 -263 3 0 110 0 110 270 5
                                                                                                                   270 5 3 83 3 82 -361 0 -360 0 0 -480z" />
                                <path d="M10410 3850 l0 -480 80 0 80 0 0 480 0 480 -80 0 -80 0 0 -480z" />
                                <path d="M10145 4074 l-30 -36 -54 16 c-97 29 -205 15 -295 -38 -54 -32 -86
                                                                                                                   -69 -122 -142 -24 -50 -28 -69 -28 -148 0 -115 24 -181 90 -248 56 -57 130
                                                                                                                   -87 229 -95 92 -6 126 -18 159 -52 75 -78 27 -206 -88 -232 -99 -22 -207 32
                                                                                                                   -226 113 -6 22 -11 23 -85 23 l-80 0 3 -34 c7 -94 91 -198 188 -234 27 -10 83
                                                                                                                   -21 124 -24 238 -17 403 150 360 365 -10 50 -19 64 -67 110 l-56 53 40 34 c64
                                                                                                                   55 87 113 87 220 1 64 -4 99 -15 120 -9 17 -23 43 -32 59 -15 28 -15 30 20 73
                                                                                                                   20 25 32 47 27 52 -42 37 -103 81 -110 81 -5 0 -22 -17 -39 -36z m-123 -169
                                                                                                                   c46 -19 95 -76 104 -120 11 -62 0 -141 -27 -179 -27 -41 -93 -76 -141 -76 -49
                                                                                                                   1 -112 33 -144 76 -26 34 -29 45 -29 119 0 74 3 85 28 118 53 69 135 94 209
                                                                                                                   62z" />
                                <path
                                    d="M10957 4054 c-31 -7 -71 -21 -87 -29 -198 -102 -234 -434 -63 -585
                                                                                                                   72 -63 139 -85 263 -84 83 0 116 5 159 22 60 24 121 62 121 77 0 5 -21 30 -46
                                                                                                                   56 l-46 47 -51 -27 c-43 -22 -64 -26 -132 -26 -115 0 -182 39 -201 118 l-6 27
                                                                                                                   267 0 268 0 -5 93 c-10 183 -95 285 -263 316 -74 14 -105 13 -178 -5z m208
                                                                                                                   -157 c40 -22 83 -87 70 -107 -4 -6 -73 -10 -181 -10 -194 0 -195 1 -155 66 43
                                                                                                                   71 183 98 266 51z" />
                                <path d="M3777 4044 c-70 -22 -133 -88 -142 -148 -8 -52 12 -121 43 -149 33
                                                                                                                   -30 108 -56 218 -75 162 -29 203 -56 190 -126 -12 -63 -72 -96 -177 -96 -77 0
                                                                                                                   -147 23 -195 64 -43 37 -48 36 -82 -8 l-23 -29 28 -30 c115 -120 401 -127 513
                                                                                                                   -12 29 30 34 43 38 95 6 76 -1 102 -38 144 -38 42 -86 62 -199 80 -131 21
                                                                                                                   -168 34 -190 63 -37 46 -27 92 27 125 29 18 51 22 116 22 70 1 89 -3 140 -28
                                                                                                                   l58 -29 31 31 c37 38 31 49 -52 89 -47 23 -71 27 -156 30 -69 2 -115 -2 -148
                                                                                                                   -13z" />
                                <path
                                    d="M4927 4046 c-49 -18 -116 -63 -124 -81 -11 -29 -22 -14 -25 33 l-3
                                                                                                                   47 -47 3 -48 3 0 -340 0 -341 50 0 50 0 0 191 c0 232 7 266 69 330 88 90 210
                                                                                                                   92 297 5 55 -55 64 -101 64 -336 l0 -190 50 0 c45 0 50 2 56 26 4 15 4 118 1
                                                                                                                   228 -5 171 -9 210 -27 258 -23 63 -85 127 -147 153 -54 23 -169 29 -216 11z" />
                                <path
                                    d="M5720 4051 c-92 -30 -179 -104 -211 -179 -79 -184 -14 -400 144 -477
                                                                                                                   55 -26 164 -46 213 -38 114 18 171 40 229 87 l30 25 -34 35 -34 35 -41 -28
                                                                                                                   c-149 -102 -368 -52 -416 93 -6 20 -10 41 -8 46 2 7 104 12 281 15 153 3 283
                                                                                                                   8 289 11 17 10 1 148 -22 203 -27 61 -90 123 -155 152 -38 18 -72 24 -145 26
                                                                                                                   -52 1 -106 -1 -120 -6z m218 -106 c20 -9 48 -26 61 -38 28 -26 60 -92 61 -124
                                                                                                                   l0 -23 -235 0 c-230 0 -235 0 -235 20 0 28 33 90 62 117 47 44 98 62 176 63
                                                                                                                   44 0 87 -6 110 -15z" />
                                <path
                                    d="M6438 4043 c-52 -17 -114 -70 -129 -110 -15 -40 -10 -116 10 -153 25
                                                                                                                   -49 103 -85 221 -105 169 -28 210 -51 210 -114 0 -77 -76 -117 -205 -109 -75
                                                                                                                   5 -140 31 -186 75 l-26 24 -27 -31 c-14 -17 -26 -38 -26 -45 0 -7 17 -27 38
                                                                                                                   -44 113 -94 358 -106 461 -23 62 50 76 77 76 145 0 122 -62 172 -250 202 -154
                                                                                                                   25 -205 54 -205 118 0 32 48 73 103 88 58 15 148 3 213 -29 l53 -26 26 30 c14
                                                                                                                   16 25 32 25 36 0 14 -78 59 -126 74 -62 18 -196 17 -256 -3z" />
                                <path
                                    d="M7141 4048 c-54 -15 -117 -63 -136 -104 -27 -57 -17 -145 21 -185 41
                                                                                                                   -43 97 -66 206 -84 168 -29 208 -51 208 -116 0 -77 -75 -116 -208 -106 -78 6
                                                                                                                   -137 30 -183 74 l-27 25 -26 -35 c-14 -18 -26 -39 -26 -45 0 -6 17 -24 38 -41
                                                                                                                   113 -94 358 -106 461 -23 54 44 72 74 77 133 12 122 -66 188 -253 215 -162 24
                                                                                                                   -230 74 -193 142 27 46 76 67 161 67 64 0 87 -5 138 -29 l60 -29 23 29 c13 15
                                                                                                                   23 33 23 38 0 17 -65 55 -118 71 -56 17 -193 19 -246 3z" />
                                <path
                                    d="M8983 4041 c-141 -48 -218 -169 -216 -341 2 -210 119 -337 319 -348
                                                                                                                   72 -4 89 -1 135 20 30 14 65 37 79 51 33 35 38 34 42 -10 l3 -38 78 -3 77 -3
                                                                                                                   -2 338 -3 338 -75 0 -75 0 -3 -37 c-4 -43 -11 -47 -38 -17 -10 12 -41 32 -69
                                                                                                                   45 -63 30 -174 32 -252 5z m218 -136 c84 -30 128 -98 129 -198 0 -80 -30 -141
                                                                                                                   -89 -179 -42 -27 -52 -29 -118 -26 -62 3 -76 7 -110 34 -61 50 -78 87 -78 174
                                                                                                                   0 65 4 81 28 117 50 78 147 110 238 78z" />
                                <path
                                    d="M11677 4046 c-21 -8 -56 -26 -77 -40 -105 -69 -106 -228 -3 -299 52
                                                                                                                   -35 77 -44 174 -57 113 -16 148 -28 161 -55 13 -30 -13 -82 -50 -96 -46 -18
                                                                                                                   -151 -6 -212 24 -30 14 -63 32 -73 39 -16 11 -22 9 -43 -17 -14 -16 -31 -42
                                                                                                                   -39 -56 -13 -25 -13 -29 12 -53 87 -87 286 -117 429 -65 193 72 190 333 -5
                                                                                                                   389 -20 6 -74 15 -119 21 -46 5 -97 16 -113 24 -33 17 -46 54 -30 83 26 48
                                                                                                                   158 55 245 13 l48 -24 39 44 c21 24 37 51 36 59 -1 8 -29 28 -61 45 -54 27
                                                                                                                   -69 30 -170 32 -76 2 -123 -1 -149 -11z" />
                                <path
                                    d="M2814 4036 c-3 -8 -4 -113 -2 -233 5 -243 12 -280 72 -349 48 -56
                                                                                                                   116 -87 199 -92 88 -5 147 12 208 60 27 21 51 38 53 38 3 0 6 -19 8 -42 l3
                                                                                                                   -43 48 -3 47 -3 0 341 0 341 -52 -3 -53 -3 -5 -220 c-3 -121 -9 -229 -14 -240
                                                                                                                   -65 -141 -262 -171 -359 -55 -41 48 -47 90 -47 313 l0 207 -50 0 c-35 0 -52
                                                                                                                   -5 -56 -14z" />
                                <path d="M4360 3710 l0 -340 50 0 50 0 0 340 0 340 -50 0 -50 0 0 -340z" />
                                <path
                                    d="M4585 3098 c-25 -7 -58 -30 -91 -63 -44 -44 -54 -60 -60 -101 -31
                                                                                                                   -206 204 -334 364 -200 17 15 32 32 32 37 0 15 -47 10 -61 -7 -22 -27 -71 -46
                                                                                                                   -119 -46 -158 0 -237 192 -123 299 62 59 151 66 225 17 21 -13 47 -24 60 -24
                                                                                                                   l21 0 -24 26 c-53 57 -147 83 -224 62z" />
                                <path
                                    d="M7125 3101 c-188 -48 -233 -273 -77 -385 40 -28 51 -31 122 -31 71 0
                                                                                                                   82 3 122 30 42 30 62 65 36 65 -7 0 -33 -14 -57 -30 -75 -51 -168 -42 -228 22
                                                                                                                   -99 105 -39 272 105 294 46 7 120 -15 142 -42 7 -7 24 -14 38 -14 l25 0 -24
                                                                                                                   26 c-49 53 -139 82 -204 65z" />
                                <path
                                    d="M1960 2890 l0 -213 94 5 c108 6 159 26 193 76 28 43 39 128 24 199
                                                                                                                   -22 111 -58 135 -208 141 l-103 4 0 -212z m221 149 c36 -19 54 -69 54 -151 0
                                                                                                                   -62 -4 -82 -21 -105 -33 -45 -80 -64 -154 -61 l-65 3 -3 167 -2 167 47 3 c52
                                                                                                                   3 114 -7 144 -23z" />
                                <path
                                    d="M7740 2889 c0 -164 3 -210 13 -207 9 4 13 57 15 211 2 180 0 207 -13
                                                                                                                   207 -13 0 -15 -29 -15 -211z" />
                                <path
                                    d="M8170 2890 c0 -173 2 -210 14 -210 8 0 17 7 20 15 5 14 9 14 35 0
                                                                                                                   111 -57 231 50 185 164 -28 71 -119 103 -184 66 -14 -8 -28 -14 -32 -15 -5 0
                                                                                                                   -8 43 -8 95 0 78 -3 95 -15 95 -13 0 -15 -30 -15 -210z m179 6 c68 -36 66
                                                                                                                   -134 -4 -172 -80 -43 -168 46 -127 128 27 53 78 71 131 44z" />
                                <path d="M2353 3039 c-16 -16 -5 -39 19 -39 14 0 19 6 16 22 -4 25 -19 33 -35
                                                                                                                   17z" />
                                <path
                                    d="M6470 2995 c0 -34 -5 -47 -20 -55 -11 -6 -20 -15 -20 -19 0 -5 9 -11
                                                                                                                   20 -14 18 -5 20 -14 20 -116 0 -91 3 -111 15 -111 12 0 15 22 17 113 l3 112
                                                                                                                   28 3 c15 2 27 9 27 17 0 8 -12 15 -27 17 -26 3 -28 7 -31 51 -2 33 -7 47 -18
                                                                                                                   47 -10 0 -14 -12 -14 -45z" />
                                <path
                                    d="M9040 2994 c0 -37 -4 -47 -20 -51 -11 -3 -20 -11 -20 -18 0 -7 9 -15
                                                                                                                   20 -18 18 -5 20 -14 20 -116 0 -92 3 -111 15 -111 12 0 15 19 15 115 l0 115
                                                                                                                   31 0 c38 0 35 24 -4 28 -25 3 -27 7 -27 53 0 37 -4 49 -15 49 -11 0 -15 -12
                                                                                                                   -15 -46z" />
                                <path
                                    d="M2355 2928 c-3 -8 -4 -66 -3 -129 2 -93 6 -114 18 -114 13 0 15 20
                                                                                                                   15 124 0 91 -3 125 -12 128 -7 3 -15 -2 -18 -9z" />
                                <path
                                    d="M2490 2920 c-40 -40 -14 -102 47 -116 65 -14 78 -21 81 -44 7 -48
                                                                                                                   -64 -67 -111 -30 -30 24 -51 26 -43 4 3 -9 6 -17 6 -20 0 -10 63 -34 90 -34
                                                                                                                   33 0 70 15 82 34 14 20 8 73 -9 89 -10 8 -39 21 -65 27 -26 7 -53 18 -59 26
                                                                                                                   -31 37 35 69 84 41 35 -21 47 -21 47 -3 0 44 -113 63 -150 26z" />
                                <path
                                    d="M2767 2921 c-59 -38 -76 -100 -48 -168 36 -88 186 -96 231 -14 15 30
                                                                                                                   -9 28 -56 -4 -43 -29 -66 -31 -104 -8 -67 39 -64 140 5 171 38 18 58 15 99
                                                                                                                   -13 52 -35 67 -34 46 6 -26 47 -122 64 -173 30z" />
                                <path
                                    d="M3055 2908 c-34 -31 -39 -41 -43 -91 -4 -55 -3 -58 36 -97 36 -36 44
                                                                                                                   -40 91 -40 44 0 56 5 89 34 35 33 37 38 37 95 0 55 -3 64 -32 92 -26 26 -41
                                                                                                                   33 -86 37 -51 4 -57 2 -92 -30z m134 -14 c13 -9 29 -32 37 -50 12 -29 12 -39
                                                                                                                   0 -68 -29 -68 -94 -86 -146 -38 -26 22 -31 35 -32 71 0 38 4 49 31 73 36 32
                                                                                                                   75 36 110 12z" />
                                <path
                                    d="M3310 2928 c1 -30 99 -243 113 -246 9 -2 22 7 31 20 21 33 98 229 92
                                                                                                                   235 -15 15 -36 -14 -71 -96 -21 -51 -43 -90 -48 -88 -6 2 -27 43 -47 93 -23
                                                                                                                   57 -42 90 -53 92 -9 2 -17 -2 -17 -10z" />
                                <path
                                    d="M3648 2924 c-82 -44 -78 -184 7 -230 45 -24 119 -15 153 20 23 22 24
                                                                                                                   26 8 32 -10 4 -24 0 -35 -10 -10 -9 -34 -19 -53 -22 -27 -5 -40 -1 -67 21 -55
                                                                                                                   47 -41 58 79 59 100 1 105 2 108 23 5 32 -24 81 -61 103 -38 24 -101 25 -139
                                                                                                                   4z m140 -49 c12 -14 22 -30 22 -36 0 -5 -40 -9 -90 -9 -89 0 -103 6 -82 36 34
                                                                                                                   50 110 54 150 9z" />
                                <path
                                    d="M3919 2933 c-5 -26 -6 -221 -2 -235 2 -10 11 -18 19 -18 11 0 14 18
                                                                                                                   14 84 0 92 17 128 65 140 26 7 35 36 10 36 -8 0 -26 -6 -41 -12 -22 -10 -28
                                                                                                                   -10 -32 0 -4 13 -31 17 -33 5z" />
                                <path
                                    d="M4943 2919 c-20 -12 -38 -37 -48 -64 -22 -55 -9 -101 41 -145 28 -24
                                                                                                                   43 -30 83 -30 128 0 178 158 75 239 -36 28 -108 28 -151 0z m138 -38 c23 -23
                                                                                                                   29 -38 29 -71 0 -33 -6 -48 -29 -71 -39 -38 -80 -39 -123 0 -27 24 -33 36 -33
                                                                                                                   71 0 35 6 47 33 71 43 39 84 38 123 0z" />
                                <path
                                    d="M5220 2810 c0 -109 2 -130 15 -130 8 0 15 8 16 18 5 164 5 165 33
                                                                                                                   189 47 40 108 25 121 -30 3 -12 6 -55 7 -96 2 -49 7 -76 16 -79 9 -3 12 23 12
                                                                                                                   105 0 102 -2 111 -23 131 -26 24 -93 30 -129 11 -14 -8 -23 -8 -31 0 -6 6 -17
                                                                                                                   11 -24 11 -10 0 -13 -30 -13 -130z" />
                                <path
                                    d="M5530 2810 c0 -109 2 -130 15 -130 12 0 15 15 15 74 0 93 13 131 50
                                                                                                                   146 35 14 85 5 96 -18 4 -9 10 -57 14 -106 3 -55 10 -91 17 -93 16 -6 19 26
                                                                                                                   13 130 -4 78 -8 91 -29 108 -27 22 -110 26 -129 7 -9 -9 -15 -9 -24 0 -32 32
                                                                                                                   -38 14 -38 -118z" />
                                <path
                                    d="M5873 2918 c-72 -52 -76 -147 -8 -207 48 -42 118 -44 164 -5 17 14
                                                                                                                   31 30 31 35 0 16 -31 10 -57 -11 -35 -27 -75 -25 -113 6 -53 45 -39 56 80 57
                                                                                                                   l105 2 3 32 c3 25 -4 40 -31 69 -29 32 -41 38 -88 41 -45 4 -60 0 -86 -19z
                                                                                                                   m145 -43 c12 -14 22 -30 22 -36 0 -5 -40 -9 -90 -9 -102 0 -112 10 -58 55 26
                                                                                                                   22 39 26 67 21 21 -3 45 -16 59 -31z" />
                                <path
                                    d="M6172 2906 c-35 -33 -37 -38 -37 -96 0 -58 2 -63 37 -96 32 -29 45
                                                                                                                   -34 88 -34 41 0 55 5 85 31 19 17 35 35 35 40 0 17 -32 9 -62 -16 -54 -45
                                                                                                                   -124 -22 -148 49 -19 58 17 112 82 122 27 5 40 1 65 -20 41 -34 80 -35 55 -1
                                                                                                                   -24 34 -67 55 -113 55 -42 0 -55 -5 -87 -34z" />
                                <path
                                    d="M7468 2922 c-36 -21 -58 -69 -58 -122 0 -36 6 -48 39 -81 35 -35 44
                                                                                                                   -39 90 -39 42 0 56 5 83 29 42 38 28 52 -22 23 -51 -29 -81 -28 -119 4 -56 47
                                                                                                                   -42 59 61 54 26 -1 66 1 88 5 47 8 52 30 20 82 -36 60 -124 82 -182 45z m140
                                                                                                                   -47 c12 -14 22 -30 22 -36 0 -5 -40 -9 -90 -9 -102 0 -112 10 -58 55 26 22 39
                                                                                                                   26 67 21 21 -3 45 -16 59 -31z" />
                                <path
                                    d="M7893 2918 c-39 -28 -53 -57 -53 -109 0 -78 53 -129 134 -129 36 0
                                                                                                                   52 6 78 29 42 38 28 52 -22 23 -21 -12 -50 -22 -64 -22 -44 0 -115 78 -73 81
                                                                                                                   6 0 53 2 102 4 50 1 93 3 98 4 14 2 7 46 -13 78 -38 63 -127 83 -187 41z m145
                                                                                                                   -43 c12 -14 22 -30 22 -36 0 -5 -40 -9 -90 -9 -102 0 -112 10 -58 55 26 22 39
                                                                                                                   26 67 21 21 -3 45 -16 59 -31z" />
                                <path
                                    d="M8504 2927 c-2 -7 -3 -65 -2 -128 2 -93 6 -114 18 -114 12 0 16 17
                                                                                                                   18 80 3 95 14 121 59 137 18 7 33 18 33 25 0 16 -42 17 -58 1 -10 -10 -17 -10
                                                                                                                   -32 0 -25 15 -29 15 -36 -1z" />
                                <path
                                    d="M8723 2918 c-103 -73 -53 -238 72 -238 20 0 49 7 66 15 26 14 30 14
                                                                                                                   35 0 3 -8 12 -15 20 -15 11 0 14 26 14 130 0 104 -3 130 -14 130 -8 0 -17 -7
                                                                                                                   -20 -15 -5 -14 -9 -14 -35 0 -43 22 -101 19 -138 -7z m117 -23 c36 -19 50 -43
                                                                                                                   50 -88 0 -73 -77 -118 -138 -81 -67 39 -69 127 -4 167 34 21 55 21 92 2z" />
                                <path
                                    d="M9213 2907 c-32 -30 -37 -41 -41 -90 -4 -55 -3 -58 36 -97 35 -35 45
                                                                                                                   -40 87 -40 48 0 100 23 110 48 10 26 -5 27 -45 4 -53 -30 -85 -28 -121 7 -45
                                                                                                                   46 -35 59 41 52 14 -2 53 0 88 4 61 6 62 7 62 37 0 22 -11 41 -39 69 -35 35
                                                                                                                   -44 39 -90 39 -44 0 -56 -5 -88 -33z m146 -23 c53 -44 43 -54 -59 -54 -71 0
                                                                                                                   -90 3 -90 14 0 23 59 66 90 66 16 0 42 -11 59 -26z" />
                                <path
                                    d="M4188 2815 c-16 -35 -1 -59 40 -63 27 -3 32 1 38 24 9 35 -6 58 -39
                                                                                                                   62 -21 3 -30 -3 -39 -23z" />
                                <path d="M6725 2824 c-34 -35 -1 -83 48 -70 21 5 27 12 27 34 0 49 -42 69 -75
                                                                                                                   36z" />
                            </g>
                        </svg>
                        <h2 class="modal-title" id="exampleModalLabel">@lang('common.enq_title')</h2>

                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icofont-close"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form">
                        <form action="/" class="valid-form row" method="post">
                            <div class="col-md-6">
                                <div class="loginform-form">
                                    <input name="email" id="email" class="f-input" type="email"
                                        placeholder="common.first_name" value="" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="loginform-form">
                                    <input name="password" id="password" class="f-input" type="text"
                                        placeholder="common.last_name" data-validation="required">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="loginform-form">
                                    <input name="password" id="password" class="f-input" type="mail"
                                        placeholder="common.email" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="loginform-form">
                                    <input name="password" id="password" class="f-input" type="password"
                                        placeholder="common.password" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="loginform-form">
                                    <input type="tel" id="mobile-number" placeholder="common.mobile_number"
                                        data-validation="required">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="loginform-form">
                                    <input name="password" id="password" class="f-input" type="text"
                                        placeholder="common.jobs_name" data-validation="required">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="loginform-form">
                                    <input name="password" id="password" class="f-input" type="text"
                                        placeholder="common.company_name" data-validation="required">
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="loginform-form">
                                    <select name="" id="" class="select">
                                        <option value="">I Would Like More Info On</option>
                                        <option value="Course Outlines">Course Outlines</option>
                                        <option value="Venue and Date Options">Venue and Date Options</option>
                                        <option value="Corporate Discounts">Corporate Discounts</option>
                                        <option value="Registration Options">Registration Options</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="loginform-form">
                                    <select name="" id="" class="select">
                                        <option value="">How Did You Hear About Us?</option>
                                        <option value="Google">Google</option>
                                        <option value="Email">Email</option>
                                        <option value="Referral">Referral</option>
                                        <option value="Facebook / Linkedin / Twitter">Facebook / Linkedin / Twitter
                                        </option>
                                        <option value="Findcourses">Findcourses</option>
                                        <option value="Laimoon">Laimoon</option>
                                        <option value="Edarabia">Edarabia</option>
                                        <option value="Emagister">Emagister</option>
                                        <option value="Bayt">Bayt</option>
                                        <option value="Reed">Reed</option>
                                        <option value="Existing Customer">Existing Customer</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="ft">By submitting this form you agree to our <a href="#">Terms and
                                        Conditions</a> and <a href="#">Privacy Policy.</a></div>

                            </div>

                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($data->form)
        <div class="modal largemodal fade" id="form2" tabindex="-1" role="dialog" aria-labelledby="form"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="{{ route('form.store', $data->form) }}" class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Request More Information</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form">
                            <div class="valid-form row">
                                @csrf
                                <input name="model_type" value="festival" hidden>
                                <input name="model_id" value="{{ $data->id }}" hidden>
                                {!! $festival->form->render() !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Stripe with your publishable key
            const stripe = Stripe(
                "pk_test_51LxEwJLCJ2NwvyLdyC9zUiYUSSAlagLKKcpdgaCxygytUuA7yUSipFcXr0YZaZ24PIk8AH1D3zN0WH1Kzh9JICME00B5XvAKVc"
            );
            const elements = stripe.elements();

            // Create card element with proper styling
            const style = {
                base: {
                    color: "#32325d",
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSize: "16px",
                    border: "2px solid black",
                    '::placeholder': {
                        color: "#aab7c4"
                    }
                },
                invalid: {
                    color: "#fa755a",
                }
            };

            const classes = {
                base: 'f-input'
            };

            const card = elements.create('card', {
                style: style,
                classes: classes,
                hidePostalCode: true
            });

            // Mount card element to div
            const cardElement = document.getElementById('card-element');
            if (cardElement) {
                card.mount('#card-element');
            }

            // Handle real-time validation errors
            card.addEventListener('change', function(event) {
                const displayError = document.getElementById('card-errors');
                if (displayError) {
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                }
            });

            const form = document.getElementById('festival-form');
            if (!form) return; // Exit if form doesn't exist

            const cardErrors = document.getElementById('card-errors');
            const formErrors = document.getElementById('form-errors');

            // Function to validate form fields
            function validateForm() {
                let isValid = true;
                
                // Clear previous errors
                if (cardErrors) cardErrors.textContent = '';
                if (formErrors) formErrors.textContent = '';

                // Get the selected payment method
                const selectedPayment = form.querySelector('input[name="pm"]:checked')?.value;

                // Validate required fields
                const requiredFields = form.querySelectorAll('input[required], select[required], input[data-validation="required"]');
                requiredFields.forEach(field => {
                    if (field && !field.value.trim()) {
                        field.style.borderColor = '#dc3545';
                        isValid = false;
                    } else if (field) {
                        field.style.borderColor = '';
                    }
                });

                // Validate country select if it exists
                const countrySelect = form.querySelector('select[name="country"]');
                if (countrySelect && !countrySelect.value) {
                    countrySelect.style.borderColor = '#dc3545';
                    isValid = false;
                }

                // Validate card details if card payment is selected
                if (selectedPayment === 'card') {
                    if (card && !card._complete) {
                        if (cardErrors) cardErrors.textContent = 'Please fill out your card details.';
                        isValid = false;
                    }
                }

                // Show general form error if validation failed
                if (!isValid && formErrors) {
                    formErrors.textContent = 'Please fill in all required fields';
                }

                return isValid;
            }

            // Handle form submission
            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                // Validate form before proceeding
                if (!validateForm()) {
                    return;
                }

                // Disable submit button to prevent multiple submissions
                const submitButton = form.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.disabled = true;
                    submitButton.textContent = "Processing...";
                }

                const selectedPayment = form.querySelector('input[name="pm"]:checked')?.value;

                // Create payment token if card payment is selected
                if (selectedPayment === 'card') {
                    try {
                        const { token, error } = await stripe.createToken(card);

                        if (error) {
                            if (cardErrors) cardErrors.textContent = error.message;
                            if (submitButton) {
                                submitButton.disabled = false;
                                submitButton.textContent = "@lang('common.register')";
                            }
                            return;
                        } else {
                            const hiddenInput = document.createElement('input');
                            hiddenInput.setAttribute('type', 'hidden');
                            hiddenInput.setAttribute('name', 'stripeToken');
                            hiddenInput.setAttribute('value', token.id);
                            form.appendChild(hiddenInput);
                        }
                    } catch (err) {
                        if (cardErrors) cardErrors.textContent = 'An error occurred while processing your card.';
                        if (submitButton) {
                            submitButton.disabled = false;
                            submitButton.textContent = "@lang('common.register')";
                        }
                        return;
                    }
                }

                // Submit the form
                form.submit();
            });
        });
    </script>
@stop
