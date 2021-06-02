<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">&nbsp;LifeMedia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="<?= base_url() ?>home/login2" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="bill-main" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="mng-users" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>home/online_users" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Online Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item has-treeview">
                            <a href="mng-batch.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Batch User
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="mng-hs.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotspots</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mng-rad-nas.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mng-rad-usergroup.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User-Groups</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mng-rad-profiles.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profiles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mng-rad-hunt.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>HuntGroups</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mng-rad-attributes.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attributes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mng-rad-realms.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Realms/Proxys</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mng-rad-ippool.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>IP-Pool</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?= base_url() ?>home/data_wifi" class="nav-link">
                        <i class="nav-icon fas fa-server"></i>
                        <p>
                            Data Wifi
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview">
                    <a href="bill-main.php" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            <?php //echo t('menu', 'Report'); 
                            ?>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="rep-main.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="rep-pos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    POST
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="rep-logs.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="rep-status.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="rep-batch.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batch Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="rep-hb.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="bill-main.php" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            <?php //echo t('menu', 'Accounting'); 
                            ?>
                            Accounting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="acct-main.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="acct-pos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    POST
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="acct-plans.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Plans</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="acct-custom.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Custom</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="acct-hotspot.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotspot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="acct-maintenance.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maintenance</p>
                            </a>
                        </li>
                        <a class="dropdown-item" href="rep-main.php">General</a>
                        <a class="dropdown-item" href="rep-logs.php">Logs</a>
                        <a class="dropdown-item" href="rep-status.php">Status</a>
                        <a class="dropdown-item" href="rep-batch.php">Batch Users</a>
                        <a class="dropdown-item" href="rep-hb.php">Dashboard</a>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="bill-main.php" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            <?php //echo t('menu', 'Billing'); 
                            ?>
                            Billing
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="bill-main.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Billing Main</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="bill-pos.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    POST
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="bill-plans.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Plans</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="bill-rates.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rates</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="bill-merchant.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Merchant-Transactions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="bill-history.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Billing-History</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="bill-invoices.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="bill-payments.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gis-main.php">
                        <i class="fas fa-circle nav-icon"></i>
                        <p><?php //echo t('menu', 'Help'); 
                            ?></p>
                        <p>GIS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="graph-main.php">
                        <i class="fas fa-circle nav-icon"></i>
                        <p><?php //echo t('menu', 'Help'); 
                            ?></p>
                        <p>Graph</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="acct-main.php" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            <?php //echo t('menu', 'Config'); 
                            ?>
                            Config
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="config-main.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="config-report.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Reporting
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="config-maint.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maintenence</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="config-operators.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Operators</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="config-backup.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Backup</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="help-main.php">
                        <i class="fas fa-circle nav-icon"></i>
                        <p><?php //echo t('menu', 'Help'); 
                            ?></p>
                        <p>Help</p>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>