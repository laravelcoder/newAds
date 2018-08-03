@extends('layouts.adashboard')

@push('pagestyle')
<!-- Styles -->
<style>
#chartdiv {
	width: 100%;
	height: 500px;
}
</style>

@endpush

@section('content')
    <h3 class="page-title">@lang('global.ads-dashboard.title')</h3>
    
    <p>
        {{ trans('global.app_custom_controller_index') }} 
    </p>
<div class="col-md-1"></div>
<div class="col-md-10">
<div id="highcharts-767b7fd1-956c-4f66-93fd-d2d060e7f849"></div>

</div>
<div class="col-md-1"></div>
<hr style="clear:both" />
    <!-- HTML -->
    <br style="clear:both" />
{{-- <div id="chartdiv" style="background:#fff;""></div> --}}

@stop

@push('topscripts')
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
{{-- https://www.amcharts.com/demos/duration-on-value-axis/ --}}
<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "legend": {
        "equalWidths": false,
        "useGraphSettings": true,
        "valueAlign": "left",
        "valueWidth": 120
    },
    // "cid":"",
    // "channel":"563",
    // "nid":"",
    // "network":"FOODHD",
    // "time":"",
    // "afid":"55",
    // "affiliate":"KSL",
    // "duration":29.55,
    // "cypid":"",
    // "clip": "AD_FOODHD_20180601-001016",
    // "advid":"",

    "dataProvider": [{
        "date": "2012-01-01",
        "distance": 1227,
        "channelid": "HBO",
        "channel": "HBO",
        "townSize": 25,
        "latitude": 40.71,
        "duration": 408
    }, {
        "date": "2012-01-02",
        "distance": 371,
        "channelid": "Washington",
        "channel": "",
        "townSize": 14,
        "latitude": 38.89,
        "duration": 482
    }, {
        "date": "2012-01-03",
        "distance": 433,
        "channelid": "Wilmington",
        "channel": "",
        "townSize": 6,
        "latitude": 34.22,
        "duration": 562
    }, {
        "date": "2012-01-04",
        "distance": 345,
        "channelid": "Jacksonville",
        "channel": "",
        "townSize": 7,
        "latitude": 30.35,
        "duration": 379
    }, {
        "date": "2012-01-05",
        "distance": 480,
        "channelid": "Miami",
        "channelid2": "Miami",
        "townSize": 10,
        "latitude": 25.83,
        "duration": 501
    }, {
        "date": "2012-01-06",
        "distance": 386,
        "channelid": "Tallahassee",
        "channel": "",
        "channel": "",
        "townSize": 7,
        "latitude": 30.46,
        "duration": 443
    }, {
        "date": "2012-01-07",
        "distance": 348,
        "channelid": "New Orleans",
        "channel": "",
        "channel": "",
        "townSize": 10,
        "latitude": 29.94,
        "duration": 405
    }, {
        "date": "2012-01-08",
        "distance": 238,
        "channelid": "Houston",
        "channel": "Houston",
        "townSize": 16,
        "latitude": 29.76,
        "duration": 309
    }, {
        "date": "2012-01-09",
        "distance": 218,
        "channelid": "Dallas",
        "channel": "",
        "townSize": 17,
        "latitude": 32.8,
        "duration": 287
    }, {
        "date": "2012-01-10",
        "distance": 349,
        "channelid": "Oklahoma City",
        "channel": "",
        "townSize": 11,
        "latitude": 35.49,
        "duration": 485
    }, {
        "date": "2012-01-11",
        "distance": 603,
        "channelid": "Kansas City",
        "channel": "",
        "townSize": 10,
        "latitude": 39.1,
        "duration": 890
    }, {
        "date": "2012-01-12",
        "distance": 534,
        "channelid": "Denver",
        "channel": "Denver",
        "townSize": 18,
        "latitude": 39.74,
        "duration": 810
    }, {
        "date": "2012-01-13",
        "channelid": "Salt Lake City",
        "channel": "",
        "townSize": 12,
        "distance": 425,
        "duration": 670,
        "latitude": 40.75,
        "dashLength": 8,
        "alpha": 0.4
    }, {
        "date": "2012-01-14",
        "latitude": 36.1,
        "duration": 470,
        "channelid": "Las Vegas",
        "channel": ""
    }, {
        "date": "2012-01-15"
    }, {
        "date": "2012-01-16"
    }, {
        "date": "2012-01-17"
    }, {
        "date": "2012-01-18"
    }, {
        "date": "2012-01-19"
    }],
    "valueAxes": [{
        "id": "distanceAxis",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left",
        "title": "distance"
    }, {
        "id": "latitudeAxis",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "labelsEnabled": false,
        "position": "right"
    }, {
        "id": "durationAxis",
        "duration": "mm",
        "durationUnits": {
            "hh": "h ",
            "mm": "min"
        },
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "position": "right",
        "title": "duration"
    }],
    "graphs": [{
        "alphaField": "alpha",
        "balloonText": "[[value]] miles",
        "dashLengthField": "dashLength",
        "fillAlphas": 0.7,
        "legendPeriodValueText": "total: [[value.sum]] mi",
        "legendValueText": "[[value]] mi",
        "title": "distance",
        "type": "column",
        "valueField": "distance",
        "valueAxis": "distanceAxis"
    }, {
        "balloonText": "latitude:[[value]]",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "useLineColorForBulletBorder": true,
        "bulletColor": "#FFFFFF",
        "bulletSizeField": "townSize",
        "dashLengthField": "dashLength",
        "descriptionField": "channelid",
        "labelPosition": "right",
        "labelText": "[[channel]]",
        "legendValueText": "[[value]]/[[description]]",
        "title": "latitude/city",
        "fillAlphas": 0,
        "valueField": "latitude",
        "valueAxis": "latitudeAxis"
    }, {
        "bullet": "square",
        "bulletBorderAlpha": 1,
        "bulletBorderThickness": 1,
        "dashLengthField": "dashLength",
        "legendValueText": "[[value]]",
        "title": "duration",
        "fillAlphas": 0,
        "valueField": "duration",
        "valueAxis": "durationAxis"
    }],
    "chartCursor": {
        "categoryBalloonDateFormat": "DD",
        "cursorAlpha": 0.1,
        "cursorColor":"#000000",
         "fullWidth":true,
        "valueBalloonsEnabled": false,
        "zoomable": false
    },
    "dataDateFormat": "YYYY-MM-DD",
    "categoryField": "date",
    "categoryAxis": {
        "dateFormats": [{
            "period": "DD",
            "format": "DD"
        }, {
            "period": "WW",
            "format": "MMM DD"
        }, {
            "period": "MM",
            "format": "MMM"
        }, {
            "period": "YYYY",
            "format": "YYYY"
        }],
        "parseDates": true,
        "autoGridCount": false,
        "axisColor": "#555555",
        "gridAlpha": 0.1,
        "gridColor": "#FFFFFF",
        "gridCount": 50
    },
    "export": {
        "enabled": true
     }
});
</script>
<script>
(function() {
    var files = ["https://code.highcharts.com/stock/highstock.js", "https://code.highcharts.com/highcharts-more.js", "https://code.highcharts.com/highcharts-3d.js", "https://code.highcharts.com/modules/data.js", "https://code.highcharts.com/modules/exporting.js", "http://code.highcharts.com/modules/funnel.js", "http://code.highcharts.com/modules/solid-gauge.js"],
        loaded = 0;
    if (typeof window["HighchartsEditor"] === "undefined") {
        window.HighchartsEditor = {
            ondone: [cl],
            hasWrapped: false,
            hasLoaded: false
        };
        include(files[0]);
    } else {
        if (window.HighchartsEditor.hasLoaded) {
            cl();
        } else {
            window.HighchartsEditor.ondone.push(cl);
        }
    }

    function isScriptAlreadyIncluded(src) {
        var scripts = document.getElementsByTagName("script");
        for (var i = 0; i < scripts.length; i++) {
            if (scripts[i].hasAttribute("src")) {
                if ((scripts[i].getAttribute("src") || "").indexOf(src) >= 0 || (scripts[i].getAttribute("src") === "http://code.highcharts.com/highcharts.js" && src === "https://code.highcharts.com/stock/highstock.js")) {
                    return true;
                }
            }
        }
        return false;
    }

    function check() {
        if (loaded === files.length) {
            for (var i = 0; i < window.HighchartsEditor.ondone.length; i++) {
                try {
                    window.HighchartsEditor.ondone[i]();
                } catch (e) {
                    console.error(e);
                }
            }
            window.HighchartsEditor.hasLoaded = true;
        }
    }

    function include(script) {
        function next() {
            ++loaded;
            if (loaded < files.length) {
                include(files[loaded]);
            }
            check();
        }
        if (isScriptAlreadyIncluded(script)) {
            return next();
        }
        var sc = document.createElement("script");
        sc.src = script;
        sc.type = "text/javascript";
        sc.onload = function() {
            next();
        };
        document.head.appendChild(sc);
    }

    function each(a, fn) {
        if (typeof a.forEach !== "undefined") {
            a.forEach(fn);
        } else {
            for (var i = 0; i < a.length; i++) {
                if (fn) {
                    fn(a[i]);
                }
            }
        }
    }
    var inc = {},
        incl = [];
    each(document.querySelectorAll("script"), function(t) {
        inc[t.src.substr(0, t.src.indexOf("?"))] = 1;
    });

    function cl() {
        if (typeof window["Highcharts"] !== "undefined") {
            var options = {
                "title": {
                    "text": "My Chart"
                },
                "subtitle": {
                    "text": "My Untitled Chart"
                },
                "exporting": {},
                "yAxis": [{
                    "title": {}
                }],
                "chart": {},
                "series": [{
                    "name": "GPR",
                    "_colorIndex": 0,
                    "_symbolIndex": 0
                }],
                "plotOptions": {
                    "series": {
                        "animation": false
                    }
                },
                "data": {
                    "csv": "\"REACH\";\" GPR\"\n32;40\n46;80\n54;140\n59;160\n62;200\n65;240\n67;280\n68;320\n69;360\n71;400\n72;440\n72;480\n73;520",
                    "googleSpreadsheetKey": false,
                    "googleSpreadsheetWorksheet": false
                }
            };
            new Highcharts.Chart("highcharts-767b7fd1-956c-4f66-93fd-d2d060e7f849", options);
        }
    }
})();



    
// (function(){ var files = ["https://code.highcharts.com/stock/highstock.js","https://code.highcharts.com/highcharts-more.js","https://code.highcharts.com/highcharts-3d.js","https://code.highcharts.com/modules/data.js","https://code.highcharts.com/modules/exporting.js","http://code.highcharts.com/modules/funnel.js","http://code.highcharts.com/modules/solid-gauge.js"],loaded = 0; if (typeof window["HighchartsEditor"] === "undefined") {window.HighchartsEditor = {ondone: [cl],hasWrapped: false,hasLoaded: false};include(files[0]);} else {if (window.HighchartsEditor.hasLoaded) {cl();} else {window.HighchartsEditor.ondone.push(cl);}}function isScriptAlreadyIncluded(src){var scripts = document.getElementsByTagName("script");for (var i = 0; i < scripts.length; i++) {if (scripts[i].hasAttribute("src")) {if ((scripts[i].getAttribute("src") || "").indexOf(src) >= 0 || (scripts[i].getAttribute("src") === "http://code.highcharts.com/highcharts.js" && src === "https://code.highcharts.com/stock/highstock.js")) {return true;}}}return false;}function check() {if (loaded === files.length) {for (var i = 0; i < window.HighchartsEditor.ondone.length; i++) {try {window.HighchartsEditor.ondone[i]();} catch(e) {console.error(e);}}window.HighchartsEditor.hasLoaded = true;}}function include(script) {function next() {++loaded;if (loaded < files.length) {include(files[loaded]);}check();}if (isScriptAlreadyIncluded(script)) {return next();}var sc=document.createElement("script");sc.src = script;sc.type="text/javascript";sc.onload=function() { next(); };document.head.appendChild(sc);}function each(a, fn){if (typeof a.forEach !== "undefined"){a.forEach(fn);}else{for (var i = 0; i < a.length; i++){if (fn) {fn(a[i]);}}}}var inc = {},incl=[]; each(document.querySelectorAll("script"), function(t) {inc[t.src.substr(0, t.src.indexOf("?"))] = 1; }); function cl() {if(typeof window["Highcharts"] !== "undefined"){var options={"title":{"text":"My Chart"},"subtitle":{"text":"My Untitled Chart"},"exporting":{},"yAxis":[{"title":{}}],"chart":{},"series":[{"name":"GPR","_colorIndex":0,"_symbolIndex":0}],"plotOptions":{"series":{"animation":false}},"data":{"csv":"\"REACH\";\" GPR\"\n32;40\n46;80\n54;140\n59;160\n62;200\n65;240\n67;280\n68;320\n69;360\n71;400\n72;440\n72;480\n73;520","googleSpreadsheetKey":false,"googleSpreadsheetWorksheet":false}};new Highcharts.Chart("highcharts-767b7fd1-956c-4f66-93fd-d2d060e7f849", options);}}})();
</script>
@endpush


@push('scripts')
@endpush



