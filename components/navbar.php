<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i> 
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
      <!-- Left links -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item" id="birthMenu">
          <a class="nav-link " aria-current="page" href="home.php"><i class="fas fa-baby"></i> แจ้งเกิด</a>
        </li>
        <li class="nav-item" id="deadMenu">
          <a class="nav-link " aria-current="page" href="death.php"><i class="fas fa-skull-crossbones"></i> แจ้งตาย</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user"></i> user
          </a>
          <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li>
              <a class="dropdown-item" href="#">เปลี่ยนรหัสผ่าน</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>