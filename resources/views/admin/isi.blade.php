@include('admin.head')
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h5 class=""><span id="tanggalwaktu"></span></h5>
                    <script>
                        var tw = new Date();
                    if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
                    else (a=tw.getTime());
                    tw.setTime(a);
                    var tahun= tw.getFullYear ();
                    var hari= tw.getDay ();
                    var bulan= tw.getMonth ();
                    var tanggal= tw.getDate ();
                    var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
                    var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
                    document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+"-"+bulanarray[bulan]+"-"+tahun+",  " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes() + (" WIB ");
                        </script>
                 
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 " style="font-size: 15px;">{{session('nama')}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('sbadmin')}}/img/p.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item " style="cursor: pointer;" onclick="isii()">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                              
                            </div>

                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <script>
                    function isii() {
            
                     Swal.fire("Maaf Fitur Profil Masih Ditangguhkan"," ", "error");
            
            }
            </script>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('konten')
                    
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
                    <h5 class="modal-title" id="exampleModalLabel">apakah kaka ingin Keluar</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <a href="/logout" type="button" class="btn btn-primary">Logout</a>
                    {{-- <button class="btn btn-primary" ><a href="/logout">Logout</button> --}}

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('sbadmin')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('sbadmin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('sbadmin')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('sbadmin')}}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{asset('sbadmin')}}/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('sbadmin')}}/js/demo/chart-area-demo.js"></script>
    <script src="{{asset('sbadmin')}}/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

</body>

</html>