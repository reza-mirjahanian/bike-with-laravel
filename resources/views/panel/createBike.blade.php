@extends('panel.layouts.admin')

@section('title', ' Create New Motorbike')


@section('topbar')
    Welcome Admin
    <a href="{{ url('/logout') }}">
        Logout
    </a>
@endsection

@section('sidebar')
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav " id="side-menu">

            {{--<li>--}}
            {{--<a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>--}}
            {{--</li>--}}


            <li class="active">
                <a href="#"><i class="fa fa-wrench fa-fw"></i>
                    Motorbike
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse in" aria-expanded="true">
                    <li>
                        <a href="register.html" class="active"><i class="fa fa-edit fa-fw "></i> New Bike</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

        </ul>
    </div>
@endsection

@section('pageContent')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Please fill out this form.
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="post" action="{{route('bikes.store')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label>Model:
                                    <input class="form-control" name="model" required>
                                </label>

                                <p class="help-block">
                                    <!--error-->
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Make:
                                    <input class="form-control" name="make" placeholder="Yamaha, Honda, ..." required>
                                </label>

                                <p class="help-block">
                                    <!--error-->
                                </p>
                            </div>
                            <div class="form-group">
                                <label>
                                    CC (Cubic Centimeter capacity):
                                    <input name="cc" type="number" min="1" class="form-control" required>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="controls input-prepend">
                                    <label>Color:
                                        <input type="text" name="color" class="color input-small hide" id="color"
                                               value="rgb(0, 0, 0)"/>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    Weight(KG):
                                    <input name="weight" type="number" min="50" max="30000" step="any"
                                           class="form-control" required>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    Price($):
                                    <input name="price" type="number" min="100" max="100000" step='0.01'
                                           placeholder='0.00' class="form-control" required>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Bike image:
                                    <input type="file" accept=" .jpg, .jpeg, .png, .gif, .bmp" name="image" required>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-success">Save Bike</button>
                            <button type="reset" class="btn btn-warning">Reset Form</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <!--Messages-->
                        {{--{{ dump($errors) }}--}}
                        {{--{{ dump($success) }}--}}

                        @if(session('errorsList'))

                            <ul class="bg-danger">
                                @foreach(session('errorsList') as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>

                        @elseif(session('success'))
                            <ul class="bg-success">
                                @foreach(session('success') as $message)
                                    <li>
                                        {{$message}}
                                    </li>
                                @endforeach
                            </ul>

                        @endif
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->

@endsection


@section('js')
    @parent
    $(document).ready(function(){
    jQuery("#color").spectrum({
    showPaletteOnly: true,
    showPalette:true,
    allowEmpty:true,
    hideAfterPaletteSelect:true,
    color: 'black',
    palette: [
    ['black', 'white', 'blanchedalmond',
    'rgb(255, 128, 0);', 'hsv 100 70 50'],
    ['red', 'yellow', 'green', 'blue', 'violet']
    ]
    });
    });
@endsection

