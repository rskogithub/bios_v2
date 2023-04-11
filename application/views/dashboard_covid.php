<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/statistics/c3/c3.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Tren Pasien Covid
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div id="lineChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="panel-7" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Data Harian Pasien Meninggal
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div id="areaChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div id="panel-10" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Data Pegawai Positif
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div id="barlineCombine">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-6"></div> -->
                <div class="col-xl-6">
                    <div id="panel-10" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Data PCR
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <table id="list2" class="table table-bordered table-hover m-0">
                                    <thead class="thead-themed">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Positif</th>
                                            <th>Negatif</th>
                                            <th>Invalid</th>
                                            <th>Inkonklusif</th>
                                            <th>Konfirmasi</th>
                                            <th>Total Sample</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($pcr as $data) { ?>
                                            <tr>
                                                <td><?php echo $data->tanggal ?></td>
                                                <td><?php echo $data->positif ?></td>
                                                <td><?php echo $data->negatif ?></td>
                                                <td><?php echo $data->invalid ?></td>
                                                <td><?php echo $data->inkonklusif ?></td>
                                                <td><?php echo $data->konfirmasil ?></td>
                                                <td><?php echo $data->ttl_sample ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div id="panel-10" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Data APD
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <table id="list" class="table table-bordered table-hover m-0">
                                    <thead class="thead-themed">
                                        <tr>
                                            <th>Kebutuhan</th>
                                            <th>jumlah_eksisting</th>
                                            <th>jumlah</th>
                                            <th>jumlah_diterima</th>
                                            <th>tglupdate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $id = "3171435"; //kode rs dari kemenkes
                                        $pass = "S!rs2020!!";
                                        //Get Timestamp
                                        $dt = new DateTime(null, new DateTimeZone("UTC"));
                                        $timestamp = $dt->getTimestamp();
                                        // update data tempat tidur
                                        $url = "http://sirs.kemkes.go.id/fo/index.php/Fasyankes/APD";
                                        $method = "GET";
                                        $curl = curl_init();
                                        curl_setopt($curl, CURLOPT_URL, $url);
                                        curl_setopt($curl, CURLOPT_HEADER, false);
                                        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
                                        //curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
                                        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                                        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                                            "X-rs-id: " . $id,
                                            "X-Timestamp: " . $timestamp,
                                            "X-pass: " . $pass,
                                            "Content-type: application/json"
                                        ));
                                        $result = curl_exec($curl);
                                        curl_close($curl);
                                        //echo $result;
                                        $data = (object) json_decode($result);
                                        foreach ($data->apd as $row) {
                                            echo '<tr>';
                                            echo '<td>' . $row->kebutuhan . '</td>';
                                            echo '<td>' . $row->jumlah_eksisting . '</td>';
                                            echo '<td>' . $row->jumlah . '</td>';
                                            echo '<td>' . $row->jumlah_diterima . '</td>';
                                            echo '<td>' . $row->tglupdate . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php
foreach ($pasien as $data) {
    $tgl[] = tgl_indo($data->tgl);
    $masuk[] = (float) $data->masuk;
    $keluar[] = (float) $data->keluar;
}
foreach ($meninggal as $data) {
    $tgl_meninggal[] = tgl_indo($data->tanggal);
    $confirm[] = (float) $data->confirm;
    $suspect[] = (float) $data->suspect;
}
foreach ($positif as $data) {
    $bln_pcr[] = $data->bulan;
    $dokter[] = (float) $data->dokter;
    $perawat[] = (float) $data->perawat;
    $nakes[] = (float) $data->nakes;
    $non_medis[] = (float) $data->non_medis;
}
?>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#list').DataTable();
        $('#list2').DataTable();
    });
</script>
<!-- plugin Chart.js : MIT license -->
<script src="<?php echo base_url() ?>assets/smartadmin/js/statistics/chartjs/chartjs.bundle.js"></script>
<script>
    /* line chart */
    var lineChart = function() {
        var config = {
            type: 'line',
            data: {
                labels: <?php echo json_encode($tgl); ?>,
                datasets: [{
                    label: "Pasien Masuk",
                    backgroundColor: myapp_get_color.primary_300,
                    borderColor: myapp_get_color.primary_500,
                    pointBorderColor: 'rgba(0, 0, 0, 0)',
                    pointBorderWidth: 1,
                    borderWidth: 1,
                    pointRadius: 3,
                    pointHoverRadius: 4,
                    data: <?php echo json_encode($masuk); ?>,
                    fill: false
                }, {
                    label: "Pasien Keluar",
                    backgroundColor: myapp_get_color.success_300,
                    borderColor: myapp_get_color.success_500,
                    pointBorderColor: 'rgba(0, 0, 0, 0)',
                    pointBorderWidth: 1,
                    borderWidth: 1,
                    pointRadius: 3,
                    pointHoverRadius: 4,
                    data: <?php echo json_encode($keluar); ?>,
                    fill: false
                }],
            },
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        };
        new Chart($("#lineChart > canvas").get(0).getContext("2d"), config);
    }
    /* line chart -- end */

    /* area chart */
    var areaChart = function() {
        var config = {
            type: 'line',
            data: {
                labels: <?php echo json_encode($tgl_meninggal); ?>,
                datasets: [{
                        label: "Meninggal Confirm",
                        backgroundColor: 'rgba(136,106,181, 0.2)',
                        borderColor: myapp_get_color.primary_500,
                        pointBackgroundColor: myapp_get_color.primary_700,
                        pointBorderColor: 'rgba(0, 0, 0, 0)',
                        pointBorderWidth: 1,
                        borderWidth: 1,
                        pointRadius: 3,
                        pointHoverRadius: 4,
                        data: <?php echo json_encode($confirm); ?>,
                        fill: true
                    },
                    {
                        label: "Meninggal Suspect",
                        backgroundColor: 'rgba(29,201,183, 0.2)',
                        borderColor: myapp_get_color.success_500,
                        pointBackgroundColor: myapp_get_color.success_700,
                        pointBorderColor: 'rgba(0, 0, 0, 0)',
                        pointBorderWidth: 1,
                        borderWidth: 1,
                        pointRadius: 3,
                        pointHoverRadius: 4,
                        data: <?php echo json_encode($suspect); ?>,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Area Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        };
        new Chart($("#areaChart > canvas").get(0).getContext("2d"), config);
    }
    /* area chart -- end */

    /* bar & line combine */
    var barlineCombine = function() {
        var barlineCombineData = {
            labels: <?php echo json_encode($bln_pcr); ?>,
            datasets: [{
                    type: 'bar',
                    label: 'Dokter',
                    //borderColor: myapp_get_color.danger_300,
                    backgroundColor: myapp_get_color.danger_300,
                    borderColor: myapp_get_color.danger_500,
                    //pointBorderWidth: 1,
                    borderWidth: 2,
                    // pointRadius: 4,
                    // pointHoverRadius: 5,
                    //fill: false,
                    data: <?php echo json_encode($dokter); ?>
                },
                {
                    type: 'bar',
                    label: 'Perawat/Bidan/Anastesi',
                    backgroundColor: myapp_get_color.primary_300,
                    borderColor: myapp_get_color.primary_500,
                    data: <?php echo json_encode($perawat); ?>,
                    borderWidth: 1
                },
                {
                    type: 'bar',
                    label: 'Nakes Lainnya',
                    backgroundColor: myapp_get_color.success_300,
                    borderColor: myapp_get_color.success_500,
                    data: <?php echo json_encode($nakes); ?>,
                    borderWidth: 1
                },
                {
                    type: 'bar',
                    label: 'Non Medis',
                    backgroundColor: myapp_get_color.warning_300,
                    borderColor: myapp_get_color.warning_500,
                    data: <?php echo json_encode($non_medis); ?>,
                    borderWidth: 1
                }
            ]

        };
        var config = {
            type: 'bar',
            data: barlineCombineData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                // title: {
                //     display: true,
                //     text: 'Chart.js Bar Chart'
                // },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#barlineCombine > canvas").get(0).getContext("2d"), config);
    }
    /* bar & line combine -- end */

    /* polar area */
    var polarArea = function() {
        var config = {
            type: 'polarArea',
            data: {
                datasets: [{
                    data: [
                        11,
                        16,
                        7,
                        3,
                        14
                    ],
                    backgroundColor: [
                        myapp_get_color.primary_200,
                        myapp_get_color.primary_400,
                        myapp_get_color.success_100,
                        myapp_get_color.success_400,
                        myapp_get_color.success_600
                    ],
                    label: 'My dataset' // for legend
                }],
                labels: [
                    "USA",
                    "Germany",
                    "Austalia",
                    "Canada",
                    "France"
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'bottom',
                }
            }
        };
        new Chart($("#polarArea > canvas").get(0).getContext("2d"), config);
    }
    /* polar area -- end */

    /* radar chart */
    var radarChart = function() {
        var config = {
            type: "radar",
            data: {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Partying", "Running"],
                datasets: [{
                        label: "First",
                        pointRadius: 4,
                        borderDashOffset: 2,
                        backgroundColor: "rgba(136,106,181, 0.2)",
                        borderColor: "rgba(0,0,0,0)",
                        pointBackgroundColor: myapp_get_color.primary_500,
                        pointBorderColor: myapp_get_color.primary_500,
                        pointHoverBackgroundColor: myapp_get_color.primary_500,
                        pointHoverBorderColor: myapp_get_color.primary_500,
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        label: "Second",
                        pointRadius: 4,
                        borderDashOffset: 2,
                        backgroundColor: "rgba(29,201,183, 0.2)",
                        borderColor: "rgba(0,0,0,0)",
                        pointBackgroundColor: myapp_get_color.success_500,
                        pointBorderColor: myapp_get_color.success_500,
                        pointHoverBackgroundColor: myapp_get_color.success_500,
                        pointHoverBorderColor: myapp_get_color.success_500,
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]
            },
            options: {
                responsive: true,
            }
        }

        new Chart($("#radarChart > canvas").get(0).getContext("2d"), config);

    }
    /* radar chart -- end */

    /* bubble chart */
    var bubbleChart = function() {
        var config = {
            type: 'bubble',
            data: {
                labels: "Africa",
                datasets: [{
                        label: ["China"],
                        backgroundColor: myapp_get_color.primary_300,
                        borderColor: myapp_get_color.primary_500,
                        data: [{
                            x: 21269017,
                            y: 5.245,
                            r: 15
                        }]
                    },
                    {
                        label: ["Denmark"],
                        backgroundColor: myapp_get_color.success_300,
                        borderColor: myapp_get_color.success_500,
                        data: [{
                            x: 258702,
                            y: 7.526,
                            r: 10
                        }]
                    },
                    {
                        label: ["Germany"],
                        backgroundColor: myapp_get_color.info_300,
                        borderColor: myapp_get_color.info_500,
                        data: [{
                            x: 3979083,
                            y: 6.994,
                            r: 15
                        }]
                    },
                    {
                        label: ["Japan"],
                        backgroundColor: myapp_get_color.danger_300,
                        borderColor: myapp_get_color.danger_500,
                        data: [{
                            x: 4931877,
                            y: 5.921,
                            r: 15
                        }]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: "Happiness"
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: "GDP (PPP)"
                        }
                    }]
                }
            }
        }
        new Chart($("#bubbleChart > canvas").get(0).getContext("2d"), config);
    }
    /* bubble chart -- end*/

    /* pie chart */
    var pieChart = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        11,
                        16,
                        7,
                        3,
                        14
                    ],
                    backgroundColor: [
                        myapp_get_color.primary_200,
                        myapp_get_color.primary_400,
                        myapp_get_color.success_50,
                        myapp_get_color.success_300,
                        myapp_get_color.success_500
                    ],
                    label: 'My dataset' // for legend
                }],
                labels: [
                    "USA",
                    "Germany",
                    "Austalia",
                    "Canada",
                    "France"
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'bottom',
                }
            }
        };
        new Chart($("#pieChart > canvas").get(0).getContext("2d"), config);
    }
    /* pie chart -- end */

    /* doughnut chart */
    var doughnutChart = function() {
        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        11,
                        16,
                        7,
                        3,
                        14
                    ],
                    backgroundColor: [
                        myapp_get_color.success_200,
                        myapp_get_color.success_400,
                        myapp_get_color.primary_50,
                        myapp_get_color.primary_300,
                        myapp_get_color.primary_500
                    ],
                    label: 'My dataset' // for legend


                }],
                labels: [
                    "USA",
                    "Germany",
                    "Austalia",
                    "Canada",
                    "France"
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'bottom',
                }
            }
        };
        new Chart($("#doughnutChart > canvas").get(0).getContext("2d"), config);
    }
    /* doughnut chart -- end */

    /* initialize all charts */
    $(document).ready(function() {
        lineChart();
        areaChart();
        //horizontalBarChart();
        //barChart();
        //barStacked();
        //barHorizontalStacked();
        //bubbleChart();
        barlineCombine();
        //polarArea();
        //radarChart();
        //pieChart();
        //doughnutChart();
    });
</script>