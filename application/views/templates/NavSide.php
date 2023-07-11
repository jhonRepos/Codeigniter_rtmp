
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('homepage')?>" class="brand-link">
    
      <span class="brand-text font-weight-light">HOTEL MANAGE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               
          <li class="nav-item">
            <a href="<?php echo base_url('channel')?>" class="nav-link" <?= uri_string() == 'channel' ? 'style="background-color:#6c757d "':'' ?>>
              <i class="nav-icon fas fa-th"></i>
              <p>channels</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('category')?>" class="nav-link" <?= uri_string() == 'category' ? 'style="background-color:#6c757d "':'' ?>>
              <i class="nav-icon fas fa-th"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('movie')?>" class="nav-link"<?= uri_string() == 'movie' ? 'style="background-color:#6c757d "':'' ?>>
              <i class="nav-icon fas fa-th"></i>
              <p>Upload Movie</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo base_url('movielist')?>" class="nav-link"<?= uri_string() == 'movielist' ? 'style="background-color:#6c757d "':'' ?>>
              <i class="nav-icon fas fa-th"></i>
              <p>Movie list</p>
            </a>
          </li>
               <li class="nav-item">
            <a href="<?php echo base_url('activity_log')?>" class="nav-link"<?= uri_string() == 'activity_log' ? 'style="background-color:#6c757d "':'' ?>>
              <i class="nav-icon fas fa-th"></i>
              <p>Activity log</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="login/logout" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Logout</p>
            </a>
          </li>
      

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>