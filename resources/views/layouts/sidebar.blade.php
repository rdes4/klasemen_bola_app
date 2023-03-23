 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
        <i class="fas fa-futbol"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Klasemen Sepak Bola</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{url('club/create')}}">
        <i class="fas fa-fw fa-plus-square"></i>
        <span>Tambah Klub</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('hasil_pertandingan')}}">
    <i class="fas fa-fw fa-exchange-alt"></i>
        <span>Hasil Pertandingan</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('club')}}">
        <i class="fas fa-fw fa-list-ol"></i>
        <span>Klasemen</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->