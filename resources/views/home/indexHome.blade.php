@extends('home.layouts.home')

@section('title', 'Product list')



@section('pageContent')
    <div class="container">
        <div class="row mv-content-sidebar">
            <div class="mv-c-s-content col-xs-12 col-md-8 col-lg-9">
                <div class="row mv-list-product-wrapper mv-block-style-25">
                    <div class="block-25-list mv-list-product">

                        @if($bikes->isEmpty())
                            <article class="col-xs-6 col-sm-4 col-md-12 item post">
                                <div class="item-inner mv-effect-translate-1 mv-box-shadow-gray-1">
                                    <div class="bg-warning mv-col-wrapper item-inner-relative">
                               <h4>
                                   Sorry, Nothing was Found
                               </h4>
                                        </div>
                                    </div>
                            </article>
                        @endif
                        @foreach ($bikes as$bike)
                            <article class="col-xs-6 col-sm-4 col-md-12 item post">
                                <div class="item-inner mv-effect-translate-1 mv-box-shadow-gray-1">
                                    <div class="mv-col-wrapper item-inner-relative">
                                        <div class="mv-col content-thumb">
                                            <div class="thumb-inner">
                                                <div class="thumb-img-wrapper mv-effect-relative">
                                                    <a href="{{route('bike_detail', ['id' => $bike->id])}}"
                                                       title="{{$bike->model}}">
                                                        <img src="{{$bike->getThumbnailUrl()}}" alt="demo"
                                                             class="mv-effect-item"/></a>
                                                    <a href="{{route('bike_detail', ['id' => $bike->id])}}"
                                                       title="{{$bike->model}}"
                                                       class="mv-btn mv-btn-style-25 btn-readmore-plus "><span
                                                                class="btn-inner"></span></a></div>


                                            </div>
                                        </div>

                                        <div class="mv-col content-main">
                                            <div class="content-main-inner">
                                                <div class="content-detail">
                                                    <div class="content-title"><a
                                                                href="{{route('bike_detail', ['id' => $bike->id])}}"
                                                                title="{{$bike->model}}" class="mv-overflow-ellipsis">
                                                            Model: {{$bike->model}}
                                                        </a></div>

                                                    <div class="content-desc hidden-xs hidden-sm">
                                                        Make: {{$bike->make}}
                                                    </div>
                                                    <div class="content-desc">
                                                        <span>Price: ${{$bike->price}}</span>


                                                    </div>




                                                    <div class="content-desc ">
                                                        Weight: {{$bike->weight}} KG
                                                    </div>
                                                    <div class="content-desc ">
                                <span style="background-color: {{$bike->color}};width: 20px;height: 20px;display: inline-block"
                                      class="icon-color">
                                   &nbsp;
                                </span>
                                                    </div>

                                                </div>

                                                <div class="content-button mv-btn-group text-center">
                                                    <div class="group-inner">
                                                        <a class="mv-btn mv-btn-style-1 " target="_blank"
                                                           href="{{route('bike_detail', ['id' => $bike->id])}}">
                                  <span class="btn-inner">
                                  <span class="btn-text">See more </span></span>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- .post-->
                        @endforeach


                    </div>
                </div>
                <!-- .mv-list-product-wrapper-->
                <div class="mv-pagination-wrapper">

                {{ $bikes->appends($input)->links() }}


                <!-- .mv-pagination-style-1-->
                </div>

                <!-- .mv-pagination-wrapper-->



            </div>
            <!-- .mv-c-s-content-->

            <div class="mv-c-s-sidebar col-xs-12 col-md-4 col-lg-3 hidden-xs hidden-sm">
                <div class="mv-c-s-sidebar-inner">

                    <!-- .mv-aside-search-->

                    <div class="mv-aside mv-aside-filter-by-price">

                        <div class="aside-body">
                            <form method="get" class="form-aside-filter-by-price" action="{{route('home')}}">
                                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                <!--Weight end-->
                                <div class="aside-title mv-title-style-11">Sort by :</div>
                                <div class='example'>
                                    <select name=order class="form-control">

                                        <option value="date" {{  (!isset($input['order']) || $input['order'] =='date')  ?' selected':''}} >
                                            Date added
                                        </option>
                                        <option value="price" {{ (isset($input['order']) && $input['order'] =='price') ?' selected':''}} >
                                            Price
                                        </option>
                                    </select>
                                    <br>

                                    <select name=sort class="form-control">

                                        <option value="desc" {{  (!isset($input['sort']) || $input['sort'] =='desc')  ?' selected':''}} >
                                            Descending
                                        </option>
                                        <option value="asc" {{ (isset($input['sort']) && $input['sort'] =='asc') ?' selected':''}} >
                                            Ascending
                                        </option>
                                    </select>
                                </div>
                                <div class="aside-title mv-title-style-11">filter by price :</div>
                                <div id="mv-slider-range-price">
                                    <div class="slider-range-wrapper mv-slider-range-style-1">
                                        <div class="slider-range"></div>
                                    </div>
                                    <div class="mv-dp-table align-middle">
                                        <div class="mv-dp-table-cell view-values">Price: $<span
                                                    class="min-value"></span> - $<span class="max-value"></span></div>

                                    </div>
                                    <input type="hidden" name="min_price" id="min_price"
                                           value="{{$input['min_price'] or '100'}}"/>
                                    <input type="hidden" name="max_price" id="max_price"
                                           value="{{$input['max_price'] or '100000'}}"/>

                                </div>
                                <!--Price end-->

                                <div class="aside-title mv-title-style-11">filter by Weight :</div>
                                <div id="mv-slider-range-weight">
                                    <div class="slider-range-wrapper mv-slider-range-style-1">
                                        <div class="slider-range"></div>
                                    </div>
                                    <div class="mv-dp-table align-middle">
                                        <div class="mv-dp-table-cell view-values">Weight: <span
                                                    class="min-value"></span> KG - <span class="max-value"></span> KG
                                        </div>

                                    </div>
                                    <input type="hidden" name="min_weight" id="min_weight"
                                           value="{{$input['min_weight'] or '50'}}"/>
                                    <input type="hidden" name="max_weight" id="max_weight"
                                           value="{{$input['max_weight'] or '30000'}}"/>

                                </div>
                                <!--Weight end-->
                                <div class="aside-title mv-title-style-11">filter by Color :</div>
                                <div class='example'>
                                    <span id="clear_color" class="btn btn-sm btn-danger">Clear Color</span>
                                    <input type='text' id='color' name="color" value="{{$input['color'] or ''}}"/>
                                </div>


                                <!--<div class="sp-replacer sp-light"><div class="sp-preview"><div class="sp-preview-inner sp-clear-display" style="background-color: transparent;"></div></div></div>-->


                                <div class=" filter-button">
                                    {{--<input type="hidden" name="update_filter" value="1">--}}
                                    <input type="submit" name="update_filter" value="Filter"
                                           class="btn square metro btn-block square  btn-success">
                                </div>
                            </form>


                        </div>
                    </div>
                    <!-- .mv-aside-filter-by-price-->


                    <!-- .mv-aside-size-->


                    <!-- .mv-aside-color-->


                </div>
            </div>
            <!-- .mv-c-s-sidebar-->
        </div>
    </div>

@endsection