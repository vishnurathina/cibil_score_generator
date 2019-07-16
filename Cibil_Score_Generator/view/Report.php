<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Report</title>

    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        #myChart {
            height: 100%;
            width: 100%;
            min-height: 100px;
        }

        .zc-ref {
            display: none;
        }

        zing-grid[loading] {
            height: 500px;
        }
    </style>
</head>

<body>
  <h3 align="center"> Report </h3>
  <div align="center">
  <?php
   require_once '../controller/Control.php';
   echo "</h5>"."Your Score ". $score."</h5>"."<br>"."<br>";
 //echo'h';


    foreach($user as $x => $x_value) {
  echo "<b>". $x."</b>"." : "  . $x_value;
  echo "<br>";
}?>
</div>
   <div id='myChart'><a class="zc-ref" href="https://www.zingchart.com/">Charts by ZingChart</a></div>
   <input type="button" id="create_pdf" value="Generate PDF" onclick="window.print()">


    <script>
        ZC.LICENSE = ["b55b025e438fa8a98e32482b5f768ff5"];
        window.feed = function(callback) {
            var tick = {};
            var s=<?php echo $score;?>;
            tick.plot0 = s ;
            callback(JSON.stringify(tick));
        };

        var myConfig = {
            type: "gauge",
            globals: {
                fontSize: 25
            },
            plotarea: {
                marginTop: 80
            },
            plot: {
                size: '100%',
                valueBox: {
             	    placement: 'center',
             	    text:'%v', //default
             	    fontSize:35,
             	    rules:[
             	      {
             	        rule: '%v >= 700',
             	        text: '%v<br>EXCELLENT'
             	      },
             	      {
             	        rule: '%v < 700 && %v >= 500',
             	        text: '%v<br>Good'
             	      },
             	      {
             	        rule: '%v < 500 && %v >= 400',
             	        text: '%v<br>Fair'
             	      },
             	      {
             	        rule: '%v <  400',
             	        text: '%v<br>Bad'
                        }
                    ]
                }
            },
            tooltip: {
                borderRadius: 2
            },
            scaleR: {
                aperture: 180,
                minValue:300,
            	  maxValue:900,
            	  step:100,
                center: {
                    visible: false
                },
                tick: {
                    visible: false
                },
                item: {
                    offsetR: 0,
                    rules: [{
                        rule: '%i == 9',
                        offsetX: 15
                    }]
                },
                labels: [],
                ring: {
                    size: 50,
                    rules: [{
                      rule:'%v <= 400',
                      backgroundColor:'red'
                    },
                    {
                      rule:'%v > 400 && %v <= 500',
                      backgroundColor:'yellow'
                    },
                    {
                      rule:'%v >500 && %v <= 700',
                      backgroundColor:'lime'
                    },
                    {
                      rule:'%v > 700',
                      backgroundColor:'darkgreen'
                        }
                    ]
                }
            },
            refresh: {
                type: "feed",
                transport: "js",
                url: "feed()",
                interval: 1500,
                resetTimeout: 1000
            },
            series: [{
                values: [755], // starting value
                backgroundColor: 'darkslategray',
                indicator: [10, 10, 10, 10, 0.75],
                animation: {
                    effect: 2,
                    method: 1,
                    sequence: 4,
                    speed: 900
                },
            }]
        };

        zingchart.render({
            id: 'myChart',
            data: myConfig,
            height: 500,
            width: '100%'
        });
    </script>

</body>

</html>
