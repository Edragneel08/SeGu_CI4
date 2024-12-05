<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Admin Dashboard</title>

    <!-- Include PHP Session Check -->
    <?php include ('sessionCheck.php'); ?>

    <!-- Bootstrap core CSS from CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('img/favicon.png'); ?>" rel="icon">
    <link href="<?php echo base_url('img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- External CSS -->
    <link href="<?php echo base_url('lib/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/zabuto_calendar.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('lib/gritter/css/jquery.gritter.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/style-responsive.css'); ?>" rel="stylesheet">

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('lib/chart-master/Chart.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <section id="container">
        <!-- TOP BAR CONTENT & NOTIFICATIONS -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="<?php echo base_url('adminController/login'); ?>" class="logo"><b>JASA<span>PERKASA</span></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url('index.php'); ?>">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php'); ?>">
                                    <div class="task-info">
                                        <div class="desc">Dashio Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                            style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--  notification end -->
            </div>

            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" href="<?php echo base_url('LogOut/logout'); ?>"
                            onclick="return confirmLogout(event);">Logout</a>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- MAIN SIDEBAR MENU -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered">
                        <a href="<?php echo base_url('profile.php'); ?>">
                            <img src="<?php echo base_url('img/ui-sam.jpg'); ?>" class="img-circle" width="80">
                        </a>
                    </p>
                    <?php if (!empty($username)): ?>
                        <h5 class="centered">Hello, <?= $username; ?></h5>
                    <?php else: ?>
                        <script>
                            alert("Your session has ended.");
                            window.location.href = "<?php echo base_url('Home'); ?>";
                        </script>
                    <?php endif; ?>

                    <!-- Admin Dashboard Link -->
                    <li class="mt">
                        <a class="active" href="<?php echo base_url('adminController/login'); ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>MANAGE HR STAFF</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url('adminController/addNewStaff'); ?>">ADD NEW STAFF</a></li>
                            <li><a href="<?php echo base_url('adminController/listOfStaff'); ?>">LIST OF STAFF</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>MANAGE SITES</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url('SiteController/addNewSite'); ?>">ADD NEW SITE</a></li>
                            <li><a href="<?php echo base_url('SiteController/listSite'); ?>">LIST OF SITE</a></li>
                        </ul>
                    </li>

                    <!-- Guard and Schedule Management Links -->
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>MANAGE GUARD</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url('GuardController/addGuard'); ?>">ADD NEW GUARD</a></li>
                            <li><a href="<?php echo base_url('GuardController/guardList'); ?>">LIST OF GUARD</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>MANAGE GUARD SCHEDULE</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url('listGuardCreate.php'); ?>">ADD NEW SCHEDULE</a></li>
                            <li><a href="<?php echo base_url('listSchedule.php'); ?>">LIST OF SCHEDULE</a></li>
                        </ul>
                    </li>

                    <!-- Leave Management -->
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-th"></i>
                            <span>MANAGE LEAVE</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url('listGuarddropDown.php'); ?>">Create New Leave</a></li>
                            <li><a href="<?php echo base_url('listLeave.php'); ?>">View List</a></li>
                            <li><a href="<?php echo base_url('listLeave_Staff.php'); ?>">View List Staff</a></li>
                        </ul>
                    </li>

                    <!-- Salary Management -->
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-bar-chart-o"></i>
                            <span>CALCULATE SALARY</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url('viewSalaryReport.php'); ?>">View Salary Report</a></li>
                            <li><a href="<?php echo base_url('viewScheduleReport.php'); ?>">View Schedule Report</a>
                            </li>
                            <li><a href="<?php echo base_url('viewLeaveReport.php'); ?>">View Leave Report</a></li>
                        </ul>
                    </li>

                    <!-- Staff and Manager View Attendance -->
                    <li class="sub-menu">
                        <a href="<?php echo base_url('listAttendanceGuard.php'); ?>">
                            <i class="fa fa-check-square"></i>
                            <span>VIEW ATTENDANCE</span>
                        </a>
                    </li>

                    <!-- Log Book Management -->
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>GUARD LOG BOOK</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url('createLogBook.php'); ?>">ADD NEW LOG BOOK</a></li>
                            <li><a href="<?php echo base_url('listLogBook.php'); ?>">VIEW LOG BOOK</a></li>
                        </ul>
                    </li>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
    </section>

    <!-- Custom Scripts -->
    <script src="<?php echo base_url('lib/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('lib/jquery.dcjqaccordion.2.7.js'); ?>"></script>
    <script src="<?php echo base_url('lib/jquery.scrollTo.min.js'); ?>"></script>
    <script src="<?php echo base_url('lib/jquery.nicescroll.js'); ?>"></script>
    <script src="<?php echo base_url('lib/jquery.sparkline.js'); ?>"></script>
    <script src="<?php echo base_url('lib/common-scripts.js'); ?>"></script>
    <script src="<?php echo base_url('lib/gritter/js/jquery.gritter.js'); ?>"></script>
    <script src="<?php echo base_url('lib/gritter-conf.js'); ?>"></script>
    <script src="<?php echo base_url('lib/sparkline-chart.js'); ?>"></script>
    <script src="<?php echo base_url('lib/zabuto_calendar.js'); ?>"></script>

    <!-- logout Popup -->
    <script src="<?php echo base_url('js/logout.js'); ?>"></script>
</body>

</html>