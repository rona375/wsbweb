<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
    </li> <!-- End Dashboard Nav -->

    <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="?menu=profile">
        <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="?menu=table">
      <i class="bi bi-layout-text-window-reverse"></i>
      <span>Tables</span>
      </a>
    </li> <!-- End Tables Nav -->

    <li class="nav-item">
    <a class="nav-link collapsed" href="http://localhost/Projek%20Semester%203/template/index.php" 
      onclick="return confirm('Anda yakin ingin logout?');">
      <i class="bi bi-box-arrow-right"></i>
      <span>Logout</span>
    </a>
    </li> <!-- End Logout Page Nav -->

   <p>  </p> 
   <!-- buat kasih jarak -->

    <li class="nav-item">
    <a class="nav-link collapsed d-flex align-items-center justify-content-between" href="#" id="dark-mode-toggle">
        <span id="theme-text">Dark Mode</span>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
        </div>
    </a>
    </li><!-- End Dark Mode Toggle Nav -->

  </ul>
</aside><!-- End Sidebar -->
