@extends('home.layouts.home')

@section('title', 'PRODUCT DETAIL')



@section('pageContent')
    <div class="container">
        <div class="post">
            <div class="block-info mv-box-shadow-gray-1">
                <div class="mv-block-style-27">
                    <div class="mv-col-wrapper">
                        <div class="mv-col-left block-27-col-slider">


                            <img src="{{$bike->getImageUrl()}}" alt="demo" class=" img-responsive" style="padding:13px;border: 1px solid grey;">
                        </div>

                        <div class="mv-col-right block-27-col-info">
                            <div class="col-info-inner">
                                <div class="block-27-info">
                                    <div class="block-27-title">MODEL: {{$bike->model}}</div>


                                    <div class="block-27-price">
                                        <div class="new-price">{{$bike->make}}</div>

                                    </div>


                                    <div class="block-27-table-info">

                                            <table>
                                                <tbody>

                                                <tr>
                                                    <td>Color:</td>
                                                    <td>
                                                                       <span style="background-color: {{$bike->color}};width: 20px;height: 20px;display: inline-block"
                                                                             class="icon-color">
                                                                           &nbsp;
                                                                        </span>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Price:</td>
                                                    <td>${{$bike->price}}</td>
                                                </tr>



                                                <tr>
                                                    <td>Weight</td>
                                                    <td>{{$bike->weight}} KG</td>
                                                </tr>

                                                <tr>
                                                    <td>CC</td>
                                                    <td>{{$bike->cc}}</td>
                                                </tr>
                                                {{--<tr>--}}
                                                    {{--<td>created_at</td>--}}
                                                    {{--<td>{{$bike->created_at}}</td>--}}
                                                {{--</tr>--}}


                                                </tbody>
                                            </table>

                                    </div>
                                </div>
                                <!-- .block-27-info-->


                                <!-- .block-27-message-->
                            </div>


                        </div>
                    </div>
                </div>
                <!-- .mv-block-style-27-->
            </div>
            <!-- .block-info-->

        </div>
    </div>

@endsection