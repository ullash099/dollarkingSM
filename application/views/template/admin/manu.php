<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <!--<input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>-->
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo ($active_menu == 'deshboard') ? 'active' : '' ?>">
          <a href="<?php echo base_url(); ?>">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Home</span>
          </a>
        </li>
        <!--customize manu start-->
        <!-- raw material stock-->
        <li class="treeview <?php //echo ($active_menu == 'Settings') ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-stack-overflow" aria-hidden="true"></i>
            <span>Raw Material Stock</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php //echo (isset($active_child_menu) && ($active_child_menu == 'all_jumbo_roll' || $active_child_menu == 'new_jumbo_roll'|| $active_child_menu == 'edit_jumbo_roll')) ? "active" : '' ?>">
              <a href="<?php //echo base_url('Settings'); ?>">
                <i class="fa fa-circle-o"></i> Jumbo Roll
              </a>
            </li>
            <li>
              <a href="pages/layout/boxed.html">
                <i class="fa fa-circle-o"></i>Bobbin
              </a>
            </li>
            <li class="<?php //echo (isset($active_child_menu) && ($active_child_menu == 'all_carton_box' || $active_child_menu == 'new_carton_box'|| $active_child_menu == 'edit_carton_box')) ? "active" : '' ?>">
              <a href="<?php //echo base_url('Settings/cartonBox'); ?>">
                <i class="fa fa-circle-o"></i>Carton Box
              </a>
            </li>
          </ul>
        </li>
        <!--/raw material stock end-->
        <!--settings start-->
        <li class="treeview <?php echo ($active_menu == 'Settings') ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo (isset($active_child_menu) && ($active_child_menu == 'all_jumbo_roll' || $active_child_menu == 'new_jumbo_roll'|| $active_child_menu == 'edit_jumbo_roll')) ? "active" : '' ?>">
              <a href="<?php echo base_url('Settings'); ?>">
                <i class="fa fa-circle-o"></i> Jumbo Roll
              </a>
            </li>
            <li>
              <a href="pages/layout/boxed.html">
                <i class="fa fa-circle-o"></i>Bobbin
              </a>
            </li>
            <li class="<?php echo (isset($active_child_menu) && ($active_child_menu == 'all_carton_box' || $active_child_menu == 'new_carton_box'|| $active_child_menu == 'edit_carton_box')) ? "active" : '' ?>">
              <a href="<?php echo base_url('Settings/cartonBox'); ?>">
                <i class="fa fa-circle-o"></i>Carton Box
              </a>
            </li>
          </ul>
        </li>
        <!--/settings end-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <?php if ($this->session->userdata('admin_role') == 1){ ?>
        <li class="<?php echo ($active_menu == 'admin\'s') ? 'active' : '' ?>">
          <a href="<?php echo base_url('NewAdmin') ?>">
            <i class="fa fa-user-secret" aria-hidden="true"></i><span>New Admin</span>
          </a>
        </li>
        <?php }?>
        <!--customize manu end-->
        <!--don't touch About manu-->
        <li class="header">Software Info</li>
        <li><a href="<?php echo base_url('SoftwareAbout')  ?>">
          <i class="fa fa-circle-o text-aqua"></i>
          <span>About</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">