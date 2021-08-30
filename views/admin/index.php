<!doctype html>
<html lang="en">

<head>
    <?php include_once('views/admin/layout/meta.php') ?>
</head>

<body class="vertical  dark  ">
    <div class="wrapper">
        <!-- Top Navbar -->
        <?php include_once('views/admin/layout/topnav.php') ?>
        <!-- End Top Navbar -->

        <!-- Left Sidebar -->
        <?php include_once('views/admin/layout/sidebar.php') ?>
        <!-- End Left Sidebar -->

        <!-- Main -->
        <main role="main" class="main-content">


            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow bg-primary text-white border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary-light">
                                                    <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="small text-muted mb-0">Doanh thu tháng này</p>
                                                <span class="h5 mb-0 text-white">50.342.000</span>
                                                <span class="small text-muted">+10.5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col pr-0">
                                                <p class="small text-muted mb-0">Số đơn hàng tháng này</p>
                                                <span class="h5 mb-0">1,869</span>
                                                <span class="small text-success">+16.5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-users text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="small text-muted mb-0">Lượt truy cập</p>
                                                <div class="row align-items-center no-gutters">
                                                    <div class="col-auto">
                                                        <span class="h5 mr-2 mb-0">108</span>
                                                        <span
                                                            class="fe fe-arrow-up fe-12 text-success"></span><span>37.7%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3 mb-4">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3 text-center">
                                                <span class="circle circle-sm bg-primary">
                                                    <i class="fe fe-16 fe-box text-white mb-0"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <p class="small text-muted mb-0">Sản phẩm bán được</p>
                                                <span class="h5 mb-0">1,869</span>
                                                <span class="small text-success">+16.5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end section -->
                        <div class="row align-items-center my-2">
                            <div class="col-auto ml-auto">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label for="reportrange" class="sr-only">Date Ranges</label>
                                        <div id="reportrange" class="px-2 py-2 text-muted">
                                            <i class="fe fe-calendar fe-16 mx-2"></i>
                                            <span class="small"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm"><span
                                                class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
                                        <button type="button" class="btn btn-sm"><span
                                                class="fe fe-filter fe-12 text-muted"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-12">
                                <div class="chart-box">
                                    <div id="columnChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <?php include_once('views/admin/layout/notifications.php') ?>
            <!-- End Notifications -->

        </main>
        <!--End main -->

    </div> <!-- .wrapper -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src='assets/js/daterangepicker.js'></script>
    <script src='assets/js/jquery.stickOnScroll.js'></script>
    <script src="assets/js/tinycolor-min.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/d3.min.js"></script>
    <script src="assets/js/topojson.min.js"></script>
    <script src="assets/js/datamaps.all.min.js"></script>
    <script src="assets/js/datamaps.vnm.js"></script>
    <!-- <script src="assets/js/datamaps-zoomto.js"></script> -->
    <!-- <script src="assets/js/datamaps.custom.js"></script> -->
    <script src="assets/js/Chart.min.js"></script>
    <script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="assets/js/gauge.min.js"></script>
    <script src="assets/js/jquery.sparkline.min.js"></script>
    <script src="assets/js/apexcharts.min.js"></script>
    <!-- <script src="assets/js/apexcharts.custom.js"></script> -->
    <script src='assets/js/jquery.mask.min.js'></script>
    <script src='assets/js/select2.min.js'></script>
    <script src='assets/js/jquery.steps.min.js'></script>
    <script src='assets/js/jquery.validate.min.js'></script>
    <script src='assets/js/jquery.timepicker.js'></script>
    <script src='assets/js/dropzone.min.js'></script>
    <script src='assets/js/uppy.min.js'></script>
    <script src='assets/js/quill.min.js'></script>
    <script>
    var columnChart, columnChartoptions = {
            series: [{
                name: "Lượt truy cập",
                data: [32, 66, 44, 55, 41, 24, 67, 22, 43, 32, 66, 44, 55, 41, 24, 67, 22, 43]
            }, {
                name: "Đơn hàng",
                data: [7, 30, 13, 23, 20, 12, 8, 13, 27, 7, 30, 13, 23, 20, 12, 8, 13, 27]
            }],
            chart: {
                type: "bar",
                height: 350,
                stacked: !1,
                columnWidth: "70%",
                zoom: {
                    enabled: !0
                },
                toolbar: {
                    show: !1
                },
                background: "transparent"
            },
            dataLabels: {
                enabled: !1
            },
            theme: {
                mode: colors.chartTheme
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: "bottom",
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "40%",
                    radius: 30,
                    enableShades: !1,
                    endingShape: "rounded"
                }
            },
            xaxis: {
                type: "datetime",
                categories: ["01/01/2020 GMT", "01/02/2020 GMT", "01/03/2020 GMT", "01/04/2020 GMT", "01/05/2020 GMT",
                    "01/06/2020 GMT", "01/07/2020 GMT", "01/08/2020 GMT", "01/09/2020 GMT", "01/10/2020 GMT",
                    "01/11/2020 GMT", "01/12/2020 GMT", "01/13/2020 GMT", "01/14/2020 GMT", "01/15/2020 GMT",
                    "01/16/2020 GMT", "01/17/2020 GMT", "01/18/2020 GMT"
                ],
                labels: {
                    show: !0,
                    trim: !0,
                    minHeight: void 0,
                    maxHeight: 120,
                    style: {
                        colors: colors.mutedColor,
                        cssClass: "text-muted",
                        fontFamily: base.defaultFontFamily
                    }
                },
                axisBorder: {
                    show: !1
                }
            },
            yaxis: {
                labels: {
                    show: !0,
                    trim: !1,
                    offsetX: -10,
                    minHeight: void 0,
                    maxHeight: 120,
                    style: {
                        colors: colors.mutedColor,
                        cssClass: "text-muted",
                        fontFamily: base.defaultFontFamily
                    }
                }
            },
            legend: {
                position: "top",
                fontFamily: base.defaultFontFamily,
                fontWeight: 400,
                labels: {
                    colors: colors.mutedColor,
                    useSeriesColors: !1
                },
                markers: {
                    width: 10,
                    height: 10,
                    strokeWidth: 0,
                    strokeColor: "#fff",
                    fillColors: [extend.primaryColor, extend.primaryColorLighter],
                    radius: 6,
                    customHTML: void 0,
                    onClick: void 0,
                    offsetX: 0,
                    offsetY: 0
                },
                itemMargin: {
                    horizontal: 10,
                    vertical: 0
                },
                onItemClick: {
                    toggleDataSeries: !0
                },
                onItemHover: {
                    highlightDataSeries: !0
                }
            },
            fill: {
                opacity: 1,
                colors: [base.primaryColor, extend.primaryColorLighter]
            },
            grid: {
                show: !0,
                borderColor: colors.borderColor,
                strokeDashArray: 0,
                position: "back",
                xaxis: {
                    lines: {
                        show: !1
                    }
                },
                yaxis: {
                    lines: {
                        show: !0
                    }
                },
                row: {
                    colors: void 0,
                    opacity: .5
                },
                column: {
                    colors: void 0,
                    opacity: .5
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            }
        },
        columnChartCtn = document.querySelector("#columnChart");
    columnChartCtn && (columnChart = new ApexCharts(columnChartCtn, columnChartoptions)).render();
    </script>
  </script>
</html>