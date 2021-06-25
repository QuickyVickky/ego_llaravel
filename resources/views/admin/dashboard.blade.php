@extends('admin.layouts.master')

@section('title','Dashboard |')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/widgets/modules-widgets.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/sweetalerts/sweetalert.css') }}">

    <style>
        .revenue-chart.layout-spacing {
            padding-bottom: 30px;
        }
        .sales .revenue-chart .widget {
            position: relative;
            padding: 20px;
            border-radius: 8px;
            border: none;
            background: #fff;
        }
        .sales .revenue-chart .widget .widget-heading {
            margin-bottom: 15px;
        }
        .sales .revenue-chart .widget h5 {
            font-weight: 700;
            font-size: 19px;
            letter-spacing: 0px;
            margin-bottom: 0;
            color: #515365;
        }
        .sales .revenue-chart .widget .widget-content {}
    </style>
@endsection

@section('breadcrumbs')
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span></li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="row sales layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="row widget-statistic">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 pb-4">
                    <div class="widget widget-one_hybrid widget-followers">
                        <div class="widget-heading">
                            <div class="w-icon">
                                <i data-feather="users"></i>
                            </div>

                            <p class="w-value">{{ $totalUsers }}</p>

                            <h5 class="">Total users</h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 pb-4">
                    <div class="widget widget-one_hybrid widget-engagement">
                        <div class="widget-heading">
                            <div class="w-icon">
                                <i data-feather="zap"></i>
                            </div>

                            <p class="w-value">{{ $totalTodayTransaction }}</p>

                            <h5 class="">Total today's transactions</h5>
                        </div>
                    </div>
                </div>

                <div href="#topCountryTable" class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 pb-4">
                    <div class="widget widget-one_hybrid widget-referral">
                        <a href="#topCountryTable">
                            <div class="widget-heading">
                                <div class="w-icon">
                                    <i data-feather="award"></i>
                                </div>

                                <p class="w-value">{{ count($arrFinalTransaction) }}</p>

                                <h5 class="">Top transactional countries</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 pb-4">
                    <div class="widget widget-one_hybrid widget-engagement">
                        <div class="widget-heading">
                            <div class="w-icon">
                                <i data-feather="trending-up"></i>
                            </div>

                            <p class="w-value">{{ $totalTodayPandingTransaction }}</p>

                            <h5 class="">Total today's pending transactions</h5>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 pb-4">
                    <div class="widget widget-one_hybrid widget-engagement">
                        <div class="widget-heading">
                            <div class="w-icon">
                                <i data-feather="trending-down"></i>
                            </div>

                            <p class="w-value">{{ $totalTodayRefundTransaction }}</p>

                            <h5 class="">Total today's refund transactions</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing revenue-chart">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <div class="col-12">
                        <form class="row" method="post" id="transactionFilterForm" action="{{ route('dashboard.filter') }}">
                            @csrf

                            <div class="col-xl-4 col-md-4 col-sm-4 col-12" style="padding-left: unset;">
                                <h5 class="">Revenue</h5>
                            </div>

                            <div class="col-xl-4 col-md-4 col-sm-4 col-12">
                                <input class="form-control" type="text" id="transaction_date" name="transaction_date" value="{{ $dateRange }}" placeholder="Select date" autocomplete="off">
                            </div>

                            <div class="col-xl-4 col-md-4 col-sm-4 col-12">
                                <ul class="tabs tab-pills" style="float: right;">
                                    <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="widget-content">
                    <div class="tabs tab-content">
                        <div id="content_1" class="tabcontent">
                            <div id="revenueData"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="topCountryTable" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="widget-header">
                    <div class="col-xl-3 col-md-3 col-sm-3 col-3">
                        <h4>Top transactional countries</h4>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="transactionDataTable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country name</th>
                                <th>Total transaction</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $cnt = 1;
                            @endphp

                            @foreach ($arrFinalTransaction as $aft)
                                <tr>
                                    <td>{{ $cnt }}</td>
                                    <td>{{ $aft['countryName'] }}</td>
                                    <td>{{ $aft['totalFinalTransaction'] }}</td>
                                </tr>

                                @php
                                    $cnt += 1;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('admin/assets/js/widgets/modules-widgets.js') }}"></script>
    <script src="{{ asset('admin/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/sweetalerts/sweetalert2.min.js') }}"></script>

    <script>
        $('#transactionDataTable').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "aaSorting": [],
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [],
                }
            ],
        });

        // Chart

        var options1 = {
          chart: {
            fontFamily: 'Nunito, sans-serif',
            height: 365,
            type: 'area',
            zoom: {
                enabled: false
            },
            dropShadow: {
              enabled: true,
              opacity: 0.3,
              blur: 5,
              left: -7,
              top: 22
            },
            toolbar: {
              show: false
            },
            events: {
              mounted: function(ctx, config) {
                const highest1 = ctx.getHighestValueInSeries(0);

                ctx.addPointAnnotation({
                  x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
                  y: highest1,
                  label: {
                    style: {
                      cssClass: 'd-none'
                    }
                  },
                  customSVG: {
                      SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                      cssClass: undefined,
                      offsetX: -8,
                      offsetY: 5
                  }
                })
              },
            }
          },
          colors: ['#1b55e2'/*, '#e7515a'*/],
          dataLabels: {
              enabled: false
          },
          markers: {
            discrete: [{
            seriesIndex: 0,
            dataPointIndex: 7,
            fillColor: '#000',
            strokeColor: '#000',
            size: 5
          }]
          },
          subtitle: {
            text: 'Total Profit',
            align: 'left',
            margin: 0,
            offsetX: -10,
            offsetY: 35,
            floating: false,
            style: {
              fontSize: '14px',
              color:  '#888ea8'
            }
          },
          title: {
            text: '$ ' + {{ $totalProfit }},
            align: 'left',
            margin: 0,
            offsetX: -10,
            offsetY: 0,
            floating: false,
            style: {
              fontSize: '25px',
              color:  '#0e1726'
            },
          },
          stroke: {
              show: true,
              curve: 'smooth',
              width: 2,
              lineCap: 'square'
          },
          series: [{
              name: 'Income',
              data: {!! $transactionChartTotalRevenue !!}
          }],
          labels: {!! $transactionChartMonth !!},
          xaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false
            },
            crosshairs: {
              show: true
            },
            labels: {
              offsetX: 0,
              offsetY: 5,
              style: {
                  fontSize: '12px',
                  fontFamily: 'Nunito, sans-serif',
                  cssClass: 'apexcharts-xaxis-title',
              },
            }
          },
          yaxis: {
            labels: {
              formatter: function(value, index) {
                return '$ ' + (value)
              },
              offsetX: -22,
              offsetY: 0,
              style: {
                  fontSize: '12px',
                  fontFamily: 'Nunito, sans-serif',
                  cssClass: 'apexcharts-yaxis-title',
              },
            }
          },
          grid: {
            borderColor: '#e0e6ed',
            strokeDashArray: 5,
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: false,
                }
            },
            padding: {
              top: 0,
              right: 0,
              bottom: 0,
              left: -10
            },
          },
          legend: {
            position: 'top',
            horizontalAlign: 'right',
            offsetY: -50,
            fontSize: '16px',
            fontFamily: 'Nunito, sans-serif',
            markers: {
              width: 10,
              height: 10,
              strokeWidth: 0,
              strokeColor: '#fff',
              fillColors: undefined,
              radius: 12,
              onClick: undefined,
              offsetX: 0,
              offsetY: 0
            },
            itemMargin: {
              horizontal: 0,
              vertical: 20
            }
          },
          tooltip: {
            theme: 'dark',
            marker: {
              show: true,
            },
            x: {
              show: false,
            }
          },
          fill: {
              type:"gradient",
              gradient: {
                  type: "vertical",
                  shadeIntensity: 1,
                  inverseColors: !1,
                  opacityFrom: .28,
                  opacityTo: .05,
                  stops: [45, 100]
              }
          },
          responsive: [{
            breakpoint: 575,
            options: {
              legend: {
                  offsetY: -30,
              },
            },
          }]
        }

        var chart1 = new ApexCharts(
            document.querySelector("#revenueData"),
            options1
        );

        chart1.render();

        $('#transaction_date').daterangepicker({
            maxDate: new Date(),
            autoUpdateInput: false
        }, function(start, end, label) {
            var date1 = new Date(start);
            var date2 = new Date(end);
            var datediff = date2.getTime() - date1.getTime();

            var differenceInDays = datediff / (1000 * 3600 * 24);

            if(differenceInDays > 365) {
                swal({
                    title: 'Please select maximum 12 months of date range',
                    animation: false,
                    customClass: 'animated tada',
                    padding: '2em'
                })
            } else {
                $('#transaction_date').val(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'));
                $( "#transactionFilterForm" ).submit();
            }
        });

        $('#transaction_date').on('cancel.daterangepicker', function(ev, picker) {
            $('#transaction_date').val('');
            $( "#transactionFilterForm" ).submit();
        });
    </script>
@endsection