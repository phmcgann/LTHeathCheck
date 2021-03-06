<!-- BEGIN PAGE CONTENT -->
<div class="rightpanel">

    <ul class="breadcrumbs">
        <li><a href="dashboard.html"></a> <span class="separator"></span></li>
        <li>Dashboard</li>

    </ul>

    <div class="pageheader">
        <form action="results.html" method="post" class="searchbar">
            <input type="text" name="keyword" placeholder="To search type and hit enter..." />
        </form>
        <div class="pageicon"><span class="iconfa-laptop"></span></div>
        <div class="pagetitle">
            <h5>All Features Summary</h5>
            <h1>Dashboard</h1>
            <?php $CoName = Configure::read('Location'); ?>
        </div>
    </div><!--pageheader-->
    <div class="maincontent">
        <div class="maincontentinner">
            <div class="row-fluid">
                <div class="page-content">
                    <div class="container-fluid">



                        <div class="row">
                            <div class="col-lg-3">

                                <!-- BEGIN TODAY VISITOR TILES -->
                                <div class="panel panel-danger panel-square panel-no-border text-center">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Total Managed Computers</h3>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="bolded tiles-number text-danger"><?php echo $this->Number->format($compCount[0][0]['count(*)'],
                    array('places' => '0', 'before' => '', 'thousands' => ',')); ?></h1>
                                        <p class="text-muted"><small>TOTAL REACH <strong>25%</strong></small></p>
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel panel-success panel-block-color -->
                                <!-- END TODAY VISITOR TILES -->

                            </div><!-- /.col-sm-6 -->
                            <div class="col-lg-3">

                                <!-- BEGIN TODAY VISITOR TILES -->
                                <div class="panel panel-warning panel-square panel-no-border text-center">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Total Managed Clients</h3>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="bolded tiles-number text-warning"><?php echo $this->Number->format($clientCount[0][0]['count(Clients.clientid)'],
                    array('places' => '0', 'before' => '', 'thousands' => ',')); ?></h1>
                                        <p class="text-muted"><small>Last List <strong>221</strong></small></p>
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel panel-success panel-block-color -->
                                <!-- END TODAY VISITOR TILES -->

                            </div><!-- /.col-sm-6 -->
                            <div class="col-lg-3">

                                <!-- BEGIN TODAY VISITOR TILES -->
                                <div class="panel panel-success panel-square panel-no-border text-center">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Total Open Tickets</h3>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="bolded tiles-number text-success"><?php echo $this->Number->format($ticketCount[0][0]['count(*)'],
                    array('places' => '0', 'before' => '', 'thousands' => ',')); ?></h1>
                                        <p class="text-muted"><small>Last Count <strong>221,202</strong></small></p>
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel panel-success panel-block-color -->
                                <!-- END TODAY VISITOR TILES -->

                            </div><!-- /.col-sm-6 -->
                            <div class="col-lg-3">

                                <!-- BEGIN TODAY VISITOR TILES -->
                                <div class="panel panel-warning panel-square panel-no-border text-center">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Total Offline Machines</h3>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="bolded tiles-number text-warning"><?php echo $offlineCount[0][0]['count']; ?></h1>
                                        <p class="text-muted"><small>Last Check <strong>2 HOURS AGO</strong></small></p>
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel panel-success panel-block-color -->
                                <!-- END TODAY VISITOR TILES -->

                            </div><!-- /.col-sm-6 -->

                        </div><!-- /.row -->

                        <div class="row">
                            <div class="col-lg-4">


                                <div class="panel panel-default ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Agent Downloads</h3>
                                    </div>

                                    <div class="panel-body">



                                        <div style="padding: 10px;" class="google-maps-container">
                                            <div style="float: left;"
                                                 <ul>
                                                    <li><?php
            $loc = Configure::read('Location');
            echo $this->Html->link('LabTech Control Center',
                    'http://' . $loc . '/Labtech/Updates/ControlCenterInstaller.exe');
            ?> </li>
                                                    <li><?php echo $this->Html->link('Default Win Agent',
                    'http://' . $loc . '/Labtech/Deployment.aspx?probe=1'); ?></li>
                                                    <li><?php echo $this->Html->link('Default Linux Agent',
                    'http://' . $loc . '/Labtech/Deployment.aspx?probe=1&MSILocations=1&InstallType=linux'); ?></li>
                                                    <li><?php echo $this->Html->link('Default MAC Agent',
                    'http://' . $loc . '/Labtech/Deployment.aspx?probe=1&MSILocations=1&InstallType=mac'); ?></li>
                                                    <li>Default MSI Installer</li>
                                                </ul>


                                            </div>
                                            <div style="float: right;">
                                                <div class="panel form-control">
<?php echo $this->Form->create('Dashboard',
        array('action' => 'downloadAgent')); ?>
<?php echo $this->Form->select('Client.ClientID',
        $clientDrop,
        array('class' => 'select input-sm', 'empty' => ' --- SELECT CLIENT ---')); ?>
                                                    <br><br>

                                                    <?php echo $this->Form->select('Location.LocationID',
                                                            'location_id',
                                                            array('class' => 'select input-sm',
                                                        'empty' => ' --- SELECT LOCATION ---')); ?>
                                                    <br><br>
                                                    <select name='type' class="select input-sm">
                                                        <option>-- SELECT TYPE -- </option>
                                                        <option value='EXE'>Windows EXE</option>
                                                        <option value='msi'>Windows MSI</option>
                                                        <option value='linux'>Linux</option>
                                                        <option value='mac'>MAC</option>

                                                    </select>
                                                    <br><br>
<?php echo $this->Form->submit(); ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>





                                    </div>


                                </div>


                            </div><!-- /.col-sm-8 -->
                            <div class="col-lg-4">


                                <div class="panel panel-primary panel-square panel-no-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Traffic Map</h3>
                                    </div>
                                    <div class='panel-body'>
                                        <div class='google-maps-container'>
                                            <div id='map-canvas-4'></div>
                                        </div>
                                    </div>
                                </div><!-- /.panel panel-default panel-square panel-no-border -->
                                <!-- END CURRENCY RATES -->

                            </div><!-- /.col-sm-4 -->
                            <div class="col-lg-4">
                                <div class="panel panel-square panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-rss-square"></i> RSS Feed </h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                    </div>
                                </div>
                            </div>





                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <?php
                                if (!isset($ltserver[0]['computers']['TotalMemory'])) {
                                    $missing = true;
                                    $serverName = 'DEFAULT SERVER COMPUTER ID IS MISSING';
                                } else {
                                    // LT Server Calculations
                                    $totalMem = $ltserver[0]['computers']['TotalMemory'];
                                    $totalFree = $ltserver[0]['computers']['MemoryAvail'];
                                    $cpuUsage = $ltserver[0]['computers']['CPUUsage'];
                                    //$driveFree = $ltserver[0]['computers']['ComputerDriveFree'];
                                    //$driveSize = $ltserver[0]['computers']['ComputerDriveSize'];
                                    $serverName = $ltserver[0]['computers']['Name'];
                                    $missing = false;

                                    // $drive = (($driveSize - $driveFree) / $driveSize) * 100;
                                    $memUsed = $totalMem - $totalFree;
                                    $mem = (($totalMem - $totalFree) / $totalMem)
                                            * 100;
                                }
                                ?>
                                <!-- BEGIN SERVER STATUS WIDGET -->
                                <div class="panel panel-success panel-square panel-no-border">
                                    <div class="panel-heading lg">
                                        <h3 class="panel-title"><strong>LabTech Server Status - <?php echo $serverName; ?></strong></h3>
                                    </div>
                                    <div id="panel-chart-widget-1" style="padding: 10px;" class="collapse in">
                                        <div class="the-box no-border full bg-success no-margin">
                                            <div id="realtime-chart-widget">
                                                <div id="realtime-chart-container-widget"></div>
                                            </div><!-- /.realtime-chart -->
                                        </div><!-- /.the-box .no-border -->
                                        <div class="the-box no-border" style="padding-left: 25px;">
                                            <div class="row" >

                                                <?php
                                                if ($missing === true) {

                                                    echo "<div class='col-sm-6'> <div class='btn btn-danger'><h3> DEFAULT LABTECH SERVER IS MISSING</h3></div>"
                                                    . "<br> <div> Error Code: LTSVR - 10001<br>Fix: Missing proper ID for the Labtech Server</div>"
                                                    . "</div>";
                                                } else {
                                                    echo "
                                                <div class='col-sm-6'>
                                                    <div class='row'>
                                                        <div class='col-xs-6 text-center'>
                                                            <h4 class='small-heading'>Total Memory</h4>
                                                            
                                                        </div><!-- /.col-xs-6 -->
                                                        <div class='col-xs-6 text-center'>
                                                            <h4 class='small-heading'></h4>
                                                            <span class='chart chart-widget-pie widget-easy-pie-2' data-percent='85'>
                                                                <span class='percent'></span>
                                                            </span>
                                                        </div><!-- /.col-xs-6 -->
                                                    </div><!-- /.row -->
                                                    <hr />
                                                    <div class='row' style='padding-left: 45px;'>
                                                        <h3 >" . $memUsed . " / " . $totalMem . "  GB</h3>
                                                        ";
                                                    echo "
                                                    </div>

                                                </div><!-- /.col-sm-6 -->
                                                <div class='col-sm-6'>
                                                    <h4 class='small-heading'>System status</h4>
                                                    <p class='small'>Memory Usage - <span class='text-danger'>" . $this->Number->toPercentage($mem) . "</span></p>
                                                    <div class='progress no-rounded progress-xs'>
                                                        <div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='" . $this->Number->toPercentage($mem) . "' aria-valuemin='0' aria-valuemax='100' style='width: " . $this->Number->toPercentage($mem) . "'>
                                                        </div><!-- /.progress-bar .progress-bar-danger -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <p class='small'>CPU Usage - <span class='text-warning'>" . $this->Number->toPercentage($cpuUsage) . "</span></p>
                                                    <div class='progress no-rounded progress-xs'>
                                                        <div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow='65' aria-valuemin='0' aria-valuemax='100' style='width: " . $this->Number->toPercentage($cpuUsage) . "'>
                                                        </div><!-- /.progress-bar .progress-bar-warning -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    <p class='small'>C: Drive - <span class='text-success'> Used</span></p>
                                                    <div class='progress no-rounded progress-xs'>
                                                        <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: '>
                                                        </div><!-- /.progress-bar .progress-bar-success -->
                                                    </div><!-- /.progress .no-rounded -->
                                                    ";
                                                }
                                                ?>
                                            </div><!-- /.col-sm-6 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.the-box .no-border -->
                                </div><!-- /#panel-chart-widget-1 -->
                            </div><!-- /.the-box .no-border -->
                            <!-- END SERVER STATUS WIDGET -->

                        </div><!-- /.col-sm-12 col-md-8 -->


                        <div class="col-lg-4">


                            <div class="panel darken success panel-square">
                                <div class="panel-heading no-border text-white">
                                    <a class="pull-right" href="#"><i class="fa fa-map-marker fa-2x text-white"></i></a>
                                    <span id="weatherheader"></span><br><br><br>
                                    <div class="text-center inner-all margin top">
                                        <span class="h1" id="weathertemp"></span>
                                    </div><br>
                                </div>
                                <div class="panel-body lighten success no-border">
                                    <div class="row">
                                        <div class="col-xs-4 text-center darken-border success right">
                                            <span class="text-white block">Humidity</span><br>
                                            <span id="weatherhumid"></span>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <span class="text-white block">Last Updated</span><bR>
                                            <span id="weatherupdated"></span>
                                        </div>
                                        <div class="col-xs-4 text-center darken-border success left">
                                            <span class="text-white block">Winds</span><br>
                                            <span id="weatherspeed"></span>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- /.panel panel-default panel-square panel-no-border -->
                            <!-- END CURRENCY RATES -->

                        </div><!-- /.col-sm-4 -->



                            <div class="col-lg-4">
                                <div class="panel panel-blockquote panel-border-success panel-square">
                                    <div class="panel-heading panel-info clearfix">
                                        <h3 class="panel-title"><i class="fa fa-twitter-square"></i> Twitter Feed </h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                    </div>
                                </div>
                            </div>




                    </div><!-- /.row -->






                </div><!-- /.container-fluid -->
                <div class="footer">&COPY; 2015 Kyle Spooner</div>

                <!-- END FOOTER -->


            </div><!-- /.page-content -->

            <script>
                /*** Google Maps ***/
                var map4;
                function initialize4() {
                    var mapOptions4 = {
                        zoom: 10,
                        center: new google.maps.LatLng(<?php echo Configure::read('Lat'); ?>, <?php echo Configure::read('Lon'); ?>),
                        styles: [
                            {
                                "featureType": "water",
                                "stylers": [
                                    {
                                        "color": "#46bcec"
                                    },
                                    {
                                        "visibility": "on"
                                    }
                                ]
                            },
                            {
                                "featureType": "landscape",
                                "stylers": [
                                    {
                                        "color": "#f2f2f2"
                                    }
                                ]
                            },
                            {
                                "featureType": "road",
                                "stylers": [
                                    {
                                        "saturation": -100
                                    },
                                    {
                                        "lightness": 45
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "stylers": [
                                    {
                                        "visibility": "simplified"
                                    }
                                ]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "labels.icon",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "labels.text.fill",
                                "stylers": [
                                    {
                                        "color": "#444444"
                                    }
                                ]
                            },
                            {
                                "featureType": "transit",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            }
                        ]
                    };
                    map4 = new google.maps.Map(document.getElementById('map-canvas-4'), mapOptions4);
                    var trafficLayer = new google.maps.TrafficLayer();
                    trafficLayer.setMap(map4);
                }

                google.maps.event.addDomListener(window, 'load', initialize4);


            </script>

            <script>
                $(document).ready(function () {
                    $.simpleWeather({
                        location: '<?php echo Configure::read('CityState'); ?>',
                        woeid: '<?php echo Configure::read('WOEID'); ?>',
                        unit: 'f',
                        success: function (weather) {
                            header = '<span class="h3">' + weather.city + ', ' + weather.region + '</span>';
                            temp = '<i class="wi wi-fw wi-' + weather.code + ' text-white animate bounceInDown"></i> ' + weather.temp + '&deg; ';
                            speed = '<span>' + weather.wind.speed + ' ' + weather.units.speed + '</span>';
                            humid = '<span>' + weather.humidity + ' %</span>';
                            update = '<span>' + weather.updated + ' </span>';
                            $("#weatherheader").html(header);
                            $("#weathertemp").html(temp);
                            $("#weatherspeed").html(speed);
                            $("#weatherhumid").html(humid);
                            $("#weatherupdated").html(update);



                        },
                        error: function (error) {
                            $("#weather").html('<p>' + error + '</p>');
                        }
                    });
                });</script>

            <?php
            $this->Js->get('#ClientClientID')->event('change',
                    $this->Js->request(array(
                        'controller' => 'Location',
                        'action' => 'getloc'
                            ),
                            array(
                        'update' => '#LocationLocationID',
                        'async' => true,
                        'method' => 'post',
                        'dataExpression' => true,
                        'data' => $this->Js->serializeForm(array(
                            'isForm' => true,
                            'inline' => true
                        ))
                    ))
            );
            ?>