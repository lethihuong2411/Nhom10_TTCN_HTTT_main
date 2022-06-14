@extends('layout_admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-size: 50px; font-family: Serif">
            <center><b>{{ $company_name }}</b></center>
        </h1>
        <h1>
            {{ __('chart') }}
            <small>{{ __('infor') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Hệ thống</a></li>
            <li class="active">Tổng quan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-suitcase"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('Sản Phẩm') }}</span>
                        <span class="info-box-number">{{ count($product) }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-archive"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('Cửa Hàng') }}</span>
                        <span class="info-box-number">{{$store}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">

                        <span class="info-box-text">{{ __('Đã Bán') }} </span>
                        <span class="info-box-number">{{ $bill_by_company_id }}</span>


                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('Người Dùng') }}</span>
                        <span class="info-box-number">{{ count($user) }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <div class="btn-group">
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>

                        </div>
                    </div><!-- /.box-header -->
                    @can('admin')
                    <div class="box-header">
                        <center>
                            <h2 class="box-title"><b>Thống kê lượt truy cập mỗi ngày</b> </h2>
                        </center>
                    </div>
                    <div class="box-body">
                        <table id="tableId2" class="table table-bordered table-striped">
                            <thead>
                                <tr style="font-size:18px;">
                                    <th>Ngày </th>
                                    <th width="20%">
                                        Lượt View
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($fetchTotalVisitorsAndPageViews as $key => $item)
                                <tr>
                                    <td>{{ $item['date']->format('d/m/Y')  }} </td>
                                    <td>{{ $item['pageViews'] }} </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                    @endcan
                    <div class="box box-primary">
                        <div class="box-header">
                            <center>
                                <h3 class="box-title">Thống kê doanh thu bán hàng theo ngày trong tháng</h3>
                            </center>
                        </div>

                        <canvas id="buyers" width="1000px" height="300" data-list-day="{{$listDay}}" data-money-done="{{$arrRevenueMonthDone}}" data-money-pending="{{$arrRevenueMonthPending}}"></canvas>

                    </div><!-- /.box -->
                   
                </div><!-- ./box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

</div>

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
@section('js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
<script>
    let listDay = $("#buyers").attr('data-list-day');
    listDay = JSON.parse(listDay);
    let dataMoneyDone = $("#buyers").attr('data-money-done');
    dataMoneyDone = JSON.parse(dataMoneyDone);
    let dataMoneyPending = $("#buyers").attr('data-money-pending');
    dataMoneyPending = JSON.parse(dataMoneyPending);
    // line chart data
    var buyerData = {
        labels: listDay,
        datasets: [{
            fillColor: "rgb(255, 206, 153)",
            strokeColor: "#cc6600",
            pointColor: "#fff",
            pointStrokeColor: "#9DB86D",
            data: dataMoneyDone
        }]
    }
    // get line chart canvas
    var buyers = document.getElementById('buyers').getContext('2d');
    // draw line chart
    new Chart(buyers).Line(buyerData);
</script>
<script>
    $('#tableId2').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": false,
        "bSort": true,
        "order": [],
        "bInfo": false,
        "bAutoWidth": false
    });
</script>


@stop