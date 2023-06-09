<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CLSU Dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="{{URL::to('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{URL::to('css/sb-admin-2-custom.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{URL::to('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <style>
        h1 {
          text-align: center;
        }

        #reader {
          width: 500px;
        }

        .result {
          background-color: grey;
          color: #fff;
          padding: 20px;
        }

        .row {
          display: flex;
        }

        #reader {
            width: auto !important;
        }

        #reader__scan_region {
          background: white;
        }

        table {
            font-size: .8em;
            width: 100%;
        }

        video {
            width: 100% !important;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                   <img src="{{URL::to('/img/clsu_logo.png')}}" width="50px">
                </div>
                 <div class="sidebar-brand-text mx-3">
                    <p style="font-size: 12px; margin-top: 30px;">CLSU INVENTORY SYSTEM</p>
                    <p>
                    <!--  @if(Auth::user()->hasRole('department'))
                        <p style="margin-top: -10px;">Officer</p>
                     @endif
                     @if(Auth::user()->hasRole('admin'))
                       <p style="margin-top: -10px;">Admin</p>
                     @endif -->
                    </p>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Divider -->
            <hr class="sidebar-divider">


             @if(Auth::user()->hasRole('admin'))
            <!-- Nav Item - Tables -->
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin_home')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>HOME</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin_request_supplies')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>REQUESTED</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_users')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>USERS</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_departments')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>DEPARTMENT</span></a>
            </li>
            @endif

             @if(Auth::user()->hasRole('department') || Auth::user()->hasRole('warehouse') || Auth::user()->hasRole('admin'))

            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin_supplies')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>SUPPLIES</span></a>
            </li>
            @endif

            @if( Auth::user()->hasRole('warehouse') )
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin_scan_qr_code')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>QR CODE</span></a>
            </li>

             <li class="nav-item ">
                <a class="nav-link" href="{{route('admin_warehouse_request_supplies')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>REQUESTED</span></a>
            </li>
            @endif

            @if(Auth::user()->hasRole('department'))
            <li class="nav-item ">
                <a class="nav-link" href="{{route('department_request')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>REQUESTED</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('department_history')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>HISTORY</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{URL::to('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                               <a class="dropdown-item" href="{{route('admin_settings')}}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            @include('shared.notification')
                            @include('shared.validation')
                            <h6 class="m-0 font-weight-bold text-primary">SCAN QR CODE</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="container-fluid">
                                    <div class="row">
                                        <h1 class="col-12">QR Code Reader using Javascript</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div id="reader"></div>
                                        </div>
                                        <div class="col-12 col-lg-6" style="padding: 5px">
                                            <h4>Scan Result </h4>
                                            <div id="result">
                                                Result goes here
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CLSU Property and Supply Office 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::to('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{URL::to('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{URL::to('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::to('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{URL::to('js/demo/datatables-demo.js')}}"></script>

    <script>
        $(document).ready(function(){
            var url = '{{route('admin_scan_qr_code_check')}}';
            var token = '{{Session::token()}}';
            // When scan is successful fucntion will produce data

            let table = document.createElement('table');
            let tr = document.createElement('tr');
            let th = document.createElement('th');

            th.appendChild(document.createTextNode('Status'));
            tr.appendChild(th);

            th = document.createElement('th');
            th.appendChild(document.createTextNode('Quantity'));
            tr.appendChild(th);

            th = document.createElement('th');
            th.appendChild(document.createTextNode('Name of Requester'));
            tr.appendChild(th);

            th = document.createElement('th');
            th.appendChild(document.createTextNode('Office requested'));
            tr.appendChild(th);

            function onScanSuccess(qrCodeMessage,) {
                table.innerHTML = '';
                table.appendChild(tr);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {_token: token, qr_code: qrCodeMessage},
                    success: function (data) {
                        let result = document.getElementById("result");
                        let p = document.createElement('p');

                        result.innerHTML = '';

                        p.appendChild(document.createTextNode(data[0].supply_code));
                        p.appendChild(document.createTextNode(' - ' + data[0].description));
                        result.appendChild(p);

                        result.appendChild(table);

                        data.map(row => {
                            let tr = document.createElement('tr');

                            let td = document.createElement('td');

                            let status = '';

                            switch(row.status_id) {
                                case 0: status = 'Pending'; break;
                                case 1: status = 'Approved'; break;
                                case 2: status = 'Received'; break;
                                case 3: status = 'Returned'; break;
                                default: status = 'Unknown';
                            }

                            td.appendChild(document.createTextNode(status));
                            tr.appendChild(td);

                            td = document.createElement('td');
                            td.appendChild(document.createTextNode(row.quantity));
                            tr.appendChild(td);

                            td = document.createElement('td');
                            td.appendChild(document.createTextNode(row.first_name + ' ' + row.last_name));
                            tr.appendChild(td);

                            td = document.createElement('td');
                            td.appendChild(document.createTextNode(row.dept_name));
                            tr.appendChild(td);

                            table.appendChild(tr);
                        })
                    }
                });
            }

            // When scan is unsuccessful fucntion will produce error message
            function onScanError(errorMessage) {
              // Handle Scan Error
            }

            // Setting up Qr Scanner properties
            var html5QrCodeScanner = new Html5QrcodeScanner("reader", {
              fps: 10,
              qrbox: 250
            });

            // in
            html5QrCodeScanner.render(onScanSuccess, onScanError);


            var token = '{{Session::token()}}';
            var findUserUrl = '{{route("admin_scan_qr_code_check")}}';

            $("#qr_code_scanner").change(function(tr){
                table.innerHTML = '';
                table.appendChild(tr);

                var qr_code = $(this).val();

                $.ajax({
                   type:'POST',
                   url:findUserUrl,
                   data:{_token: token, qr_code: qr_code},
                   success:function(data) {
                       let result = document.getElementById("result");
                       let p = document.createElement('p');

                       result.innerHTML = '';

                       p.appendChild(document.createTextNode(data[0].supply_code));
                       result.appendChild(p);

                       p = document.createElement('p');
                       p.appendChild(document.createTextNode(data[0].description));
                       result.appendChild(p);

                       result.appendChild(table);

                       data.map(row => {
                           let tr = document.createElement('tr');

                           let td = document.createElement('td');
                           td.appendChild(document.createTextNode(row.status_id));
                           tr.appendChild(td);

                           td = document.createElement('td');
                           td.appendChild(document.createTextNode(row.quantity));
                           tr.appendChild(td);

                           td = document.createElement('td');
                           td.appendChild(document.createTextNode(row.first_name + ' ' + row.last_name));
                           tr.appendChild(td);

                           td = document.createElement('td');
                           td.appendChild(document.createTextNode(row.dept_name));
                           tr.appendChild(td);

                           table.appendChild(tr);
                       })
                   }
                });
            });
        });
    </script>
</body>

</html>
