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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{URL::to('/img/clsu_logo.png')}}" width="50px">
                </div>
                 <div class="sidebar-brand-text mx-3">
                    <p style="font-size: 12px; margin-top: 30px;">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                    <p>
                     @if(Auth::user()->hasRole('department'))
                        <p style="margin-top: -10px;">Officer</p>
                     @endif
                     @if(Auth::user()->hasRole('admin'))
                       <p style="margin-top: -10px;">Admin</p>
                     @endif
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

             @if(Auth::user()->hasRole('department'))
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin_supplies')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>SUPPLIES</span></a>
            </li>
            <li class="nav-item active">
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

                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
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
                            <h6 class="m-0 font-weight-bold text-primary">REQUESTED LIST</h6>
                            @if(Auth::user()->hasRole('admin'))
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newSupplyModal">ADD SUPPLY</button>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STATUS</th>
                                            <th>Department</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Code</th>
                                            <th>Unit</th>
                                            <th>Price</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($requested_supplies as $request)
                                            <tr>
                                                <td>
                                                    @if($request->status_id == 0)
                                                        <span class="btn-warning">PENDING APPROVAL</span>
                                                    @elseif($request->status_id == 1)
                                                        <span class="btn-success">APPROVED</span>
                                                    @endif
                                                </td>
                                                <td>{{$request->supply->department->name}}</td>
                                                <td>{{$request->supply->category->name}}</td>
                                                <td>{{$request->supply->description}}</td>
                                                <td>{{$request->supply->supply_code}}</td>
                                                <td>{{$request->supply->unit->name}}</td>
                                                <td>{{$request->supply->price}}</td>

                                                <td>
                                                    @if($request->status_id == 1)
                                                    <button class="btn btn-success btn-sm received" data-toggle="modal" data-target="#requestSupplyReceived" value="{{$request->id}}">RECEIVED</button>
                                                    <button class="btn btn-danger return btn-sm" data-toggle="modal" data-target="#requestSupplyReturnModal" value="{{$request->id}}">RETURN</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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

    <div class="modal" id="requestSupplyReceived">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Did  you received the Supply?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form class="user" action="{{route('department_received_supply')}}" method="POST">
                @csrf
                <input type="hidden" name="request_id" id="requestSupply">
                <button type="submit"  class="btn btn-primary btn-user btn-block">YES</button>
                <button type="button" class="btn btn-danger btn-user btn-block" data-dismiss="modal">NO</button>
                <hr>

            </form>

          </div>



        </div>
      </div>
    </div>

     <div class="modal" id="requestSupplyReturnModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Are you sure you received the return Supply?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form class="user" action="{{route('department_return_supply')}}" method="POST">
                @csrf
                <input type="hidden" name="request_id" id="requestSupplyReturn">
                <button type="submit"  class="btn btn-primary btn-user btn-block">YES</button>
                <button type="button" class="btn btn-danger btn-user btn-block" data-dismiss="modal">NO</button>
                <hr>

            </form>

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
            var token = '{{Session::token()}}';
            var findUserUrl = '{{route("admin_find_supplies")}}';
            $(".received").click(function(){
                $("#requestSupply").val($(this).val());
            });
             $(".return").click(function(){
                $("#requestSupplyReturn").val($(this).val());
            });
            $(".edit").click(function(){
                var supply_id = $(this).val();
                $("#supplyEdit").val(supply_id);
                $.ajax({
                   type:'POST',
                   url:findUserUrl,
                   data:{_token: token, supply_id: supply_id},
                   success:function(data) {
                     $("#supplyDescriptionFind").val(data.description);
                     $("#supply_code_find").val(data.supply_code);
                     $("#pricefind").val(data.price);
                     $("#departmentFind").val(data.department_id);
                     $("#categoryFind").val(data.category_id);
                     $("#unit_idFind").val(data.unit_id);
                   }
                });

            });
        });
    </script>
</body>

</html>
