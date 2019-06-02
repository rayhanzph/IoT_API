
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-cloud"></i>
        </div>
        <div class="sidebar-brand-text mx-3">internet of things</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <?php foreach($menu as $m) : ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url().$m['url']; ?>">
          <i class="fas fa-fw <?= $m['icon']; ?>"></i>
          <span><?= $m['title']; ?></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
    <?php endforeach; ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
