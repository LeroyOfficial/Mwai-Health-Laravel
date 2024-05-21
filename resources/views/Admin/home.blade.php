<!DOCTYPE html>
<html>

<head>
    @include('Admin.css')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('Admin.nav')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('Admin.nav2')
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#">
                            <i class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                                <span>Total Patients</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span>{{$num_of_patients}}</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                                <span>Available Doctors</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span>{{$num_of_doctors}}</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1">
                                                <span>Available Medicine</span>
                                            </div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3">
                                                        <span>{{$num_of_products}}</span>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1">
                                                <span>All Chats</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span>{{$num_of_chats}}</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                                            <i class="fas fa-ellipsis-v text-gray-400"></i>
                                        </button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas data-bss-chart="
                                            {type:line
                                                ,data:{labels:
                                                    [
                                                    Jan,
                                                    Feb,
                                                    Mar,
                                                    Apr,
                                                    May,
                                                    Jun,
                                                    Jul,
                                                    Aug],
                                                    datasets:
                                                    [
                                                        {label
                                                            :
                                                            Earnings,
                                                            fill:true,
                                                            data:
                                                                [0,
                                                                10000,
                                                                5000,
                                                                15000,
                                                                10000,
                                                                20000,
                                                                15000,
                                                                25000],
                                                                backgroundColor:
                                                                    rgba(78, 115, 223, 0.05),
                                                                borderColor:
                                                                    rgba(78, 115, 223, 1)
                                                        }
                                                    ]
                                            },options:
                                            {

                                                maintainAspectRatio:false,
                                                legend:
                                                {
                                                    display:false,
                                                    labels:
                                                        {
                                                        fontStyle
                                                        :normal
                                                    }
                                                },title:
                                                {
                                                    fontStyle
                                                    :normal
                                                },scales:
                                                {xAxes:
                                                    [
                                                        {gridLines
                                                            :{
                                                                color
                                                                :rgb(234, 236, 244)
                                                                ,zeroLineColor
                                                                :rgb(234, 236, 244)
                                                                ,drawBorder
                                                                :false,drawTicks
                                                                :false,borderDash
                                                                :[2],
                                                                zeroLineBorderDash
                                                                :[2],
                                                                drawOnChartArea:false
                                                            },ticks:
                                                            {fontColor
                                                                :#858796
                                                                ,fontStyle
                                                                :normal
                                                                ,padding
                                                                :20
                                                            }
                                                        }
                                                    ]
                                                    ,yAxes:
                                                    [
                                                        {
                                                            gridLines
                                                            :{color
                                                                :rgb(234, 236, 244)
                                                                ,zeroLineColor
                                                                :rgb(234, 236, 244)
                                                                ,drawBorder
                                                                :false,drawTicks
                                                                :false,borderDash
                                                                :[2],
                                                                zeroLineBorderDash
                                                                :[2]
                                                            },
                                                                ticks:{
                                                                fontColor:
                                                                #858796,
                                                                fontStyle:
                                                                normal,
                                                                padding:20
                                                            }
                                                        }
                                                    ]
                                                }
                                            }
                                        }">
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                                            <i class="fas fa-ellipsis-v text-gray-400"></i>
                                        </button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas data-bss-chart="
                                            {type:doughnut,
                                                data:
                                                    {
                                                        labels:
                                                            [
                                                                Direct,Social,Referral
                                                            ],datasets:
                                                            [
                                                                {
                                                                    label:,backgroundColor:
                                                                    [
                                                                        #4e73df,#1cc88a,#36b9cc
                                                                    ],borderColor:
                                                                    [
                                                                        #ffffff,#ffffff,#ffffff
                                                                    ],data:
                                                                    [
                                                                        50,30,15
                                                                    ]
                                                                }
                                                            ]
                                                    }
                                                    ,options:
                                                        {
                                                            maintainAspectRatio:false,legend:
                                                            {
                                                                display:false,labels:
                                                                {
                                                                    fontStyle:normal
                                                                }
                                                            }
                                                            ,title:
                                                                {
                                                                    fontStyle:normal
                                                                }
                                                        }
                                            }">
                                            </canvas>
                                        </div>
                                    <div class="text-center small mt-4">
                                        <span class="me-2">
                                            <i class="fas fa-circle text-primary"></i>
                                            Direct
                                        </span>
                                        <span class="me-2"><i class="fas fa-circle text-success"></i>
                                            Social
                                        </span>
                                        <span class="me-2"><i class="fas fa-circle text-info"></i>
                                            Refferal
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('Admin.footer')
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
</body>

</html>

