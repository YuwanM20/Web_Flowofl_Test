<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n 15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>Labs</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-chart-line"></i>
            <span >Dashboard</span></a>
    </li>


    <!-- Heading -->
   

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Utilities Collapse Menu -->
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div> --}}

    <li class="nav-item active">
        <a class="nav-link collapsed" href="/data/produk" >
            <i class="fas fa-utensils"></i>
            <span>Data Menu</span>
        </a>
    </li>



    <li class="nav-item active">
        <a class="nav-link collapsed" href="/data/pesan">
            <i class="fas fa-comments"></i>
            <span>Data Pesan</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link collapsed gmbr" onclick="maaf()" >
            <i class="fas fa-image"></i>
            <span>Gambar</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link collapsed gmbr" href="/data/akun" >
            <i class="fas fa-user-shield"></i>
            <span>Data Akun</span>
        </a>
    </li>


    <style>
        .gmbr{
            cursor: pointer;
        }
    </style>

    <script>
        function maaf() {

         Swal.fire("Maaf Fitur Gambar Masih Belum Ditambahkan"," ", "error");

}
</script>




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->

</ul>
<!-- End of Sidebar -->