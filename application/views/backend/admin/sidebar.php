            <div class="sidebar" data-color="<?php echo $_SESSION['theme_color'] ?>" data-background-color="white" data-image="<?php echo base_url(); ?>assets/img/sidebar-1.jpg">
                <div class="logo">
                    <a href="<?php echo base_url()?>" class="simple-text logo-normal">
                      <small>Alumni Management System</small>
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item <?php if($page_name == 'dashboard') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/dashboard">
                                <i class="material-icons <?php if($page_name != 'dashboard') echo 'text-'.$_SESSION['theme_color'] ?>">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'alumni') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/alumni">
                                <i class="material-icons <?php if($page_name != 'alumni') echo 'text-'.$_SESSION['theme_color'] ?>">school</i>
                                <p>Alumni</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'notifications') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/notifications">
                                <i class="material-icons <?php if($page_name != 'notifications') echo 'text-'.$_SESSION['theme_color'] ?>">notifications</i>
                                <p>Notifications</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'announcement') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/announcement">
                                <i class="material-icons <?php if($page_name != 'announcement') echo 'text-'.$_SESSION['theme_color'] ?>">announcement</i>
                                <p>Announcements</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'appointment') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url();?>index.php/admin/appointment">
                                <i class="material-icons <?php if($page_name != 'appointment') echo 'text-'.$_SESSION['theme_color'] ?>">event</i>
                                <p>Appointments</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>