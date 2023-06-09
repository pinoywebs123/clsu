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
                <div class="sidebar-brand-icon">
                    <img src="{{URL::to('/img/clsu_logo.png')}}" width="50px">
                </div>
                 <div class="sidebar-brand-text mx-3">
                    <p style="font-size: 12px; margin-top: 30px;">CLSU INVENTORY SYSTEM</p>
                    <p>
                     <!-- @if(Auth::user()->hasRole('department'))
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
                    <span>OFFICE</span></a>
            </li>
            @endif


             @if(Auth::user()->hasRole('department') || Auth::user()->hasRole('warehouse') || Auth::user()->hasRole('admin'))

            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin_supplies')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>SUPPLIES</span></a>
            </li>
            @endif

            @if( Auth::user()->hasRole('admin') )
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin_forms')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>FORMS</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin_logs')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>LOGS ACTIVITY</span></a>
            </li>
            @endif

            @if( Auth::user()->hasRole('warehouse') )
            <li class="nav-item ">
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
                    <ul class="navbar-nav ml-auto align-items-center">



                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown" style="height: min-content">
                            <button style="box-shadow: none !important" class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown"><i class="far fa-bell"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <h6 class="dropdown-header">Latest <strong class="text-warning">pending</strong> requested supplies</h6>
                                @foreach($requested_supplies as $rs)
                                    <div class="dropdown-item">
                                        {{ $rs->quantity }} {{ \Illuminate\Support\Str::plural($rs->supply->unit->name, $rs->quantity) }} of {{ \Illuminate\Support\Str::plural($rs->supply->description, $rs->quantity) }} from {{ $rs->supply->department->name }}
                                    </div>
                                @endforeach
                                <div class="dropdown-item">
                                    @if( Auth::user()->hasRole('admin') )
                                        <a class="btn d-block w-100 text-primary" href="{{route('admin_request_supplies')}}">View all</a>
                                    @endif

                                    @if( Auth::user()->hasRole('warehouse') )
                                        <a class="btn d-block w-100 text-primary" href="{{route('admin_warehouse_request_supplies')}}">View all</a>
                                    @endif
                                </div>
                            </div>
                        </li>

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
                            <h6 class="m-0 font-weight-bold text-primary">SUPPLIES LIST</h6>
                            @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('warehouse'))
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#newSupplyModal">ADD SUPPLY</button>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Office</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Code</th>
                                            <th>Unit</th>
                                            <th>Quanity</th>
                                            <th>Price</th>
                                            <th>QR CODe</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($supplies as $supply)
                                        <tr>
                                            <th>{{$supply->department->name}}</th>
                                            <th>{{$supply->category->name}}</th>
                                            <th>{{$supply->description}}</th>
                                            <th>{{$supply->supply_code}}</th>
                                            <th>{{$supply->unit->name}}</th>
                                            <th>{{$supply->quantity}}</th>
                                            <th>P{{number_format((float)$supply->price, 2, '.', '')}}</th>
                                            <th>{{SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->generate($supply->qr_code)}}</th>
                                            <th>
                                                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('warehouse'))
                                                <button class="btn btn-info btn-circle btn-sm edit" value="{{$supply->id}}" data-toggle="modal" data-target="#editSupplyModal">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>
                                                <button class="btn btn-danger btn-circle btn-sm restock" value="{{$supply->id}}" data-toggle="modal" data-target="#requestSupply">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>

                                                <a href="{{route('admin_print_supplies',$supply->id)}}" class="btn btn-primary btn-circle btn-sm print">
                                                    <i class="fa fa-print" aria-hidden="true"></i>
                                                </a>
                                                @endif

                                                 @if(Auth::user()->hasRole('department'))
                                                <button class="btn btn-danger btn-circle btn-sm order" value="{{$supply->id}}" data-toggle="modal" data-target="#supplyRequestOrder">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                                 @endif



                                            </th>
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

    <div class="modal" id="newSupplyModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Enter Supply Informations</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form class="user" action="{{route('admin_supplies_check')}}" method="POST">
                @csrf

                <div class="form-group">
                    <textarea class="form-control form-control" placeholder="Item Description" name="description" required></textarea>
                </div>

                 <div class="form-group row">

                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control" id="exampleLastName"
                            placeholder="Supply Code" name="supply_code" required>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" class="form-control" id="exampleFirstName"
                            placeholder="Supply Price Per Unit" name="price" required>
                    </div>

                </div>

                <div class="form-group">
                    <label>Select Department</label>
                    <select class="form-control" name="department_id" required>
                        @foreach($departments as $dept)
                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row">

                    <div class="col-sm-6">
                        <label>Select Category</label>
                       <select class="form-control form-control" name="category_id" required id="category">
                            <option></option>
                           @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                           @endforeach
                       </select>
                    </div>

                    <div class="col-sm-6">
                        <label>Sub Category</label>
                       <select class="form-control form-control" name="sub_id" required id="sub_category">

                       </select>
                    </div>



                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                       <label>Select Unit</label>
                       <select class="form-control form-control" name="unit_id" required>
                           @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                           @endforeach
                       </select>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                       <label>Enter Quantity</label>
                       <input type="number" class="form-control" name="quantity" required>
                    </div>
                </div>

                <button type="submit"  class="btn btn-primary btn-user btn-block">SUBMIT</button>
                <hr>

            </form>

          </div>



        </div>
      </div>
    </div>

    <div class="modal" id="editSupplyModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Enter Supply Informations</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form class="user" action="{{route('admin_update_supplies')}}" method="POST">
                @csrf
                <input type="hidden" name="supply_id" id="supplyEdit">
                <div class="form-group">
                    <textarea class="form-control form-control" placeholder="Item Description" name="description" required id="supplyDescriptionFind"></textarea>
                </div>

                 <div class="form-group row">

                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control" placeholder="Supply Code" name="supply_code" required id="supply_code_find">
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" class="form-control" placeholder="Supply Price Per Unit" name="price" required id="pricefind">
                    </div>

                </div>

                <div class="form-group">
                    <label>Select Department</label>
                    <select class="form-control" name="department_id" required id="departmentFind">
                        @foreach($departments as $dept)
                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row">

                    <div class="col-sm-6">
                        <label>Select Category</label>
                       <select class="form-control form-control" name="category_id" required id="categoryFind">
                           @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                           @endforeach
                       </select>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                       <label>Select Unit</label>
                       <select class="form-control form-control" name="unit_id" required id="unit_idFind">
                           @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                           @endforeach
                       </select>
                    </div>

                </div>

                <button type="submit"  class="btn btn-primary btn-user btn-block">SUBMIT</button>
                <hr>

            </form>

          </div>



        </div>
      </div>
    </div>

    <div class="modal" id="requestSupply">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Supply Stock?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form class="user" action="{{route('admin_restock_supplies')}}" method="POST">
                @csrf
                <input type="hidden" name="supply_id" id="supplyStock">
                <div class="form-group">
                    <label>Enter Quantity</label>
                    <input type="number" name="quantity_order" class="form-control" required>
                </div>
                <button type="submit"  class="btn btn-primary btn-user btn-block">YES</button>

                <hr>

            </form>

          </div>



        </div>
      </div>
    </div>

     <div class="modal" id="supplyRequestOrder">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Request Supply?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form class="user" action="{{route('department_request_check')}}" method="POST">
                @csrf
                <input type="hidden" name="supply_id" id="supplyStockOrder">
                <div class="form-group">
                    <label>Enter Quantity</label>
                    <input type="number" name="quantity_order" class="form-control" required>
                </div>
                <button type="submit"  class="btn btn-primary btn-user btn-block">YES</button>

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
            var findCategory = '{{route("admin_find_category")}}';

            $(".delete").click(function(){
                $("#deleteUser").val($(this).val());
            });

            $(".restock").click(function(){
                $("#supplyStock").val($(this).val());
            });

            $(".order").click(function(){
                $("#supplyStockOrder").val($(this).val());
            });

            $("#category").change(function(){
                var category_id = $(this).val();
                $.ajax({
                   type:'POST',
                   url:findCategory,
                   data:{_token: token, category_id: category_id},
                   success:function(data) {
                     $( "#sub_category" ).empty();
                    data.forEach(function( sub ) {
                      $( "#sub_category" ).append( "<option value="+sub.id+">"+sub.name+"</option>" );
                    });
                   }
                });
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
