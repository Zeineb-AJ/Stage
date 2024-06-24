@extends('layouts.app')
@push('css')
    <link href="{{ asset('themes/mytravel/dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endpush
@section('content')
    <div class="bravo_detail_hotel">
        <div class="border-bottom mb-3">
            @include('Layout::parts.bc')
        </div>
        <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        @php $review_score = $row->review_data @endphp
                        @include('Hotel::frontend.layouts.details.hotel-detail')







                        @includeIf("Hotel::frontend.layouts.details.hotel-surrounding")

                        @if($row->map_lat && $row->map_lng)
                            <div class="border-bottom py-4 pb-6">
                                <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                                    {{ __("Location") }}
                                </h5>
                                <div class="location-map">
                                    <div id="map_content"></div>
                                </div>
                            </div>
                        @endif


                    </div>
                  <!--  <div class="col-md-12 col-lg-3">

                        @include('Hotel::frontend.layouts.details.hotel-form-enquiry')
                        <div class="mb-4">
                            <div class="border border-color-7 rounded mb-5">
                                <div class="border-bottom">
                                    @if($row->discount_percent)
                                        <div class="sale-box">
                                            <div class="ribbon ribbon--red">{{ __("SAVE :text",['text'=>$row->discount_percent]) }}</div>
                                        </div>
                                    @endif

                                </div>

                            </div>
                        </div>
                        @include('Tour::frontend.layouts.details.vendor')

                    </div>  -->
                </div>
                <div class="row end_tour_sticky">
                    <div class="col-md-12">
                        @include('Hotel::frontend.layouts.details.hotel-related')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            "use strict"
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {}
                    });
                }
            });
            @endif
        });

        //Review
        $('.sfeedbacks_form .sspd_review .far').each(function () {
            var list = $(this).parent(),
                listItems = list.children(),
                itemIndex = $(this).index(),
                parentItem = list.parent();
            $(this).on('hover',function() {
                for (var i = 0; i < listItems.length; i++) {
                    if (i <= itemIndex) {
                        $(listItems[i]).addClass('hovered');
                    } else {
                        break;
                    }
                }
                $(this).on('click',function() {
                    for (var i = 0; i < listItems.length; i++) {
                        if (i <= itemIndex) {
                            $(listItems[i]).addClass('selected');
                        } else {
                            $(listItems[i]).removeClass('selected');
                        }
                    }
                    parentItem.children('.review_stats').val(itemIndex + 1);
                });
            }, function () {
                listItems.removeClass('hovered');
            });
        });


    </script>
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
            var bravo_booking_i18n = {
            no_date_select:'{{__('Please select Start and End date')}}',
            no_guest_select:'{{__('Please select at least one guest')}}',
            load_dates_url:'{{route('space.vendor.availability.loadDates')}}',
            name_required:'{{ __("Name is Required") }}',
            email_required:'{{ __("Email is Required") }}',
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('themes/mytravel/module/hotel/js/single-hotel.js?_ver='.config('app.asset_version')) }}"></script>
@endpush
