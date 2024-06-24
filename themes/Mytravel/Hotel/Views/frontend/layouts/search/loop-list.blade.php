@php
    $translation = $row->translate();
@endphp
<li class="card mb-5 overflow-hidden">
    <div class="product-item__outer w-100">
        <div class="row">
            <div class="col-md-5 col-xl-4">
                <div class="product-item__header">
                    <div class="position-relative">
                        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}" class="d-block">
                            <img class="min-height-230 bg-img-hero card-img-top" src="{{$row->image_url}}" alt="{{$translation->title}}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xl-5 col-wd-4gdot5 flex-horizontal-center">
                <div class="w-100 position-relative m-4 m-md-0">

                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block rtl-left-0 rtl-right-auto">
                        <button type="button" class="btn btn-sm btn-icon rounded-circle"  data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Save for later')}}">
                            <span class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                            </span>
                        </button>
                    </div>
                    <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                        <span class="font-weight-medium font-size-17 text-dark d-flex mb-1">{{$translation->title}} </span>
                    </a>
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap flex-xl-nowrap align-items-center font-size-14 text-gray-1">
                            @if(!empty($row->location->name))
                                @php $location =  $row->location->translate() @endphp
                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i>{{$location->name ?? ''}}
                                @if($row->map_lat && $row->map_lng)
                                    <small class="px-1 font-size-15"> - </small>
                                    <a target="_blank" href="https://www.google.com/maps/place/{{$row->map_lat}},{{$row->map_lng}}/@<?php echo $row->map_lat ?>,{{$row->map_lng}},{{!empty($row->map_zoom) ? $row->map_zoom : 12}}z">
                                        <span class="text-primary font-size-14">{{__('View on map')}}</span>
                                    </a>
                                @endif
                            @endif
                        </div>

                        @if(!empty($translation->badge_tags))
                            <ul class="list-unstyled d-flex pb-2 flex-wrap">
                                @foreach($translation->badge_tags as $key => $item)
                                    <li class="border border-{{$item['color']}} bg-{{$item['color']}} rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mb-2 mr-2">
                                        <span class="font-weight-normal font-size-14 text-white">
                                            {{$item['title']}}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>




        </div>
    </div>
</li>
