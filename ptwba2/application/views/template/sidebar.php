    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="assets/img/ptwba/wba-block.png"
                alt="navbar brand"
                class="navbar-brand"
                height="40"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <!-- QUERY MENU -->
              <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`, `menu`, `url`, `icon`
                              FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                              WHERE `user_access_menu`.`role_id` = $role_id
                              ORDER BY `user_access_menu`.`menu_id` ASC";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

                <?php foreach ($menu as $m) : ?>
                    <li class="nav-item <?= isset($title) && $title == $m['menu'] ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url($m['url']); ?>">
                            <i class="<?= $m['icon']; ?>"></i>
                            <span><?= $m['menu']; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>

                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-arrow-circle-left"></i>
                    <span>Logout</span>
                  </a>
                </li>

          </div>
        </div>
    </div>
    <!-- End Sidebar -->