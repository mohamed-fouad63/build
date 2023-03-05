<?php
?>
<div class="navbar-wrapper">
    <div class="navbar-content scroll-div ">
        <div style="height:50px">
        </div>
        <ul class="nav pcoded-inner-navbar ">
            <?php if ($_SESSION['build'] == 1) { ?>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="bi bi-building"></i></span>
                        <span class="pcoded-mtext">المبانى</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="/build/views/buildings.php">هيكل المبانى</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($_SESSION['dvice_office'] == 1) { ?>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="bi bi-pc-display"></i></span>
                        <span class="pcoded-mtext">الاجهزه</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="/build/views/dvices_office.php">اجهزه مكتب</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($_SESSION['all_dvices'] == 1) { ?>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="bi bi-journal-bookmark"></i></span>
                        <span class="pcoded-mtext">السجلات</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="/build/views/all_dvices.php">سجل الاجهزه</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($_SESSION['users'] == 1) { ?>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="bi bi-people-fill"></i></span>
                        <span class="pcoded-mtext">المستخدمين</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="/build/views/users.php">صلاحيات المستخدمين</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>