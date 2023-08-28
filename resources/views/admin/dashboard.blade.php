@extends('admin.layout.master')

@section('title')
    Admin | Volunteer Graphs
@endsection

@section('header')
    <link rel="stylesheet" href="{!! asset('plugins/morris/morris.css') !!}">
    
@endsection
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!-- Chart code -->
    <script>
	 
var chart = AmCharts.makeChart("warZoneStatistics", {
    "type": "pie",
    "theme": "light",
    "innerRadius": "40%",
    "gradientRatio": [-0.4, -0.4, -0.4, -0.4, -0.4, -0.4, 0, 0.1, 0.2, 0.1, 0, -0.2, -0.5],
    "dataProvider": <?php echo json_encode($result8); ?>,
    "balloonText": "[[value]]",
    "valueField": "value",
    "titleField": "warzone",
    "balloon": {
        "drop": true,
        "adjustBorderColor": false,
        "color": "#FFFFFF",
        "fontSize": 16
    },
    "export": {
        "enabled": true
    }
});
</script>
    <script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(chart);

    function chart()
    {
        var dataUSers = <?php echo json_encode($result7); ?>;
        console.log(dataUSers);
		var dataArray = dataUSers;

        var dataArray1 = [
            ['Age', 'Male', {role: 'annotation'}, 'Female', {role: 'annotation'}],
           dataArray[0],
            dataArray[1],
            dataArray[2],
            dataArray[3]];

        var data = google.visualization.arrayToDataTable(dataArray1);

        var chart = new google.visualization.BarChart(document.getElementById('age_pyramid_cw'));

        var options = {
            title: '',
            titleTextStyle: {color: 'blue', fontSize: 16, align: 'center', bold: true},
            colors: ['#ff0000', '#b91d47'],
            chartArea: { backgroundColor: 'white', height: '70%', top: '10%' },
            isStacked: true,
            legend: { position: 'bottom', maxLines: 3 },
            hAxis: {
                textPosition: 'none',
                format: ';',
                title: ''
            },
            vAxis: {
                direction: 1,
                title: ''
            }
        }; 

        var formatter = new google.visualization.NumberFormat({
            pattern: ';'
        });

        formatter.format(data, 2)

        chart.draw(data, options);
    }

</script>
<style>
#chartdiv {
    width       : 100%;
    height      : 280px;
    font-size   : 11px;
} 
#chartdivcustom {
    width       : 100%;
    height      : 280px;
    font-size   : 11px;
} 
#chartdivtree {
    width       : 100%;
    height      : 280px;
    font-size   : 11px;
} 
#chartdivfour {
    width       : 100%;
    height      : 280px;
    font-size   : 11px;
}
#chartdiv2 {
    width       : 100%;
    height      : 280px;
    font-size   : 11px;
}       

#genderGraph {
  width: 100%;
  height: 300px;
}
#warZoneStatistics {
  width   : 100%;
  height    : 500px;
  font-size : 11px;
}             
</style>



@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">
                <div class="row">
                   
                    <div class="alert alert-success" style="display:none;margin-top:10px;" ></div>
                    <div class="col-xs-12">
                        <div class="page-title-box inner-page">
                            <h4 class="page-title pull-left">Health Graph</h4>
                            <div class="pull-right">
                                <a href="/generate/health" class="btn btn-success" target="_blank">Generate CSV</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>  
                </div>
                
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <div class="card-box">  
                            <h4 class="header-title m-t-0">Health Statistics </h4>
                             <div id="containerss" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                        </div>
                        <div class="card-box"> 
                        <div class='gender_graph'>
                             <h4 class="header-title m-t-0">Veteran: Age / Gender</h4>
                            <div class='row'>
                                <div class='col-md-7'>
                                    <div id="age_pyramid_cw" style="width: 100%; height: 250px;"></div>  
                                </div>
                                <div class='col-md-5'>
                                    <div id="genderGraph"></div>
                                </div>
                            </div>
                        </div>
                       </div>  
                    </div><!-- end col -->
                </div>
            </div>
        </div>
        
        
        <div class="content">
          <div class="container">
                <div class="row">
                    <div class="alert alert-success" style="display:none;margin-top:10px;" ></div>
                    <div class="col-xs-12">
                        <div class="page-title-box inner-page">
                            <h4 class="page-title pull-left">Branch Graph</h4>
                            <div class="pull-right">
                                <a href="/generate/veterens-csv" class="btn btn-success" target="_blank">Generate CSV</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>  
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Branch Statistics </h4>
                            <div id="chartdiv2"></div>
                        </div> 
                    </div><!-- end col -->
                    <div class='col-md-12'>
                    <div class="card-box">
                     <h4 class="header-title m-t-0">War Zone</h4>	
                      <div id='warZoneStatistics'></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

		<!-- volunteer section -->
        <div class="content">
          <div class="container">
                <div class="row">
                    <div class="alert alert-success" style="display:none;margin-top:10px;" ></div>
                    <div class="col-xs-12">
                        <div class="page-title-box inner-page">
                            <h4 class="page-title pull-left">Volunteers Registration Graph (Records of {{ date('M, Y') }})</h4>
                            <div class="pull-right">
                                <a href="/generate/volunteer-csv" class="btn btn-success" target="_blank">Generate CSV</a>
                            </div>
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
        </div>
        <!-- volunteer section -->


        <!-- veterans section -->
        <div class="content">
          <div class="container">
                <div class="row">
                    <div class="alert alert-success" style="display:none;margin-top:10px;" ></div>
                    <div class="col-xs-12">
                        <div class="page-title-box inner-page">
                            <h4 class="page-title pull-left">Veterans Registration Graph (Records of {{ date('M, Y') }})</h4>
                            <div class="pull-right">
                                <a href="/generate/veterens-csv" class="btn btn-success" target="_blank">Generate CSV</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>  
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0">Statistics </h4>
                            <div id="morris-bar-example2" style="height: 280px;"></div>
                        </div> 
                    </div><!-- end col -->
                </div>
            </div>
        </div>
        <!-- veterans section -->

        
    </div>
    <?php //echo json_encode($result2); ?>
@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>


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


        var $barData = <?php echo json_encode($result); ?>;
        var $barData2 = <?php echo json_encode($result2); ?>;
        var $barData3 = <?php echo json_encode($result4); ?>;
		var res = $barData3.map(function(item) {
		  return Object.values(item);
		});
		
        var $genderStatistics = <?php echo json_encode($result6); ?>;
        var $branchServices = <?php echo json_encode($result5); ?>;
    	
		  Highcharts.chart('containerss', {
  chart: {
    type: 'column'
  },
  title: {
    text: ''
  },
 
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min:0,
    title: {
      text: 'Health (Issues)'
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'Health: <b>{point.y:.1f} </b>'
  },
  exporting: {
            buttons: {
                contextButton: {
                    enabled: false
                },
                
            }
        },
  series: [{
    name: 'Population',
   data: res,
    dataLabels: {
     // enabled: true,
      rotation: -90,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:.1f}', // one decimal
      y: 10, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});
		 
		
            var pie = AmCharts.makeChart( "genderGraph", {
              "type": "pie",
              "theme": "light",
              "titles": [ {
                "text": "Genders",
                "size": 12
              } ],
              
              "dataProvider": $genderStatistics,

              "valueField": "Percentage",
              "titleField": "Gender",
              "startEffect": "elastic",
              "startDuration": 2,
              "labelRadius": 15,
              "innerRadius": "50%",
              "depth3D": 10,
              "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
              "angle": 15,
              "export": {
                "enabled": true
              }
            });

			 
			
            var chart = AmCharts.makeChart( "chartdiv2", {
              "type": "serial",
              "theme": "light",
              "dataProvider": $branchServices,
              "valueAxes": [ {
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
              }],
              "gridAboveGraphs": true,
              "startDuration": 1,
              "graphs": [ {
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "Percantage"
              } ],
              "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
              },
              "categoryField": "Services",
              "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 10
              },
              "export": {
                "enabled": true
              }

            });

        this.createBarChart('morris-bar-example', $barData,'y', ['a'], ['Statistics'], ['#3bafda']);
        this.createBarChart('morris-bar-example2', $barData2, 'y', ['a'], ['Statistics'], ['#3bafda']);
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