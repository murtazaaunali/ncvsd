@extends('admin.layout.master')

@section('title')
    Admin | Veterens Graphs
@endsection

@section('header')
    <link rel="stylesheet" href="{!! asset('plugins/morris/morris.css') !!}">
@endsection

@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">
                <div class="row">
                    <div class="alert alert-success" style="display:none;margin-top:10px;" ></div>
                    <div class="col-xs-12">
                        <div class="page-title-box inner-page">
                            <h4 class="page-title">Veterens Registeration Graph</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>  
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Statistics </h4>
                            <div id="morris-bar-example" style="height: 280px;"></div>
                        </div> 
                    </div><!-- end col -->
                </div>
            </div>
            <div class="row">
            <a href="/generate/veterens-csv" target="_blank">Generate CSV</a>
        </div>
        </div>
    </div>
@endsection

@section('footer')
<script type="text/javascript">
	!function($) {
    "use strict";

    var Dashboard = function() {
    	this.$realData = []
    };

    //creates Bar chart
    Dashboard.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.2,
            barColors: lineColors,
            postUnits: ''
        });
    },

    Dashboard.prototype.init = function() {

        //creating bar chart
        /*var $barData  = [
            { y: '01/18', a: 42 },
            { y: '02/18', a: 75 },
            { y: '03/18', a: 38 },
            { y: '04/18', a: 19 },
            { y: '05/18', a: 93 }
        ];*/
        var $barData = <?php echo json_encode($result); ?>;
        //console.log($barData);
        this.createBarChart('morris-bar-example', $barData, 'y', ['a'], ['Statistics'], ['#3bafda']);

    },
    //init
    $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.Dashboard.init();
}(window.jQuery);
</script>
@endsection