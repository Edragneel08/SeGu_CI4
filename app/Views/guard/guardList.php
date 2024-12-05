<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>GUARD LIST</title>

    <!-- Favicons -->
    <link href="<?= base_url('img/favicon.png') ?>" rel="icon">
    <link href="<?= base_url('img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('lib/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- External CSS -->
    <link href="<?= base_url('lib/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style-responsive.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/addGuard.css') ?>">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    <h5 class="centered">Hello, <?= $username; ?></h5>

                    <!-- Admin Dashboard Link -->
                    <li class="mt">
                        <a href="<?php echo base_url('adminController/login'); ?>">
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
                            <li><a href="<?php echo base_url('listStaff.php'); ?>">LIST OF STAFF</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-cogs"></i>
                            <span>MANAGE SITES</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url('addSite.php'); ?>">ADD NEW SITE</a></li>
                            <li><a href="<?php echo base_url('listSite.php'); ?>">LIST OF SITE</a></li>
                        </ul>
                    </li>

                    <!-- Guard and Schedule Management Links -->
                    <li class="sub-menu">
                        <a class="active" href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>MANAGE GUARD</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo base_url('GuardController/addGuard'); ?>">ADD NEW GUARD</a></li>
                            <li><a style="color:green;" href="<?php echo base_url('listGuard.php'); ?>">LIST OF
                                    GUARD</a></li>
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

        <!-- **********************************************************************************************************************************************************
                MAIN CONTENT
                *********************************************************************************************************************************************************** -->
        <!--main content start-->

        <!-- MAIN CONTENT -->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <div>
                    <h4 class="mt-5">Guards List</h4>

                    <iframe id="printFrameCard" style="display:none;"></iframe>

                    <script>
                        document.querySelectorAll('.printButton').forEach(function (button) {
                            button.onclick = function () {
                                var id = this.getAttribute('data-id');
                                var printFrame = document.getElementById('printFrameCard');

                                // Load the guardCard in the iframe
                                printFrame.src = 'guardCard?guardID=' + id;

                                // Wait for the iframe to load and then trigger the print
                                printFrame.onload = function () {
                                    printFrame.contentWindow.print();
                                };
                            };
                        });
                    </script>

                    <br>
                    <div class="search-container">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search..."
                            onkeyup="searchTable()">
                    </div>

                    <br>
                    <div class="table-wrapper">
                        <table class="table table-bordered" id="security-guard-table">
                            <thead>
                                <tr>
                                    <th>GUARD ID</th>
                                    <th>GUARD NAME</th>
                                    <th>GUARD PHOTO</th>
                                    <th>GUARD IC NO</th>
                                    <th>GUARD ADDRESS</th>
                                    <th>GUARD SITE</th>
                                    <th>PHONE NO</th>
                                    <th>STATUS</th>
                                    <th>GENERATE PROFILE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody id="guardTableBody">
                                <?php if (empty($listGuard)): ?>
                                    <tr>
                                        <td colspan="9" style="text-align: center;">No guards found.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($listGuard as $guard): ?>
                                        <tr>
                                            <td><?= esc($guard['guardID']) ?></td>
                                            <td><?= esc($guard['guardName']) ?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <?php if (!empty($guard['img'])): ?>
                                                    <?php
                                                    // Check if the image is already base64-encoded
                                                    if (base64_encode(base64_decode($guard['img'], true)) === $guard['img']) {
                                                        // Image is already base64-encoded
                                                        $base64_img = $guard['img'];
                                                    } else {
                                                        // Encode the binary image data
                                                        $base64_img = base64_encode($guard['img']);
                                                    }
                                                    ?>
                                                    <?php if ($base64_img === false): ?>
                                                        <p>Error encoding image data.</p>
                                                    <?php else: ?>
                                                        <!-- Display the image -->
                                                        <img src="data:image/jpeg;base64,<?= htmlspecialchars($base64_img) ?>"
                                                            alt="Guard Image" style="width: 100px; height: 100px;">
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <!-- Default placeholder image if no base64 image exists -->
                                                    <img src="http://www.placehold.it/100x100/EFEFEF/AAAAAA&amp;text=no+image"
                                                        alt="No Image" style="width: 100px; height: 100px;">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= esc($guard['guardICNO']) ?></td>
                                            <td><?= esc($guard['guardAddress']) ?></td>
                                            <td style="text-align: center;">
                                                <?php if ($guard['siteID'] == 0): ?>
                                                    <form action="<?= site_url('Guards/updateSiteByGuardID') ?>" method="POST"
                                                        class="form-inline"
                                                        style="display: flex; align-items: center; justify-content: center;">
                                                        <input type="hidden" name="guardID" value="<?= esc($guard['guardID']) ?>">
                                                        <div class="form-group" style="margin-right: 10px;">
                                                            <!-- Adjust margin for spacing -->
                                                            <select class="form-control" name="siteID"
                                                                style="width: 200px; font-size: 14px; padding: 5px;">
                                                                <option value="">Select Site</option> <!-- Add a default option -->
                                                                <?php foreach ($listSite as $site): ?>
                                                                    <?php if ($site['status'] == 'Active'): ?>
                                                                        <option value="<?= esc($site['siteID']) ?>">
                                                                            <?= esc($site['siteName']) ?> : <?= esc($site['siteAddress']) ?>
                                                                        </option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <button type="submit" class="btn btn-success btn-sm"
                                                                style="font-size: 12px; padding: 6px 5px;">UPDATE</button>
                                                        </div>



                                                    </form>
                                                <?php else: ?>
                                                    <p class="label label-success"
                                                        style="font-size: 13px; padding: 5px; display: inline-block; text-align: center;">
                                                        <?= esc($guard['siteName']) ?> : <?= esc($guard['siteAddress']) ?>
                                                    </p>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= esc($guard['guardPhoneNo']) ?></td>
                                            <td style="text-align: center;">
                                                <p
                                                    class="label label-<?= $guard['guardStatus'] == 'Active' ? 'success' : 'danger' ?>">
                                                    <?= esc($guard['guardStatus']) ?>
                                                </p>
                                            </td>
                                            <td style="text-align: center;">
                                                <button class="btn btn-success printButton"
                                                    data-id="<?= esc($guard['guardID']) ?>"
                                                    aria-label="Print card for <?= esc($guard['guardName']) ?>">PRINT
                                                    CARD</button>
                                                <iframe id="printFrameCard" style="display:none;"></iframe>

                                                <br><br>
                                                <button class="btn btn-success printBtn" data-id="<?= esc($guard['guardID']) ?>"
                                                    aria-label="Print profile for <?= esc($guard['guardName']) ?>">PRINT
                                                    PROFILE</button>
                                                <iframe id="printFrame" style="display:none;"></iframe>
                                            </td>
                                            <td style="text-align: center;">
                                                <!-- Edit Button with Font Awesome Edit Icon -->
                                                <a href="<?= site_url('Guards/editGuard/' . esc($guard['guardID'])) ?>"
                                                    class="btn btn-primary btn-sm" title="Edit Guard">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <!-- Delete Button with Font Awesome Trash Icon -->
                                                <a href="<?= base_url('GuardController/deleteGuard/' . esc($guard['id'])); ?>"
                                                    class="btn btn-danger btn-sm" title="Delete Guard"
                                                    onclick="return confirm('Are you sure you want to delete this guard?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>

                            <script>
                                document.querySelectorAll('.printBtn').forEach(function (button) {
                                    button.onclick = function () {
                                        var id = this.getAttribute('data-id');
                                        var printFrame = document.getElementById('printFrame');

                                        printFrame.src = 'guardProfilePrint?guardID=' + id;

                                        printFrame.onload = function () {
                                            printFrame.contentWindow.print();
                                        };
                                    };
                                });

                                document.querySelectorAll('.printButton').forEach(function (button) {
                                    button.onclick = function () {
                                        // Implement print card logic here
                                    };
                                });
                            </script>

                        </table>

                        <input type="hidden" id="listGuardSize" value="<?= count($listGuard) ?>">
                        <input type="hidden" id="itemsPerPage" value="5">

                        <nav>
                            <ul class="pagination justify-content-center" id="pagination">
                                <!-- Pagination links will be added here by JavaScript -->
                            </ul>
                        </nav>
                    </div>

                    <script>
                        function searchTable() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("searchInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("guardTableBody");
                            tr = table.getElementsByTagName("tr");

                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td");
                                var found = false;
                                for (var j = 0; j < td.length; j++) {
                                    txtValue = td[j].textContent || td[j].innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        found = true;
                                        break;
                                    }
                                }
                                if (found) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }

                        function showPage(pageNumber) {
                            var itemsPerPage = parseInt(document.getElementById('itemsPerPage').value);
                            var rows = document.getElementById('guardTableBody').rows;

                            var startIndex = (pageNumber - 1) * itemsPerPage;
                            var endIndex = Math.min(startIndex + itemsPerPage, rows.length);

                            for (var i = 0; i < rows.length; i++) {
                                rows[i].style.display = 'none';
                            }

                            for (var i = startIndex; i < endIndex; i++) {
                                rows[i].style.display = '';
                            }

                            updatePagination(pageNumber);
                        }

                        function generatePagination() {
                            var itemsPerPage = parseInt(document.getElementById('itemsPerPage').value);
                            var listGuardSize = parseInt(document.getElementById('listGuardSize').value);
                            var totalPages = Math.ceil(listGuardSize / itemsPerPage);
                            var paginationContainer = document.getElementById('pagination');

                            for (var i = 1; i <= totalPages; i++) {
                                var li = document.createElement('li');
                                li.className = 'page-item';
                                li.innerHTML = '<a href="#" class="page-link" data-page="' + i + '">' + i + '</a>';
                                paginationContainer.appendChild(li);

                                li.addEventListener('click', function (e) {
                                    e.preventDefault();
                                    var pageNumber = parseInt(this.querySelector('a').getAttribute('data-page'));
                                    showPage(pageNumber);
                                });
                            }
                        }

                        function updatePagination(pageNumber) {
                            var paginationLinks = document.querySelectorAll('#pagination li');

                            paginationLinks.forEach(function (link) {
                                link.classList.remove('active');
                            });

                            paginationLinks[pageNumber - 1].classList.add('active');
                        }

                        window.onload = function () {
                            generatePagination();
                            showPage(1);
                        };
                    </script>
                </div>
            </section>
        </section>

        <!--main content end-->

    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('lib/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('lib/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('lib/jquery-ui-1.9.2.custom.min.js') ?>"></script>
    <script src="<?= base_url('lib/jquery.ui.touch-punch.min.js') ?>"></script>
    <script class="include" type="text/javascript" src="<?= base_url('lib/jquery.dcjqaccordion.2.7.js') ?>"></script>
    <script src="<?= base_url('lib/jquery.scrollTo.min.js') ?>"></script>
    <script src="<?= base_url('lib/jquery.nicescroll.js') ?>" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="<?= base_url('lib/common-scripts.js') ?>"></script>

</body>

</html>