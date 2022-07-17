<?php 
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
        header("location: index.php");
        exit;
    }
    else{
        //make sure that this person has user privileges
        if($_SESSION["admin"] == true){
            header("location: admin.php");
            exit;
        }
    }
?>

<!doctype html>
<html class="zc-html">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>

    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABI//8ASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AEj//wAAAAAAAAAAAAAAAAAAAAAASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AAAAAAAAAAAAAAAAAEj//wBI//+Pj4+Qj4+PkI+Pj5CPj4+Qj4+PkI+Pj5CPj4+Qj4+PkI+Pj5CPj4+QAEj//wBI//8AAAAAAAAAAABI//8ASP//j4+PkP///////////////////////////////////////////////wBI//8ASP//AAAAAAAAAAAASP//AEj//4+Pj5D/////Mo8A//////8AgP///////+OrKf//////AAD///////8ASP//AEj//wAAAAAAAAAAAEj//wBI//+Pj4+Q/////zKPAP//////AID////////jqyn//////wAA////////AEj//wBI//8AAAAAAAAAAABI//8ASP//j4+PkP////8yjwD//////wCA////////46sp//////8AAP///////wBI//8ASP//AAAAAAAAAAAASP//AEj//4+Pj5D/////Mo8A//////8AgP//////////////////AAD///////8ASP//AEj//wAAAAAAAAAAAEj//wBI//+Pj4+Q////////////////AID//////////////////wAA////////AEj//wBI//8AAAAAAAAAAABI//8ASP//j4+PkP///////////////wCA//////////////////8AAP///////wBI//8ASP//AAAAAAAAAAAASP//AEj//4+Pj5D/////////////////////////////////////AAD///////8ASP//AEj//wAAAAAAAAAAAEj//wBI//+Pj4+Q////////////////////////////////////////////////AEj//wBI//8AAAAAAAAAAAAAAAAASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AAAAAAAAAAAAAAAAAAAAAABI//8ASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AEj//wBI//8ASP//AEj//wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//8AAIAHAACAAwAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAgAEAAMABAADgAQAA//8AAA==" rel="icon" type="image/x-icon" />

    <script nonce="undefined" src="https://cdn.zinggrid.com/dev/zinggrid-dev.min.js"></script>
    <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src="getData.js"></script>
    <style>
        * {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif
        }

        #loadTime{
            margin-top: 20px;
            margin-bottom: 20px;
            margin: auto;
            padding-bottom: 20px;
        }

        #gridTitle{
            background: rgb(238, 238, 238);
            margin: auto;
            text-align: center;
            border-style: solid;
            margin-left: 50px;
            margin-right: 50px;
        }

        .kk {
            width: auto;
            height: 8vh;
            flex: 0;
        }

        ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        
        li a:hover {
            background-color: #111;
        }

        main {
            padding-top: 3%;
        }


        .zc-body {
            background: rgb(238, 238, 238);
        }

        .container {
            display: flex;
            justify-content: space-evenly;
            margin-bottom: 20px;
        }

        .chart--container {
            height: 100%;
            width: 40%;
            min-height: 400px;
        }

        .chart {
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: 100%;
            width: 90%;
            min-height: 400px;
            margin-bottom: 15px;
        }

        .zc-ref {
            display: none;
        }

        zing-grid {
            width: 90%;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            border: none;
            font-size: 14px;
            color: #212121;
            border: 1px solid #ddd;
            opacity: 1;
        }

        

        zing-grid.loading {
            opacity: 0;
            transition: opacity .3s ease-out;
        }

        zing-grid.loading * {
            opacity: 0;
        }

        zg-caption {
            background: rgb(238, 238, 238);
            color: #222222;
            padding: 0px 15px;
            font-size: 20px;
        }

        zg-head {
            letter-spacing: .5px;
            padding-left: 1px;
        }

        zg-head,
        zg-head-cell {
            font-size: 10px;
            align-items: middle;
            color: #888888;
        }

        zg-cell {
            margin-right: 0px;
        }

        zg-head-cell:first-child,
        zg-cell:first-child {
            border-left: 0px solid white;
        }

        zg-icon {
            max-width: 14px;
        }

        zg-row,
        zg-cell {
            padding: 0 10px;
            height: 35px !important;
        }

        zg-cell:nth-child(1) img {
            vertical-align: middle;
        }

        zg-cell:nth-child(1) span {
            vertical-align: middle;
        }

        .zc-body .user--avatar {
            width: 20px;
            margin-right: 7px;
        }

        .zc-body .recent {
            color: #69B668;
        }

        .zc-body .unknown {
            color: #ACAAAE;
        }

        zg-filter input {
            margin-left: 7px;
        }

        zing-grid[loading] {
            height: 515px;
        }

        .report {
            display: flex;
            justify-content:center;
            padding-bottom: 15px;
        }
    </style>
</head>

<body class="zc-body">
    <header>
        <ul>
            <li> <a href="logout.php">Logout</a> </li>
        </ul>
    </header>
    <main>
    <zg-caption>
            <h1 id="gridTitle">Recent Users</h1>
        </zg-caption>
        <zing-grid  id="thisZing" data='[
        {
          "name": "Philip J. Fry",
          "origin": "Earth"
        },
        {
          "name": "Turanga Leela",
          "origin": "Earth"
        },
        {
          "name": "Bender Bending Rodriguez",
          "origin": "Earth"
        },
        {
          "name": "Amy Wong",
          "origin": "Mars"
        },
        {
          "name": "Doctor John Zoidberg",
          "origin": "Decapod 10"
        },
        {
          "name": "Lord Nibbler",
          "origin": "Earth"
        }
      ]' pager sort gridlines="both" page-size="10" page-size-options="5,10,20"
            class="loading" layout="row" layout-controls="disabled">
        </zing-grid>
        <div class="container">
            <div id="userSess" class="chart--container">
                <a href="https://www.zingchart.com/" rel="noopener" class="zc-ref">Powered by ZingChart</a>
            </div>
            <div id="siteVisitsChart" class="chart--container"></div>
        </div>
        <div id="loadTime" class="chart--container">
            <a href="https://www.zingchart.com/" rel="noopener" class="zc-ref">Powered by ZingChart</a>
        </div>
        <a href="loadTime.html" class="report">Load Time Report</a>
    </main>

    <script>

        var myTheme = {
            palette: {
                vbar: [
                    ['#FBFCFE', '#0082c6'],
                ],
                line: [
                    ['#FBFCFE', '#1a3e88'],
                    ['#FBFCFE', '#fb535d'],
                ]
            },
            graph: {
                backgroundColor: '#FBFCFE',
            }
        };

        var myTheme2 = {
            palette: {
                vbar: [
                    ['#FBFCFE', '#ab3a8e'],
                ]
            },
            graph: {
                backgroundColor: '#FBFCFE',
            }
        };

        // USER SESSION LENGTH CHART
        fetch('https://krustykrew.site/api/activity', {
            method: 'GET',
        })
            .then(response => response.json())
            .then(async data => {
                var jsonData = data;

                function toSeconds(str) {
                    var p = str.split(':');
                    var s = 0;
                    var m = 1;

                    if (str[0] == 0) {
                        s += 86400;
                    }

                    while (p.length > 0) {
                        s += m * parseInt(p.pop(), 10);
                        m *= 60;
                    }


                    return s;
                }

                var enterTime = [];
                var exitTime = [];
                var count = 0;
                for (var i = 0; i < jsonData.length; i++) {
                    enterTime[i] += jsonData[i].enterTime;
                    exitTime[i] += jsonData[i].exitTime;
                }

                enterTime = enterTime.map(function (d) {
                    return d.replace('undefined', '');
                });
                exitTime = exitTime.map(function (d) {
                    return d.replace('undefined', '');
                });

                for (var i = 0; i < enterTime.length; i++) {
                    enterTime[i] += '_' + toSeconds(enterTime[i]);
                    enterTime[i] = enterTime[i].substring(enterTime[i].indexOf("_") + 1);
                    exitTime[i] += '_' + toSeconds(exitTime[i]);
                    exitTime[i] = exitTime[i].substring(exitTime[i].indexOf("_") + 1);
                }


                var total = [];
                for (var i = 0; i < enterTime.length; i++) {
                    total[i] = Math.round(exitTime[i] - enterTime[i]);
                }

                var zeroToTwenty = 0;
                var twentyToFourty = 0;
                var fourtyToSixty = 0;
                var sixtyToEighty = 0;
                var eightyToHundred = 0;
                var hundredToOneTwenty = 0;
                var oneTwentyAndAbove = 0;

                for (var i = 0; i < total.length; i++) {
                    if (total[i] >= 0 && total[i] < 20) {
                        zeroToTwenty++;
                    }
                    if (total[i] >= 20 && total[i] < 40) {
                        twentyToFourty++;
                    }
                    if (total[i] >= 40 && total[i] < 60) {
                        fourtyToSixty++;
                    }
                    if (total[i] >= 60 && total[i] < 80) {
                        sixtyToEighty++;
                    }
                    if (total[i] >= 80 && total[i] < 100) {
                        eightyToHundred++;
                    }
                    if (total[i] >= 100 && total[i] < 120) {
                        hundredToOneTwenty++;
                    }
                    if (total[i] >= 120) {
                        oneTwentyAndAbove++;
                    }

                }

                var t = 0;
                for (var i = 0; i < total.length; i++) {
                    t += total[i];
                }
                var avg = t / total.length;

                ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];

                let userSessChartConfig = {
                    type: 'bar',
                    title: {
                        text: 'Length of User Visits'
                    },
                    plot: {
                        tooltip: {
                            visible: false
                        },
                        cursor: 'hand'
                    },
                    scaleX: {
                        markers: [],
                        offsetend: '75px',
                        values: ["0-20", "20-40", "40-60", "60-80", "80-100", "100-120", "120+"],
                        label: { text: "Time(s)" }
                    },
                    scaleY: {
                        values: '0:10:2',
                        label: { text: "Users" }

                    },
                    crosshairX: {},
                    series: [{
                        text: 'Number of Users',
                        values: [zeroToTwenty, twentyToFourty, fourtyToSixty, sixtyToEighty, eightyToHundred, hundredToOneTwenty, oneTwentyAndAbove]
                    }
                    ]
                };

                zingchart.render({
                    id: 'userSess',
                    data: userSessChartConfig,
                    height: '100%',
                    width: '100%',
                    defaults: myTheme,
                });

            })

        // SITE VISITS PER HOUR CHART
        fetch('https://krustykrew.site/api/activity', {
            method: 'GET',
        })
            .then(response => response.json())
            .then(async data => {
                var jsonData = data;

                var clicks = [];
                var move = [];

                for (var i = 0; i < jsonData.length; i++) {
                    clicks[i] += jsonData[i].clickInd;
                    move[i] += jsonData[i].moveInd;
                }

                clicks = clicks.map(function (d) {
                    return d.replace('undefined', '');
                });
                move = move.map(function (d) {
                    return d.replace('undefined', '');
                });

                var enterTime = [];
                var i = 0;
                var twelveAM, oneAM, twoAM, threeAM, fourAM, fiveAM, sixAM, sevenAM, eightAM, nineAM, tenAM, elevenAM, twelvePM, onePM, twoPM, threePM, fourPM, fivePM, sixPM, sevenPM, eightPM, ninePM, tenPM, elevenPM;
                twelveAM = oneAM = twoAM = threeAM = fourAM = fiveAM = sixAM = sevenAM = eightAM = nineAM = tenAM = elevenAM = twelvePM = onePM = twoPM = threePM = fourPM = fivePM = sixPM = sevenPM = eightPM = ninePM = tenPM = elevenPM = 0;
                for (i = 0; i < jsonData.length; i++) {
                    //var enter = jsonData[i].enterTime;
                    //var split = enter.split(':');
                    var c = jsonData[i].enterTime.split(':');
                    enterTime[i] += c[0];
                    //if(jsonData[i].enterTime[0] == '0') twelveAM++;
                }

                var enterTime = enterTime.map(function (d) {
                    return d.replace('undefined', '');
                });

                for (i = 0; i < enterTime.length; i++) {
                    if (enterTime[i] == "0") twelveAM++;
                    else if (enterTime[i] == "1") oneAM++;
                    else if (enterTime[i] == "2") twoAM++;
                    else if (enterTime[i] == "3") threeAM++;
                    else if (enterTime[i] == "4") fourAM++;
                    else if (enterTime[i] == "5") fiveAM++;
                    else if (enterTime[i] == "6") sixAM++;
                    else if (enterTime[i] == "7") sevenAM++;
                    else if (enterTime[i] == "8") eightAM++;
                    else if (enterTime[i] == "9") nineAM++;
                    else if (enterTime[i] == "10") tenAM++;
                    else if (enterTime[i] == "11") elevenAM++;
                    else if (enterTime[i] == "12") twelvePM++;
                    else if (enterTime[i] == "13") onePM++;
                    else if (enterTime[i] == "14") twoPM++;
                    else if (enterTime[i] == "15") threePM++;
                    else if (enterTime[i] == "16") fourPM++;
                    else if (enterTime[i] == "17") fivePM++;
                    else if (enterTime[i] == "18") sixPM++;
                    else if (enterTime[i] == "19") sevenPM++;
                    else if (enterTime[i] == "20") eightPM++;
                    else if (enterTime[i] == "21") ninePM++;
                    else if (enterTime[i] == "22") tenPM++;
                    else if (enterTime[i] == "23") elevenPM++;
                }

                ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
                var siteVisitsConfig = {
                    type: "line",
                    title: {
                        text: 'Number of Site Visits per Hour'
                    },

                    scaleY: {
                        markers: [],
                        values: "0:10:1",
                        label: { text: "Users" },
                    },
                    scaleX: {
                        markers: [],
                        labels: [],
                        values: "0:23:1",
                        label: { text: "Time(24H)" },
                    },
                    series: [{
                        values: [twelveAM, oneAM, twoAM, threeAM, fourAM, fiveAM, sixAM, sevenAM, eightAM, nineAM, tenAM, elevenAM, twelvePM, onePM, twoPM, threePM, fourPM, fivePM, sixPM, sevenPM, eightPM, ninePM, tenPM, elevenPM]
                    }
                    ]
                };

                zingchart.render({
                    id: 'siteVisitsChart',
                    data: siteVisitsConfig,
                    height: "100%",
                    width: "100%",
                    defaults: myTheme2,
                });
            })


        // SITE PERFORMANCE CHART

        fetch('https://krustykrew.site/api/performance', {
            method: 'GET',
        })
            .then(response => response.json())
            .then(async data => {
                var jsonData = data;

                var loadTime = [];
                //var exitTime = [];
                var count = 0;
                console.log(jsonData.length);
                for (var i = 0; i < jsonData.length; i++) {
                    loadTime.push(jsonData[i].domContentLoadedEventStart);
                    console.log(loadTime[i]);
                }

                /*enterTime = enterTime.map(function (d) {
                    return d.replace('undefined', '');
                });
                exitTime = exitTime.map(function (d) {
                    return d.replace('undefined', '');
                });*/

                /*for (var i = 0; i < enterTime.length; i++) {
                    enterTime[i] += '_' + toSeconds(enterTime[i]);
                    enterTime[i] = enterTime[i].substring(enterTime[i].indexOf("_") + 1);
                    exitTime[i] += '_' + toSeconds(exitTime[i]);
                    exitTime[i] = exitTime[i].substring(exitTime[i].indexOf("_") + 1);
                }*/


                /*var total = [];
                for (var i = 0; i < enterTime.length; i++) {
                    total[i] = Math.round(exitTime[i] - enterTime[i]);
                }*/

                var zeroToTwoHundred = 0;
                var twoHundredToFourHundred = 0;
                var fourHundredToSixHundredSixty = 0;
                var sixHundredToEightHundredEighty = 0;
                var eightHundredPlus = 0;

                for (var i = 0; i < loadTime.length; i++) {
                    if (loadTime[i] >= 0 && loadTime[i] < 200) {
                        zeroToTwoHundred++;
                    }
                    if (loadTime[i] >= 200 && loadTime[i] < 400) {
                        twoHundredToFourHundred++;
                    }
                    if (loadTime[i] >= 400 && loadTime[i] < 600) {
                        fourHundredToSixHundredSixty++;
                    }
                    if (loadTime[i] >= 600 && loadTime[i] < 800) {
                        sixHundredToEightHundredEighty++;
                    }

                    if (loadTime[i] >= 800) {
                        eightHundredPlus++;
                    }

                }

                var t = 0;
                for (var i = 0; i < loadTime.length; i++) {
                    t += loadTime[i];
                }
                var avg = t / loadTime.length;

                ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];

                let test = {
                    type: 'bar',
                    title: {
                        text: 'Load Times'
                    },
                    plot: {
                        tooltip: {
                            visible: false
                        },
                        cursor: 'hand'
                    },
                    scaleX: {
                        markers: [],
                        offsetend: '75px',
                        values: ["0-200", "200-400", "400-600", "600-800", "800+"],
                        label: { text: "Time(s)" }
                    },
                    scaleY: {
                        values: '0:10:2',
                        label: { text: "Users" }

                    },
                    crosshairX: {},
                    series: [{
                        text: 'Number of Users',
                        values: [zeroToTwoHundred, twoHundredToFourHundred, fourHundredToSixHundredSixty, sixHundredToEightHundredEighty, eightHundredPlus]
                    }
                    ]
                };

                zingchart.render({
                    id: 'loadTime',
                    data: test,
                    height: '100%',
                    width: '100%',
                    defaults: myTheme,
                });

            })

        // STATIC DATA GRID
        const zgLoaded = document.querySelector('zing-grid');
        zgLoaded.addEventListener('grid:ready', () => {
            setTimeout(() => zgLoaded.classList.remove('loading'), 0);
        });

    </script>
    <script src="setData.js"></script>
</body>

</html>
