            <div class="sidebar" data-color="danger" data-background-color="white" data-image="<?php echo base_url(); ?>assets/img/sidebar-1.jpg">
                <div class="logo">
                    <a href="<?php echo base_url()?>index.php" class="simple-text logo-normal">
                      <small>Alumni Management System</small>
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item <?php if($page_name == 'dashboard') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/dashboard">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'alumni') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/alumni">
                                <i class="material-icons">school</i>
                                <p>Alumni</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'profile') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/profile">
                                <i class="material-icons">person</i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'notifications') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/notifications">
                                <i class="material-icons">notifications</i>
                                <p>Notifications</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'announcement') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/announcement">
                                <i class="material-icons">announcement</i>
                                <p>Announcement</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'appointment') echo 'active' ?>">
                            <a class="nav-link" href="<?php echo base_url();?>index.php/admin/appointment">
                                <i class="material-icons">event</i>
                                <p>Appointment</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./map.html">
                                <i class="material-icons">location_ons</i>
                                <p>Maps</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./notifications.html">
                                <i class="material-icons">notifications</i>
                                <p>Notifications</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./rtl.html">
                                <i class="material-icons">language</i>
                                <p>RTL Support</p>
                            </a>
                        </li>
                        <li class="nav-item active-pro ">
                            <a class="nav-link" href="./upgrade.html">
                                <i class="material-icons">unarchive</i>
                                <p>Upgrade to PRO</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>