@inject('request', 'Illuminate\Http\Request')

@extends('layouts.app')

@section('pageHeader')
	<section class="content-header">
		<h1> @lang('global.sales-dashboard.title') <small> {{ trans('global.app_custom_controller_index') }} </small> </h1>
		<ol class="breadcrumb">
			<li><a href="{!! url("/admin/home") !!}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Sales Dashboard</li>
		</ol>
	</section>
@endsection


@section('content')
	     
	{{-- <div class="box box-solid box-default">...</div>
	<div class="box box-solid box-primary">...</div>
	<div class="box box-solid box-info">...</div>
	<div class="box box-solid box-warning">...</div>
	<div class="box box-solid box-success">...</div>
	<div class="box box-solid box-danger">...</div> --}}
	<div class="row">



		<div class="col-md-12">
			 @includeIf('admin.sales_dashboards.partials.blue')

		</div> 
		<div class="col-md-12">
			 @includeIf('admin.sales_dashboards.partials.orange')

		</div> 
		<div class="col-md-12">
			 @includeIf('admin.sales_dashboards.partials.red')

			 {{-- @includeIf('admin.sales_dashboards.partials.grey') --}}

		</div>
	</div>

{{-- @include('admin.sales_dashboards.partials.alerts') --}}

{{-- @include('admin.sales_dashboards.partials.tabs')  --}}


@endsection


@push('pagestyle-OFF')
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<style type="text/css">
	/*div.amcharts-chart-div>a {display: none!important;}*/
</style>
@endpush

@push('topscripts')

<script type="text/javascript" src="//www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="//www.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="//www.amcharts.com/lib/3/themes/light.js"></script>
<script type="text/javascript" src="//www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
<script type="text/javascript" src="//www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/xy.js"></script>

{{-- http://jsfiddle.net/madsynn/m8d2cqps/ --}}
	<script type="text/javascript">
		var chart;
		var chartCursor;
		AmCharts.ready(function() {
		  // RADAR CHART
		  chart = new AmCharts.AmSerialChart();
		  chart.dataProvider = primaryChartData[0];
		  chart.categoryField = "adSeen";
		  chart.startDuration = 1;
		  chart.sequencedAnimation = true;
		  var categoryAxis = chart.categoryAxis;
		  categoryAxis.title = "Number of Ads Viewed"; 
		  // VALUE AXIS
		  var valueAxis = new AmCharts.ValueAxis();
		  valueAxis.axisAlpha = 0.15;
		  valueAxis.minimum = 0;
		  valueAxis.title ="Total Viewing Accounts";
		  valueAxis.dashLength = 9;
		  chart.addValueAxis(valueAxis);
		  // GRAPH
		  var graph = new AmCharts.AmGraph();
		  graph.type = "column";
		  graph.valueField = "total_accounts_viewed";
		    graph.fillAlphas = 0.8;
  			graph.fillColors = "#C00000";
		   
		  graph.balloonText = " Ad's Viewed: [[category]]<br> Viewed by [[value]] Accounts";
		  chart.addGraph(graph);
		  // CURSOR
		  chartCursor = new AmCharts.ChartCursor();
		  chartCursor.cursorPosition = "mouse";
		  chartCursor.pan = false;
		  chart.addChartCursor(chartCursor);
		  chart.addListener("dataUpdated", zoomChart);
		  var chartScrollbar = new AmCharts.ChartScrollbar();
		  chart.addChartScrollbar(chartScrollbar);
		  // WRITE
		  chart.write("primarychartdiv");
		});

		function selectDataset(data) {
		  chart.dataProvider = primaryChartData[data];
		  chart.validateData();
		  chart.animateAgain();
		}

		function zoomChart() {
		  chart.zoomToIndexes(chart.dataProvider.length - 300, chart.dataProvider.length - 180);
		}

		var primaryChartData = [
		    // Data set #1
		    [
		      {adSeen: 0, total_accounts_viewed:64164},
		      {adSeen: 1, total_accounts_viewed:171507},
		      {adSeen: 2, total_accounts_viewed:157440},
		      {adSeen: 3, total_accounts_viewed:148048},
		      {adSeen: 4, total_accounts_viewed:141010},
		      {adSeen: 5, total_accounts_viewed:136377},
		      {adSeen: 6, total_accounts_viewed:131857},
		      {adSeen: 7, total_accounts_viewed:128105},
		      {adSeen: 8, total_accounts_viewed:125423},
		      {adSeen: 9, total_accounts_viewed:120567},
		      {adSeen: 10, total_accounts_viewed:115129},
		      {adSeen: 11, total_accounts_viewed:110726},
		      {adSeen: 12, total_accounts_viewed:105696},
		      {adSeen: 13, total_accounts_viewed:100378},
		      {adSeen: 14, total_accounts_viewed:95868},
		      {adSeen: 15, total_accounts_viewed:92420},
		      {adSeen: 16, total_accounts_viewed:86509},
		      {adSeen: 17, total_accounts_viewed:81509},
		      {adSeen: 18, total_accounts_viewed:77044},
		      {adSeen: 19, total_accounts_viewed:72693},
		      {adSeen: 20, total_accounts_viewed:68096},
		      {adSeen: 21, total_accounts_viewed:64119},
		      {adSeen: 22, total_accounts_viewed:59529},
		      {adSeen: 23, total_accounts_viewed:55692},
		      {adSeen: 24, total_accounts_viewed:52134},
		      {adSeen: 25, total_accounts_viewed:48296},
		      {adSeen: 26, total_accounts_viewed:45672},
		      {adSeen: 27, total_accounts_viewed:42171},
		      {adSeen: 28, total_accounts_viewed:39075},
		      {adSeen: 29, total_accounts_viewed:36441},
		      {adSeen: 30, total_accounts_viewed:33852},
		      {adSeen: 31, total_accounts_viewed:31097},
		      {adSeen: 32, total_accounts_viewed:28815},
		      {adSeen: 33, total_accounts_viewed:26661},
		      {adSeen: 34, total_accounts_viewed:24530},
		      {adSeen: 35, total_accounts_viewed:22644},
		      {adSeen: 36, total_accounts_viewed:21052},
		      {adSeen: 37, total_accounts_viewed:19276},
		      {adSeen: 38, total_accounts_viewed:17855},
		      {adSeen: 39, total_accounts_viewed:16275},
		      {adSeen: 40, total_accounts_viewed:15202},
		      {adSeen: 41, total_accounts_viewed:13944},
		      {adSeen: 42, total_accounts_viewed:12722},
		      {adSeen: 43, total_accounts_viewed:11796},
		      {adSeen: 44, total_accounts_viewed:10687},
		      {adSeen: 45, total_accounts_viewed:9576},
		      {adSeen: 46, total_accounts_viewed:8919},
		      {adSeen: 47, total_accounts_viewed:8276},
		      {adSeen: 48, total_accounts_viewed:7588},
		      {adSeen: 49, total_accounts_viewed:7038},
		      {adSeen: 50, total_accounts_viewed:6187},
		      {adSeen: 51, total_accounts_viewed:5885},
		      {adSeen: 52, total_accounts_viewed:5478},
		      {adSeen: 53, total_accounts_viewed:4943},
		      {adSeen: 54, total_accounts_viewed:4519},
		      {adSeen: 55, total_accounts_viewed:4112},
		      {adSeen: 56, total_accounts_viewed:3801},
		      {adSeen: 57, total_accounts_viewed:3544},
		      {adSeen: 58, total_accounts_viewed:3181},
		      {adSeen: 59, total_accounts_viewed:2808},
		      {adSeen: 60, total_accounts_viewed:2646},
		      {adSeen: 61, total_accounts_viewed:2499},
		      {adSeen: 62, total_accounts_viewed:2217},
		      {adSeen: 63, total_accounts_viewed:2023},
		      {adSeen: 64, total_accounts_viewed:1799},
		      {adSeen: 65, total_accounts_viewed:1730},
		      {adSeen: 66, total_accounts_viewed:1604},
		      {adSeen: 67, total_accounts_viewed:1434},
		      {adSeen: 68, total_accounts_viewed:1259},
		      {adSeen: 69, total_accounts_viewed:1171},
		      {adSeen: 70, total_accounts_viewed:1078},
		      {adSeen: 71, total_accounts_viewed:1014},
		      {adSeen: 72, total_accounts_viewed:926},
		      {adSeen: 73, total_accounts_viewed:893},
		      {adSeen: 74, total_accounts_viewed:767},
		      {adSeen: 75, total_accounts_viewed:704},
		      {adSeen: 76, total_accounts_viewed:632},
		      {adSeen: 77, total_accounts_viewed:564},
		      {adSeen: 78, total_accounts_viewed:555},
		      {adSeen: 79, total_accounts_viewed:527},
		      {adSeen: 80, total_accounts_viewed:480},
		      {adSeen: 81, total_accounts_viewed:432},
		      {adSeen: 82, total_accounts_viewed:387},
		      {adSeen: 83, total_accounts_viewed:350},
		      {adSeen: 84, total_accounts_viewed:298},
		      {adSeen: 85, total_accounts_viewed:294},
		      {adSeen: 86, total_accounts_viewed:283},
		      {adSeen: 87, total_accounts_viewed:255},
		      {adSeen: 88, total_accounts_viewed:216},
		      {adSeen: 89, total_accounts_viewed:219},
		      {adSeen: 90, total_accounts_viewed:183},
		      {adSeen: 91, total_accounts_viewed:181},
		      {adSeen: 92, total_accounts_viewed:153},
		      {adSeen: 93, total_accounts_viewed:156},
		      {adSeen: 94, total_accounts_viewed:123},
		      {adSeen: 95, total_accounts_viewed:139},
		      {adSeen: 96, total_accounts_viewed:123},
		      {adSeen: 97, total_accounts_viewed:103},
		      {adSeen: 98, total_accounts_viewed:110},
		      {adSeen: 99, total_accounts_viewed:84},
		      {adSeen: 100, total_accounts_viewed:89},
		      {adSeen: 101, total_accounts_viewed:84},
		      {adSeen: 102, total_accounts_viewed:82},
		      {adSeen: 103, total_accounts_viewed:64},
		      {adSeen: 104, total_accounts_viewed:69},
		      {adSeen: 105, total_accounts_viewed:68},
		      {adSeen: 106, total_accounts_viewed:63},
		      {adSeen: 107, total_accounts_viewed:47},
		      {adSeen: 108, total_accounts_viewed:48},
		      {adSeen: 109, total_accounts_viewed:46},
		      {adSeen: 110, total_accounts_viewed:43},
		      {adSeen: 111, total_accounts_viewed:37},
		      {adSeen: 112, total_accounts_viewed:28},
		      {adSeen: 113, total_accounts_viewed:27},
		      {adSeen: 114, total_accounts_viewed:29},
		      {adSeen: 115, total_accounts_viewed:23},
		      {adSeen: 116, total_accounts_viewed:20},
		      {adSeen: 117, total_accounts_viewed:22},
		      {adSeen: 118, total_accounts_viewed:21},
		      {adSeen: 119, total_accounts_viewed:23},
		      {adSeen: 120, total_accounts_viewed:14},
		      {adSeen: 121, total_accounts_viewed:21},
		      {adSeen: 122, total_accounts_viewed:12},
		      {adSeen: 123, total_accounts_viewed:10},
		      {adSeen: 124, total_accounts_viewed:15},
		      {adSeen: 125, total_accounts_viewed:9},
		      {adSeen: 126, total_accounts_viewed:10},
		      {adSeen: 127, total_accounts_viewed:21},
		      {adSeen: 128, total_accounts_viewed:12},
		      {adSeen: 129, total_accounts_viewed:12},
		      {adSeen: 130, total_accounts_viewed:7},
		      {adSeen: 131, total_accounts_viewed:2},
		      {adSeen: 132, total_accounts_viewed:9},
		      {adSeen: 133, total_accounts_viewed:9},
		      {adSeen: 134, total_accounts_viewed:2},
		      {adSeen: 135, total_accounts_viewed:7},
		      {adSeen: 136, total_accounts_viewed:11},
		      {adSeen: 137, total_accounts_viewed:4},
		      {adSeen: 138, total_accounts_viewed:1},
		      {adSeen: 139, total_accounts_viewed:4},
		      {adSeen: 140, total_accounts_viewed:4},
		      {adSeen: 141, total_accounts_viewed:4},
		      {adSeen: 142, total_accounts_viewed:6},
		      {adSeen: 143, total_accounts_viewed:3},
		      {adSeen: 144, total_accounts_viewed:5},
		      {adSeen: 145, total_accounts_viewed:2},
		      {adSeen: 146, total_accounts_viewed:0},
		      {adSeen: 147, total_accounts_viewed:3},
		      {adSeen: 148, total_accounts_viewed:4},
		      {adSeen: 149, total_accounts_viewed:2},
		      {adSeen: 150, total_accounts_viewed:7},
		      {adSeen: 151, total_accounts_viewed:1},
		      {adSeen: 152, total_accounts_viewed:6},
		      {adSeen: 153, total_accounts_viewed:0},
		      {adSeen: 154, total_accounts_viewed:3},
		      {adSeen: 155, total_accounts_viewed:2},
		      {adSeen: 156, total_accounts_viewed:1},
		      {adSeen: 157, total_accounts_viewed:2},
		      {adSeen: 158, total_accounts_viewed:0},
		      {adSeen: 159, total_accounts_viewed:1},
		      {adSeen: 160, total_accounts_viewed:1},
		      {adSeen: 161, total_accounts_viewed:1},
		      {adSeen: 162, total_accounts_viewed:2},
		      {adSeen: 163, total_accounts_viewed:1},
		      {adSeen: 164, total_accounts_viewed:1},
		      {adSeen: 165, total_accounts_viewed:3},
		      {adSeen: 166, total_accounts_viewed:1},
		      {adSeen: 167, total_accounts_viewed:0},
		      {adSeen: 168, total_accounts_viewed:0},
		      {adSeen: 169, total_accounts_viewed:1},
		      {adSeen: 170, total_accounts_viewed:0},
		      {adSeen: 171, total_accounts_viewed:0},
		      {adSeen: 172, total_accounts_viewed:1},
		      {adSeen: 173, total_accounts_viewed:2},
		      {adSeen: 174, total_accounts_viewed:1},
		      {adSeen: 175, total_accounts_viewed:0},
		      {adSeen: 176, total_accounts_viewed:1},
		      {adSeen: 177, total_accounts_viewed:1},
		      {adSeen: 178, total_accounts_viewed:2},
		      {adSeen: 179, total_accounts_viewed:0},
		      {adSeen: 180, total_accounts_viewed:0},
		      {adSeen: 181, total_accounts_viewed:0},
		      {adSeen: 182, total_accounts_viewed:0},
		      {adSeen: 183, total_accounts_viewed:0},
		      {adSeen: 184, total_accounts_viewed:0},
		      {adSeen: 185, total_accounts_viewed:0},
		      {adSeen: 186, total_accounts_viewed:0},
		      {adSeen: 187, total_accounts_viewed:0},
		      {adSeen: 188, total_accounts_viewed:0},
		      {adSeen: 189, total_accounts_viewed:0},
		      {adSeen: 190, total_accounts_viewed:2},
		      {adSeen: 191, total_accounts_viewed:0},
		      {adSeen: 192, total_accounts_viewed:0},
		      {adSeen: 193, total_accounts_viewed:2},
		      {adSeen: 194, total_accounts_viewed:0},
		      {adSeen: 195, total_accounts_viewed:0},
		      {adSeen: 196, total_accounts_viewed:0},
		      {adSeen: 197, total_accounts_viewed:0},
		      {adSeen: 198, total_accounts_viewed:0},
		      {adSeen: 199, total_accounts_viewed:0},
		      {adSeen: 200, total_accounts_viewed:0},
		      {adSeen: 201, total_accounts_viewed:0},
		      {adSeen: 202, total_accounts_viewed:0},
		      {adSeen: 203, total_accounts_viewed:1},
		      {adSeen: 204, total_accounts_viewed:0},
		      {adSeen: 205, total_accounts_viewed:0},
		      {adSeen: 206, total_accounts_viewed:0},
		      {adSeen: 207, total_accounts_viewed:0},
		      {adSeen: 208, total_accounts_viewed:1},
		      {adSeen: 209, total_accounts_viewed:1},
		      {adSeen: 210, total_accounts_viewed:0},
		      {adSeen: 211, total_accounts_viewed:0},
		      {adSeen: 212, total_accounts_viewed:0},
		      {adSeen: 213, total_accounts_viewed:0},
		      {adSeen: 214, total_accounts_viewed:0},
		      {adSeen: 215, total_accounts_viewed:0},
					{adSeen: 216, total_accounts_viewed:0} 
		    ],
		    // Data set #2
		    [
		      {adSeen: 0, total_accounts_viewed:344805},
		      {adSeen: 1, total_accounts_viewed:163804},
		      {adSeen: 2, total_accounts_viewed:150142},
		      {adSeen: 3, total_accounts_viewed:140804},
		      {adSeen: 4, total_accounts_viewed:134887},
		      {adSeen: 5, total_accounts_viewed:130149},
		      {adSeen: 6, total_accounts_viewed:126436},
		      {adSeen: 7, total_accounts_viewed:123054},
		      {adSeen: 8, total_accounts_viewed:120206},
		      {adSeen: 9, total_accounts_viewed:116776},
		      {adSeen: 10, total_accounts_viewed:111895},
		      {adSeen: 11, total_accounts_viewed:107392},
		      {adSeen: 12, total_accounts_viewed:102644},
		      {adSeen: 13, total_accounts_viewed:98867},
		      {adSeen: 14, total_accounts_viewed:93922},
		      {adSeen: 15, total_accounts_viewed:91552},
		      {adSeen: 16, total_accounts_viewed:86593},
		      {adSeen: 17, total_accounts_viewed:81677},
		      {adSeen: 18, total_accounts_viewed:76883},
		      {adSeen: 19, total_accounts_viewed:73284},
		      {adSeen: 20, total_accounts_viewed:69200},
		      {adSeen: 21, total_accounts_viewed:65245},
		      {adSeen: 22, total_accounts_viewed:60930},
		      {adSeen: 23, total_accounts_viewed:57578},
		      {adSeen: 24, total_accounts_viewed:54439},
		      {adSeen: 25, total_accounts_viewed:50541},
		      {adSeen: 26, total_accounts_viewed:47520},
		      {adSeen: 27, total_accounts_viewed:44471},
		      {adSeen: 28, total_accounts_viewed:41903},
		      {adSeen: 29, total_accounts_viewed:38564},
		      {adSeen: 30, total_accounts_viewed:36148},
		      {adSeen: 31, total_accounts_viewed:34179},
		      {adSeen: 32, total_accounts_viewed:31371},
		      {adSeen: 33, total_accounts_viewed:29288},
		      {adSeen: 34, total_accounts_viewed:27008},
		      {adSeen: 35, total_accounts_viewed:25198},
		      {adSeen: 36, total_accounts_viewed:23330},
		      {adSeen: 37, total_accounts_viewed:21753},
		      {adSeen: 38, total_accounts_viewed:20191},
		      {adSeen: 39, total_accounts_viewed:18527},
		      {adSeen: 40, total_accounts_viewed:17329},
		      {adSeen: 41, total_accounts_viewed:16139},
		      {adSeen: 42, total_accounts_viewed:15062},
		      {adSeen: 43, total_accounts_viewed:13718},
		      {adSeen: 44, total_accounts_viewed:12823},
		      {adSeen: 45, total_accounts_viewed:11710},
		      {adSeen: 46, total_accounts_viewed:10598},
		      {adSeen: 47, total_accounts_viewed:9816},
		      {adSeen: 48, total_accounts_viewed:9097},
		      {adSeen: 49, total_accounts_viewed:8413},
		      {adSeen: 50, total_accounts_viewed:7814},
		      {adSeen: 51, total_accounts_viewed:7229},
		      {adSeen: 52, total_accounts_viewed:6578},
		      {adSeen: 53, total_accounts_viewed:6048},
		      {adSeen: 54, total_accounts_viewed:5757},
		      {adSeen: 55, total_accounts_viewed:5268},
		      {adSeen: 56, total_accounts_viewed:4807},
		      {adSeen: 57, total_accounts_viewed:4434},
		      {adSeen: 58, total_accounts_viewed:4134},
		      {adSeen: 59, total_accounts_viewed:3715},
		      {adSeen: 60, total_accounts_viewed:3443},
		      {adSeen: 61, total_accounts_viewed:3235},
		      {adSeen: 62, total_accounts_viewed:2964},
		      {adSeen: 63, total_accounts_viewed:2663},
		      {adSeen: 64, total_accounts_viewed:2528},
		      {adSeen: 65, total_accounts_viewed:2304},
		      {adSeen: 66, total_accounts_viewed:2088},
		      {adSeen: 67, total_accounts_viewed:1965},
		      {adSeen: 68, total_accounts_viewed:1744},
		      {adSeen: 69, total_accounts_viewed:1707},
		      {adSeen: 70, total_accounts_viewed:1562},
		      {adSeen: 71, total_accounts_viewed:1447},
		      {adSeen: 72, total_accounts_viewed:1293},
		      {adSeen: 73, total_accounts_viewed:1132},
		      {adSeen: 74, total_accounts_viewed:1070},
		      {adSeen: 75, total_accounts_viewed:1000},
		      {adSeen: 76, total_accounts_viewed:911},
		      {adSeen: 77, total_accounts_viewed:821},
		      {adSeen: 78, total_accounts_viewed:809},
		      {adSeen: 79, total_accounts_viewed:769},
		      {adSeen: 80, total_accounts_viewed:668},
		      {adSeen: 81, total_accounts_viewed:566},
		      {adSeen: 82, total_accounts_viewed:534},
		      {adSeen: 83, total_accounts_viewed:512},
		      {adSeen: 84, total_accounts_viewed:477},
		      {adSeen: 85, total_accounts_viewed:461},
		      {adSeen: 86, total_accounts_viewed:401},
		      {adSeen: 87, total_accounts_viewed:394},
		      {adSeen: 88, total_accounts_viewed:356},
		      {adSeen: 89, total_accounts_viewed:328},
		      {adSeen: 90, total_accounts_viewed:295},
		      {adSeen: 91, total_accounts_viewed:280},
		      {adSeen: 92, total_accounts_viewed:263},
		      {adSeen: 93, total_accounts_viewed:223},
		      {adSeen: 94, total_accounts_viewed:195},
		      {adSeen: 95, total_accounts_viewed:192},
		      {adSeen: 96, total_accounts_viewed:178},
		      {adSeen: 97, total_accounts_viewed:137},
		      {adSeen: 98, total_accounts_viewed:145},
		      {adSeen: 99, total_accounts_viewed:147},
		      {adSeen: 100, total_accounts_viewed:138},
		      {adSeen: 101, total_accounts_viewed:119},
		      {adSeen: 102, total_accounts_viewed:125},
		      {adSeen: 103, total_accounts_viewed:101},
		      {adSeen: 104, total_accounts_viewed:98},
		      {adSeen: 105, total_accounts_viewed:106},
		      {adSeen: 106, total_accounts_viewed:88},
		      {adSeen: 107, total_accounts_viewed:96},
		      {adSeen: 108, total_accounts_viewed:64},
		      {adSeen: 109, total_accounts_viewed:73},
		      {adSeen: 110, total_accounts_viewed:67},
		      {adSeen: 111, total_accounts_viewed:67},
		      {adSeen: 112, total_accounts_viewed:57},
		      {adSeen: 113, total_accounts_viewed:36},
		      {adSeen: 114, total_accounts_viewed:62},
		      {adSeen: 115, total_accounts_viewed:37},
		      {adSeen: 116, total_accounts_viewed:42},
		      {adSeen: 117, total_accounts_viewed:46},
		      {adSeen: 118, total_accounts_viewed:32},
		      {adSeen: 119, total_accounts_viewed:22},
		      {adSeen: 120, total_accounts_viewed:29},
		      {adSeen: 121, total_accounts_viewed:24},
		      {adSeen: 122, total_accounts_viewed:33},
		      {adSeen: 123, total_accounts_viewed:21},
		      {adSeen: 124, total_accounts_viewed:21},
		      {adSeen: 125, total_accounts_viewed:19},
		      {adSeen: 126, total_accounts_viewed:18},
		      {adSeen: 127, total_accounts_viewed:17},
		      {adSeen: 128, total_accounts_viewed:17},
		      {adSeen: 129, total_accounts_viewed:15},
		      {adSeen: 130, total_accounts_viewed:14},
		      {adSeen: 131, total_accounts_viewed:18},
		      {adSeen: 132, total_accounts_viewed:8},
		      {adSeen: 133, total_accounts_viewed:14},
		      {adSeen: 134, total_accounts_viewed:11},
		      {adSeen: 135, total_accounts_viewed:10},
		      {adSeen: 136, total_accounts_viewed:10},
		      {adSeen: 137, total_accounts_viewed:10},
		      {adSeen: 138, total_accounts_viewed:6},
		      {adSeen: 139, total_accounts_viewed:10},
		      {adSeen: 140, total_accounts_viewed:9},
		      {adSeen: 141, total_accounts_viewed:5},
		      {adSeen: 142, total_accounts_viewed:3},
		      {adSeen: 143, total_accounts_viewed:6},
		      {adSeen: 144, total_accounts_viewed:6},
		      {adSeen: 145, total_accounts_viewed:10},
		      {adSeen: 146, total_accounts_viewed:2},
		      {adSeen: 147, total_accounts_viewed:2},
		      {adSeen: 148, total_accounts_viewed:5},
		      {adSeen: 149, total_accounts_viewed:5},
		      {adSeen: 150, total_accounts_viewed:2},
		      {adSeen: 151, total_accounts_viewed:5},
		      {adSeen: 152, total_accounts_viewed:3},
		      {adSeen: 153, total_accounts_viewed:1},
		      {adSeen: 154, total_accounts_viewed:4},
		      {adSeen: 155, total_accounts_viewed:5},
		      {adSeen: 156, total_accounts_viewed:5},
		      {adSeen: 157, total_accounts_viewed:5},
		      {adSeen: 158, total_accounts_viewed:3},
		      {adSeen: 159, total_accounts_viewed:2},
		      {adSeen: 160, total_accounts_viewed:1},
		      {adSeen: 161, total_accounts_viewed:3},
		      {adSeen: 162, total_accounts_viewed:0},
		      {adSeen: 163, total_accounts_viewed:0},
		      {adSeen: 164, total_accounts_viewed:1},
		      {adSeen: 165, total_accounts_viewed:2},
		      {adSeen: 166, total_accounts_viewed:1},
		      {adSeen: 167, total_accounts_viewed:4},
		      {adSeen: 168, total_accounts_viewed:1},
		      {adSeen: 169, total_accounts_viewed:1},
		      {adSeen: 170, total_accounts_viewed:1},
		      {adSeen: 171, total_accounts_viewed:1},
		      {adSeen: 172, total_accounts_viewed:0},
		      {adSeen: 173, total_accounts_viewed:1},
		      {adSeen: 174, total_accounts_viewed:0},
		      {adSeen: 175, total_accounts_viewed:0},
		      {adSeen: 176, total_accounts_viewed:1},
		      {adSeen: 177, total_accounts_viewed:1},
		      {adSeen: 178, total_accounts_viewed:1},
		      {adSeen: 179, total_accounts_viewed:1},
		      {adSeen: 180, total_accounts_viewed:0},
		      {adSeen: 181, total_accounts_viewed:1},
		      {adSeen: 182, total_accounts_viewed:1},
		      {adSeen: 183, total_accounts_viewed:1},
		      {adSeen: 184, total_accounts_viewed:0},
		      {adSeen: 185, total_accounts_viewed:0},
		      {adSeen: 186, total_accounts_viewed:2},
		      {adSeen: 187, total_accounts_viewed:0},
		      {adSeen: 188, total_accounts_viewed:0},
		      {adSeen: 189, total_accounts_viewed:1},
		      {adSeen: 190, total_accounts_viewed:0},
		      {adSeen: 191, total_accounts_viewed:0},
		      {adSeen: 192, total_accounts_viewed:0},
		      {adSeen: 193, total_accounts_viewed:1},
		      {adSeen: 194, total_accounts_viewed:1},
		      {adSeen: 195, total_accounts_viewed:0},
		      {adSeen: 196, total_accounts_viewed:0},
		      {adSeen: 197, total_accounts_viewed:1},
		      {adSeen: 198, total_accounts_viewed:1},
		      {adSeen: 199, total_accounts_viewed:0},
		      {adSeen: 200, total_accounts_viewed:0},
		      {adSeen: 201, total_accounts_viewed:0},
		      {adSeen: 202, total_accounts_viewed:1},
		      {adSeen: 203, total_accounts_viewed:0},
		      {adSeen: 204, total_accounts_viewed:0},
		      {adSeen: 205, total_accounts_viewed:0},
		      {adSeen: 206, total_accounts_viewed:0},
		      {adSeen: 207, total_accounts_viewed:1},
		      {adSeen: 208, total_accounts_viewed:0},
		      {adSeen: 209, total_accounts_viewed:0},
		      {adSeen: 210, total_accounts_viewed:0},
		      {adSeen: 211, total_accounts_viewed:0},
		      {adSeen: 212, total_accounts_viewed:1},
		      {adSeen: 213, total_accounts_viewed:0},
		      {adSeen: 214, total_accounts_viewed:0},
		      {adSeen: 215, total_accounts_viewed:0},
		      {adSeen: 216, total_accounts_viewed:1}
		    ]
		];
	</script>

<script>
	var chart = AmCharts.makeChart("orangechart", {
  "type": "serial",
  "theme": "light",
  "dataDateFormat": "YYYY-MM-DD",
  "precision": 2,
  "valueAxes": [{
    "id": "v1",
    "title": "Sales",
    "position": "left",
    "autoGridCount": false,
    "labelFunction": function(value) {
      return "$" + Math.round(value) + "M";
    }
  }, {
    "id": "v2",
    "title": "Market Days",
    "gridAlpha": 0,
    "position": "right",
    "autoGridCount": false
  }],
  "graphs": [{
    "id": "g3",
    "valueAxis": "v1",
    "lineColor": "#e1ede9",
    "fillColors": "#e1ede9",
    "fillAlphas": 1,
    "type": "column",
    "title": "Actual Sales",
    "valueField": "sales2",
    "clustered": false,
    "columnWidth": 0.5,
    "legendValueText": "$[[value]]M",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>$[[value]]M</b>"
  }, {
    "id": "g4",
    "valueAxis": "v1",
    "lineColor": "#62cf73",
    "fillColors": "#62cf73",
    "fillAlphas": 1,
    "type": "column",
    "title": "Target Sales",
    "valueField": "sales1",
    "clustered": false,
    "columnWidth": 0.3,
    "legendValueText": "$[[value]]M",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>$[[value]]M</b>"
  }, {
    "id": "g1",
    "valueAxis": "v2",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 5,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "lineColor": "#20acd4",
    "type": "smoothedLine",
    "title": "Market Days",
    "useLineColorForBulletBorder": true,
    "valueField": "market1",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
  }, {
    "id": "g2",
    "valueAxis": "v2",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 5,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "lineColor": "#e1ede9",
    "type": "smoothedLine",
    "dashLength": 5,
    "title": "Market Days ALL",
    "useLineColorForBulletBorder": true,
    "valueField": "market2",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>[[value]]</b>"
  }],
  "chartScrollbar": {
    "graph": "g1",
    "oppositeAxis": false,
    "offset": 30,
    "scrollbarHeight": 50,
    "backgroundAlpha": 0,
    "selectedBackgroundAlpha": 0.1,
    "selectedBackgroundColor": "#888888",
    "graphFillAlpha": 0,
    "graphLineAlpha": 0.5,
    "selectedGraphFillAlpha": 0,
    "selectedGraphLineAlpha": 1,
    "autoGridCount": true,
    "color": "#AAAAAA"
  },
  "chartCursor": {
    "pan": true,
    "valueLineEnabled": true,
    "valueLineBalloonEnabled": true,
    "cursorAlpha": 0,
    "valueLineAlpha": 0.2
  },
  "categoryField": "date",
  "categoryAxis": {
    "parseDates": true,
    "dashLength": 1,
    "minorGridEnabled": true
  },
  "legend": {
    "useGraphSettings": true,
    "position": "top"
  },
  "balloon": {
    "borderThickness": 1,
    "shadowAlpha": 0
  },
  "export": {
   "enabled": true
  },
  "dataProvider": [{
    "date": "2013-01-16",
    "market1": 71,
    "market2": 75,
    "sales1": 5,
    "sales2": 8
  }, {
    "date": "2013-01-17",
    "market1": 74,
    "market2": 78,
    "sales1": 4,
    "sales2": 6
  }, {
    "date": "2013-01-18",
    "market1": 78,
    "market2": 88,
    "sales1": 5,
    "sales2": 2
  }, {
    "date": "2013-01-19",
    "market1": 85,
    "market2": 89,
    "sales1": 8,
    "sales2": 9
  }, {
    "date": "2013-01-20",
    "market1": 82,
    "market2": 89,
    "sales1": 9,
    "sales2": 6
  }, {
    "date": "2013-01-21",
    "market1": 83,
    "market2": 85,
    "sales1": 3,
    "sales2": 5
  }, {
    "date": "2013-01-22",
    "market1": 88,
    "market2": 92,
    "sales1": 5,
    "sales2": 7
  }, {
    "date": "2013-01-23",
    "market1": 85,
    "market2": 90,
    "sales1": 7,
    "sales2": 6
  }, {
    "date": "2013-01-24",
    "market1": 85,
    "market2": 91,
    "sales1": 9,
    "sales2": 5
  }, {
    "date": "2013-01-25",
    "market1": 80,
    "market2": 84,
    "sales1": 5,
    "sales2": 8
  }, {
    "date": "2013-01-26",
    "market1": 87,
    "market2": 92,
    "sales1": 4,
    "sales2": 8
  }, {
    "date": "2013-01-27",
    "market1": 84,
    "market2": 87,
    "sales1": 3,
    "sales2": 4
  }, {
    "date": "2013-01-28",
    "market1": 83,
    "market2": 88,
    "sales1": 5,
    "sales2": 7
  }, {
    "date": "2013-01-29",
    "market1": 84,
    "market2": 87,
    "sales1": 5,
    "sales2": 8
  }, {
    "date": "2013-01-30",
    "market1": 81,
    "market2": 85,
    "sales1": 4,
    "sales2": 7
  }]
});
</script>

	<!-- amCharts javascript code -->
	<script type="text/javascript">
		AmCharts.makeChart("current-reach",
			{
				"type": "xy",
				"startDuration": 1.5,
				"trendLines": [],
				"graphs": [
					{
						"balloonText": "GRP:<b>[[y]] pts</b><br>REACH:<b>[[x]] %</b>",
						"bullet": "diamond",
						"bulletHitAreaSize": 1,
						"customMarker": "",
						"gapPeriod": 1,
						"id": "AmGraph-1",
						"legendValueText": "",
						"lineColor": "#9400D3",
						"lineThickness": 3,
						"markerType": "square",
						"title": "",
						"valueField": "value",
						"xAxis": "ValueAxis-2",
						"xField": "x",
						"yAxis": "ValueAxis-1",
						"yField": "y"
					}
				],
				"guides": [],
				"valueAxes": [
					{
						"id": "ValueAxis-1",
						"axisAlpha": 0,
						"title": "GROSS RATING POINTS"
					},
					{
						"id": "ValueAxis-2",
						"position": "bottom",
						"axisAlpha": 0,
						"fontSize": 0,
						"title": "REACH"
					}
				],
				"allLabels": [],
				"balloon": {
					"animationDuration": 0.88,
					"textAlign": "left"
				},
				"titles": [],
				"dataProvider": [
					{
						"y": "40",
						"x": "32",
						"value": "13624",
						"red": 12
					},
					{
						"y": "80",
						"x": "46",
						"value": "18795",
						"red": 24
					},
					{
						"y": "140",
						"x": "54",
						"value": "23956",
						"red": 46
					},
					{
						"y": "160",
						"x": "59",
						"value": "29343",
						"red": "99"
					},
					{
						"y": "200",
						"x": "62",
						"value": "34488",
						"red": ""
					},
					{
						"y": "240",
						"x": "65",
						"value": "39913",
						"red": ""
					},
					{
						"y": "280",
						"x": "67",
						"value": "45207",
						"red": ""
					},
					{
						"y": "320",
						"x": "68",
						"value": "50601",
						"red": ""
					},
					{
						"y": "360",
						"x": "69",
						"value": "55716",
						"red": ""
					},
					{
						"y": "400",
						"x": "71",
						"value": "60931", 
						"red": ""
					},
					{
						"y": "440",
						"x": "72",
						"value": "66015",
						"red": ""
					},
					{
						"y": "480",
						"x": "72",
						"value": "71320",
						"red": ""
					},
					{
						"y": "520",
						"x": "73",
						"value": "76742",
						"red": ""
					}
				]
			}
		);
	</script>



@endpush

@push('scripts-OFF')
	<script type="text/javascript">
		$('#my-box').boxWidget({
		  animationSpeed: 500,
		  collapseTrigger: '#my-collapse-button-trigger',
		  removeTrigger: '#my-remove-button-trigger',
		  collapseIcon: 'fa-minus',
		  expandIcon: 'fa-plus',
		  removeIcon: 'fa-times'
		});
		// $('#my-box-widget').boxWidget('toggle')
	</script>
@endpush

@prepend('scripts') @endprepend