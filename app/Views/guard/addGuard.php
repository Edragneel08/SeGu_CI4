<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Add New Guard</title>

    <!-- Favicons -->
    <link href="<?php echo base_url('img/favicon.png'); ?>" rel="icon">
    <link href="<?php echo base_url('img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('lib/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- External CSS -->
    <link href="<?php echo base_url('lib/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/style-responsive.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('css/addGuard.css'); ?>">
    <link href="<?php echo base_url('css/lib/bootstrap-fileupload/bootstrap-fileupload.css'); ?>" rel="stylesheet">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .content-block {
            display: none;
            margin-top: 20px;
        }

        .content-block.active {
            display: block;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: none;
            padding: 8px;
        }

        .btn-theme {
            margin-top: 10px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }

        .form fieldset {
            border: none;
        }

        .form legend {
            border: none;
        }



        /* Highlight Empty Fields */
        .invalid {
            border-color: red;
        }

        /* Popup Styles */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            margin: 10% auto;
        }

        .popup-content h3 {
            margin-bottom: 10px;
        }

        .popup-content ul {
            list-style: none;
            padding: 0;
            text-align: left;
            margin-bottom: 20px;
        }

        .popup-content ul li {
            margin-bottom: 5px;
        }

        .popup-content button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-content button:hover {
            background: #0056b3;
        }
    </style>

    <script>
        function addEducationEntry(school = '', state = '', dateStart = '', dateTo = '') {
            const educationEntries = document.getElementById('educationEntries');
            const newEntry = document.createElement('div');
            newEntry.className = 'education-entry';
            newEntry.innerHTML = `
            <table>
            <tr>
                <td>
                    <label for='school'>SCHOOL/UNIVERSITY</label>
                    <input type='text' name='school[]' value='${school}' required>
                </td>
                <td>
                    <label for='state'>STATE</label>
                    <input type='text' name='state[]' value='${state}' required>
                </td>
                <td>
                    <label for='dateStart'>DATE FROM:</label>
                    <input type='date' name='dateStart[]' value='${dateStart}' min='1900-01-01' max='2099-12-31' required>
                </td>
                <td>
                    <label for='dateTo'>DATE TO:</label>
                    <input type='date' name='dateTo[]' value='${dateTo}' min='1900-01-01' max='2099-12-31' required>
                </td>
            </tr>
            </table>`;
            educationEntries.appendChild(newEntry);
        }
    </script>

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
                            <li><a href="<?php echo base_url('listStaff.php'); ?>">LIST OF
                                    STAFF</a></li>
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
                            <li><a style="color:green;" href="<?php echo base_url('GuardController/addGuard'); ?>">ADD
                                    NEW GUARD</a></li>
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

        <!-- 
            **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** 
        -->
        <!--main content start-->

        <section id="main-content">
            <section class="wrapper site-min-height">
                <div class="container">
                    <div class="form">
                        <form id="myForm" action="insertGuard" method="POST" enctype="multipart/form-data">
                            <button class="btn btn-theme" type="button" onclick="showContent('editGuard')">PERSONAL
                                DETAILS</button>
                            <button class="btn btn-theme" type="button" onclick="showContent('content2')">FAMILY
                                DETAILS</button>
                            <button class="btn btn-theme" type="button" onclick="showContent('content3')">EDU
                                BACKGROUND</button>
                            <button class="btn btn-theme" type="button" onclick="showContent('content4')">PREVIOUS
                                EMPLOYMENT</button>
                            <button class="btn btn-theme" type="button" onclick="showContent('content5')">EX-POLICE OR
                                ARMY
                                DETAILS</button>
                            <button class="btn btn-theme" type="button" onclick="showContent('content6')">
                                REFERENCES</button>


                            <!-- START OF PERSONAL DETAILS -->
                            <div id="editGuard" class="content-block active">
                                <div class="container">
                                    <div class="form"><br>
                                        <fieldset>
                                            <legend>Personal Details</legend><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Staff Image (optional) :</label>
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail"
                                                            style="width: 200px; height: 150px;">
                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                                alt="No image">
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                                            style="max-width: 200px; max-height: 150px;"></div>
                                                        <div>
                                                            <span class="btn btn-theme02 btn-file">
                                                                <span class="fileupload-new"><i
                                                                        class="fa fa-paperclip"></i> Select image</span>
                                                                <span class="fileupload-exists"><i
                                                                        class="fa fa-undo"></i> Change</span>
                                                                <!-- Accept multiple image types -->
                                                                <input type="file" class="default" name="img"
                                                                    accept=".jpg,.jpeg,.png">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>GUARD FULLNAME:</label>
                                                    <input type="text" class="form-control" name="guardName"
                                                        required="required" />

                                                    <label>IC NO:</label>
                                                    <input type="text" class="form-control" name="guardICNO"
                                                        required="required" />
                                                </div>

                                                <div class="col-md-4">
                                                    <label>SALARY:</label>
                                                    <input type="text" class="form-control" name="guardSalary"
                                                        required="required" />

                                                    <label>ACCOUNT NO:</label>
                                                    <input type="text" class="form-control" name="guardAccNo"
                                                        required="required" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>BANK :</label>
                                                    <input type="text" class="form-control" name="guardNOB"
                                                        required="required" />
                                                </div>
                                            </div>
                                            <br><br>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>ADDRESS:</label>
                                                    <textarea class="form-control" name="guardAddress"
                                                        required="required"></textarea>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>TELEPHONE NO:</label>
                                                    <input type="text" class="form-control" name="guardPhoneNo"
                                                        required="required" />
                                                </div>

                                                <div class="col-md-4">
                                                    <label>RACE:</label>
                                                    <select class="form-control" name="guardRace" id="guardRace">
                                                        <option value="">Choose Race</option>
                                                        <option value="MALAY">MALAY</option>
                                                        <option value="CHINESE">CHINESE</option>
                                                        <option value="INDIAN">INDIAN</option>
                                                        <option value="OTHERS">OTHERS</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>DATE OF BIRTH:</label>
                                                    <input type="date" class="form-control" name="guardDOB" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>PLACE OF BIRTH:</label>
                                                    <input type="text" class="form-control" name="guardPOB" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>GENDER:</label>
                                                    <select class="form-control" name="guardGender" id="guardGender">
                                                        <option value="">Choose</option>
                                                        <option value="MALE">MALE</option>
                                                        <option value="FEMALE">FEMALE</option>
                                                        <option value="OTHERS">OTHERS</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>RELIGION:</label>
                                                    <select class="form-control" name="religion" id="religion">
                                                        <option value="">Choose Religion</option>
                                                        <option value="ISLAM">ISLAM</option>
                                                        <option value="CHRISTIAN">CHRISTIAN</option>
                                                        <option value="BUDDHA">BUDDHA</option>
                                                        <option value="OTHERS">OTHERS</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>NATIONALITY:</label>
                                                    <input type="text" class="form-control" name="nationality" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>SOCSO NO:</label>
                                                    <input type="text" class="form-control" name="guardSocsoNo" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>EPF NO:</label>
                                                    <input type="text" class="form-control" name="guardEPFNo" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="dateStart">START WORK:</label>
                                                    <input type="date" name="dateWorkStart" min="1900" max="2099"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="dateTO">CONTRACT END:</label>
                                                    <input type="date" name="dateContractEnd" min="1900" max="2099"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <button class="btn btn-theme" type="button"
                                                onclick="showContent('content2')">NEXT</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <!-- END OF PERSONAL DETAILS -->

                            <!-- START FAM DETAILS -->
                            <div id="content2" class="content-block">
                                <div class="container">
                                    <div class="form">
                                        <fieldset>
                                            <legend>Family Details</legend>

                                            <script>
                                                function showTextField() {
                                                    var singleRadio = document.getElementById("single");
                                                    var marriedRadio = document.getElementById("married");
                                                    var divorcedRadio = document.getElementById("divorced");
                                                    var otherStatusField = document.getElementById("otherStatusField");

                                                    if (singleRadio.checked) {
                                                        otherStatusField.style.display = "none";
                                                        document.getElementsByName("guardSpName")[0].value = "-";
                                                        document.getElementsByName("guardFamOccu")[0].value = "-";
                                                        document.getElementsByName("guardFamNoP1")[0].value = "-";
                                                        document.getElementsByName("guardNumOfChild")[0].value = "-";
                                                        document.getElementsByName("guardSpAdd")[0].value = "-";
                                                    } else if (marriedRadio.checked || divorcedRadio.checked) {
                                                        otherStatusField.style.display = "block";
                                                    } else {
                                                        otherStatusField.style.display = "none";
                                                    }
                                                }

                                                window.onload = function () {
                                                    showTextField();
                                                }
                                            </script>

                                            <table>
                                                <tr>
                                                    <td>
                                                        <!-- Hidden field for guardID -->
                                                        <input type="hidden" name="guardID" value="" />

                                                        <label for="maritalStatus">MARITAL STATUS:</label><br>
                                                        <input type="radio" id="single" name="maritalStatus"
                                                            value="SINGLE" onclick="showTextField()">
                                                        <label for="single">SINGLE</label><br>

                                                        <input type="radio" id="married" name="maritalStatus"
                                                            value="MARRIED" onclick="showTextField()">
                                                        <label for="married">MARRIED</label><br>

                                                        <input type="radio" id="divorced" name="maritalStatus"
                                                            value="DIVORCED" onclick="showTextField()">
                                                        <label for="divorced">DIVORCED</label><br>
                                                    </td>
                                                    <td>
                                                        <div id="otherStatusField" style="display: none;">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <label>NAME OF SPOUSE: </label>
                                                                        <input type="text" value="" class="form-control"
                                                                            name="guardSpName" />
                                                                    </td>
                                                                    <td>
                                                                        <label>OCCUPATION: </label>
                                                                        <input type="text" value="" class="form-control"
                                                                            name="guardFamOccu" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label>TELEPHONE NO: </label>
                                                                        <input type="text" value="" class="form-control"
                                                                            name="guardFamNoP1" />
                                                                    </td>
                                                                    <td>
                                                                        <label>NO. OF CHILDREN: </label>
                                                                        <input type="text" value="" class="form-control"
                                                                            name="guardNumOfChild" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <label>SPOUSE ADDRESS: </label>
                                                                        <input type="text" value="" class="form-control"
                                                                            name="guardSpAdd" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Repeat similar pattern for Father, Mother, and Address fields -->
                                                <tr>
                                                    <td>
                                                        <label>FATHER’S NAME: </label>
                                                        <input type="text" value="" class="form-control"
                                                            name="guardFN" />
                                                    </td>
                                                    <td>
                                                        <label>OCCUPATION: </label>
                                                        <input type="text" value="" class="form-control"
                                                            name="guardFOccu" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>MOTHER’S NAME: </label>
                                                        <input type="text" value="" class="form-control"
                                                            name="guardMomName" />
                                                    </td>
                                                    <td>
                                                        <label>OCCUPATION: </label>
                                                        <input type="text" value="" class="form-control"
                                                            name="guardMomOccu" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <label>ADDRESS: </label>
                                                        <input type="text" value="" class="form-control"
                                                            name="guardParentAdd" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-lg-12 d-flex justify-content-end">
                                                    <button class="btn btn-theme" type="button"
                                                        onclick="showContent('content3')">NEXT</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!-- END FAM DETAILS -->

                            <!-- START EDU DETAILS -->
                            <div id="content3" class="content-block">
                                <div class="container">
                                    <div class="form">
                                        <fieldset>
                                            <legend>Educational Background</legend>

                                            <button type="button" onclick="addEducationEntry()">Add Educational
                                                Background</button><br><br>

                                            <script>
                                                function addEducationEntry() {
                                                    const educationEntries = document.getElementById('educationEntries');
                                                    const newEntry = document.createElement('div');
                                                    newEntry.className = 'education-entry';
                                                    newEntry.innerHTML = `
                                                    <input type="hidden" name="id[]" value="">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label for="school">SCHOOL/UNIVERSITY</label>
                                                                <input type="text" name="school[]" required>
                                                            </td>
                                                            <td>
                                                                <label for="state">STATE</label>
                                                                <input type="text" name="state[]" required>
                                                            </td>
                                                            <td>
                                                                <label for="dateStart">DATE FROM:</label>
                                                                <input type="date" name="dateStart[]" min="1900" max="2099" required>
                                                            </td>
                                                            <td>
                                                                <label for="dateTo">DATE TO:</label>
                                                                <input type="date" name="dateTo[]" min="1900" max="2099" required>
                                                            </td>
                                                        </tr>
                                                    </table>`;
                                                    educationEntries.appendChild(newEntry);
                                                }
                                            </script>

                                            <div id="educationEntries">
                                                <?php if (isset($guardEduBg) && !empty($guardEduBg)): ?>
                                                    <?php foreach ($guardEduBg as $edu): ?>
                                                        <div class="education-entry">
                                                            <input type="hidden" name="id[]" value="<?= $edu['id'] ?>">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <label for="school">SCHOOL/UNIVERSITY</label>
                                                                        <input type="text" name="school[]"
                                                                            value="<?= $edu['school'] ?>" required>
                                                                    </td>
                                                                    <td>
                                                                        <label for="state">STATE</label>
                                                                        <input type="text" name="state[]"
                                                                            value="<?= $edu['state'] ?>" required>
                                                                    </td>
                                                                    <td>
                                                                        <label for="dateStart">DATE FROM:</label>
                                                                        <input type="date" name="dateStart[]"
                                                                            value="<?= $edu['dateStart'] ?>" min="1900"
                                                                            max="2099" required>
                                                                    </td>
                                                                    <td>
                                                                        <label for="dateTo">DATE TO:</label>
                                                                        <input type="date" name="dateTo[]"
                                                                            value="<?= $edu['dateTo'] ?>" min="1900" max="2099"
                                                                            required>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="row">
                                                <div class="col-lg-12 d-flex justify-content-end">
                                                    <button class="btn btn-theme" type="button"
                                                        onclick="showContent('content4')">NEXT</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!-- END EDU DETAILS -->

                            <!-- START PREVIOUS DETAILS -->
                            <div id="content4" class="content-block">
                                <div class="container">
                                    <div class="form">
                                        <fieldset>
                                            <legend>Previous Employment Position</legend>

                                            <button type="button" onclick="PreviousEmploymentEntry()">Add Previous
                                                Employment</button><br><br>

                                            <script>
                                                function PreviousEmploymentEntry() {
                                                    const previousEmploymentEntries = document.getElementById('previousEmploymentEntries');
                                                    const newEntry = document.createElement('div');
                                                    newEntry.className = 'previousEmployment-entry';
                                                    newEntry.innerHTML = `
                                                    <input type="hidden" name="prevJobId[]" value="">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label>EMPLOYER’S NAME</label>
                                                                <input type="text" name="employerName[]" required>
                                                            </td>
                                                            <td>
                                                                <label for="positionHeld">POSITION HELD</label>
                                                                <input type="text" name="positionHeld[]" required>
                                                            </td>
                                                            <td>
                                                                <label for="dateStart">DATE FROM:</label>
                                                                <input type="date" name="dateStart[]" min="1900" max="2099" required>
                                                            </td>
                                                            <td>
                                                                <label for="dateTo">DATE TO:</label>
                                                                <input type="date" name="dateTo[]" min="1900" max="2099" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <label for="EA">EMPLOYER’S ADDRESS</label>
                                                                <input type="text" name="EA[]" required>
                                                            </td>
                                                            <td colspan="2">
                                                                <label for="RoL">REASON OF LEAVING</label>
                                                                <input type="text" name="RoL[]" required>
                                                            </td>
                                                        </tr>
                                                    </table>`;
                                                    previousEmploymentEntries.appendChild(newEntry);
                                                }
                                            </script>

                                            <div id="previousEmploymentEntries">
                                                <?php if (isset($guardPreviousJob) && !empty($guardPreviousJob)): ?>
                                                    <?php foreach ($guardPreviousJob as $preJob): ?>
                                                        <div class="previousEmployment-entry">
                                                            <input type="hidden" name="prevJobId[]"
                                                                value="<?= $preJob['prevJobId'] ?>">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <label>EMPLOYER’S NAME</label>
                                                                        <input type="text" name="employerName[]"
                                                                            value="<?= $preJob['employerName'] ?>" required>
                                                                    </td>
                                                                    <td>
                                                                        <label for="positionHeld">POSITION HELD</label>
                                                                        <input type="text" name="positionHeld[]"
                                                                            value="<?= $preJob['positionHeld'] ?>" required>
                                                                    </td>
                                                                    <td>
                                                                        <label for="dateStart">DATE FROM:</label>
                                                                        <input type="date" name="dateStart[]"
                                                                            value="<?= $preJob['dateStart'] ?>" min="1900"
                                                                            max="2099" required>
                                                                    </td>
                                                                    <td>
                                                                        <label for="dateTo">DATE TO:</label>
                                                                        <input type="date" name="dateTo[]"
                                                                            value="<?= $preJob['dateTo'] ?>" min="1900"
                                                                            max="2099" required>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <label for="EA">EMPLOYER’S ADDRESS</label>
                                                                        <input type="text" name="EA[]"
                                                                            value="<?= $preJob['EA'] ?>" required>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <label for="RoL">REASON OF LEAVING</label>
                                                                        <input type="text" name="RoL[]"
                                                                            value="<?= $preJob['RoL'] ?>" required>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-lg-12 d-flex justify-content-end">
                                                    <button class="btn btn-theme" type="button"
                                                        onclick="showContent('content5')">NEXT</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!-- END PREVIOUS DETAILS -->

                            <!-- START POLICE ARMY DETAILS -->
                            <div id="content5" class="content-block">
                                <div class="container">
                                    <div class="form">
                                        <fieldset>
                                            <legend>Ex-Police Or Ex-Army</legend>
                                            <script>
                                                function showTxtField() {
                                                    var yesRadio = document.getElementById("YES");
                                                    var statusField = document.getElementById("statusField");
                                                    if (yesRadio.checked) {
                                                        statusField.style.display = "block"; // Show the text field
                                                    } else {
                                                        statusField.style.display = "none"; // Hide the text field for other options
                                                        document.getElementsByName("guardServiceNo")[0].value = "-";
                                                        document.getElementsByName("guardPosition")[0].value = "-";
                                                        document.getElementsByName("dateStart")[0].value = "";
                                                        document.getElementsByName("dateTo")[0].value = "";
                                                        document.getElementsByName("guardBranch")[0].value = "-";
                                                        document.getElementsByName("guardRFLPA")[0].value = "-";
                                                    }
                                                }

                                                window.onload = function () {
                                                    showTxtField();
                                                }
                                            </script>

                                            <!-- No Guard ID needed for insert, it's auto-generated -->
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label for="exArmyOrPolice">Ex Army Or Police:</label><br>
                                                        <input type="radio" id="YES" name="exArmyOrPolice" value="YES"
                                                            onclick="showTxtField()">
                                                        <label for="YES">YES</label><br>

                                                        <input type="radio" id="NO" name="exArmyOrPolice" value="NO"
                                                            onclick="showTxtField()">
                                                        <label for="NO">NO</label><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="statusField" style="display: none;">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <label>SERVICE NO:</label>
                                                                        <input type="text"
                                                                            placeholder="Enter service number"
                                                                            class="form-control"
                                                                            name="guardServiceNo" />
                                                                    </td>
                                                                    <td>
                                                                        <label>POSITION HELD:</label>
                                                                        <input type="text"
                                                                            placeholder="Enter position held"
                                                                            class="form-control" name="guardPosition" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label for="dateStart">DATE
                                                                            FROM:</label><br>
                                                                        <input type="date" name="dateStart" min="1900"
                                                                            max="2099">
                                                                    </td>
                                                                    <td>
                                                                        <label for="dateTo">DATE TO:</label><br>
                                                                        <input type="date" name="dateTo" min="1900"
                                                                            max="2099">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label>BRANCH:</label>
                                                                        <input type="text" placeholder="Enter branch"
                                                                            class="form-control" name="guardBranch" />
                                                                    </td>
                                                                    <td>
                                                                        <label>REASON FOR LEAVING:</label>
                                                                        <input type="text"
                                                                            placeholder="Reason for leaving"
                                                                            class="form-control" name="guardRFLPA" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-lg-12 d-flex justify-content-end">
                                                    <button class="btn btn-theme" type="button"
                                                        onclick="showContent('content6')">NEXT</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!-- END POLICE ARMY DETAILS -->

                            <!-- START REFERENCES DETAILS -->
                            <div id="content6" class="content-block">
                                <div class="container">
                                    <div class="form">
                                        <fieldset>
                                            <legend>
                                                Personal References
                                            </legend>

                                            <table>
                                                <tr>
                                                    <td>
                                                        <label>REFERENCE NAME:</label>
                                                        <input type="text" placeholder="Enter reference name"
                                                            class="form-control" name="guardReferName" required />
                                                    </td>

                                                    <td>
                                                        <label>REFERENCE JOB:</label>
                                                        <input type="text" placeholder="Enter reference job"
                                                            class="form-control" name="guardReferJob" required />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <label>ADDRESS:</label>
                                                        <textarea class="form-control" name="guardReferAddress"
                                                            placeholder="Enter address" required></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>REFERENCE RELATION:</label>
                                                        <input type="text" placeholder="Enter relationship"
                                                            class="form-control" name="guardReferRelation" required />
                                                    </td>
                                                    <td>
                                                        <label>REFERENCE TELEPHONE NO:</label>
                                                        <input type="text" placeholder="Enter phone number"
                                                            class="form-control" name="guardReferPhoneNo" required />
                                                    </td>
                                                </tr>
                                            </table>

                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary"
                                                    onclick="validateForm(event)">Submit</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!-- END REFERENCES DETAILS -->
                        </form>
                    </div>
                </div>

                <!-- Custom Popup for blank form-->
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <h3>Please Fills the form</h3>
                        <ul id="missingFieldsList"></ul>
                        <button onclick="closePopup()">OK</button>
                    </div>
                </div>

                <script>
                    function validateForm(event) {
                        const form = document.querySelector('#myForm');
                        const requiredFields = form.querySelectorAll('[required]');
                        let missingFields = [];

                        requiredFields.forEach(field => {
                            if (!field.value.trim()) {
                                field.classList.add('invalid'); // Highlight the empty field
                                const fieldLabel = field.previousElementSibling.textContent.trim();
                                missingFields.push(fieldLabel);
                            } else {
                                field.classList.remove('invalid'); // Remove highlight if filled
                            }
                        });

                        if (missingFields.length > 0) {
                            event.preventDefault(); // Prevent form submission
                            const missingFieldsList = document.getElementById('missingFieldsList');
                            missingFieldsList.innerHTML = ''; // Clear previous content
                            missingFields.forEach(field => {
                                const li = document.createElement('li');
                                li.textContent = field;
                                missingFieldsList.appendChild(li);
                            });
                            document.getElementById('popup').style.display = 'block'; // Show popup
                        }
                    }

                    function closePopup() {
                        document.getElementById('popup').style.display = 'none';
                    }
                </script>

                <script>
                    function showContent(id) {
                        // Hide all sections
                        var contentBlocks = document.querySelectorAll('.content-block');
                        contentBlocks.forEach(function (block) {
                            block.classList.remove('active');
                        });

                        // Show the selected section
                        document.getElementById(id).classList.add('active');

                        // Change button color
                        var buttons = document.querySelectorAll('.form button');
                        buttons.forEach(function (button) {
                            button.classList.remove('active');  // Remove active class from all buttons
                            button.style.backgroundColor = '';  // Reset button color
                            button.style.color = '';  // Reset text color
                        });

                        // Apply active styling to the selected button
                        var activeButton = document.querySelector("button[onclick=\"showContent('" + id + "')\"]");
                        activeButton.classList.add('active');  // Add active class
                        activeButton.style.backgroundColor = '#007bff';  // Set background color (blue in this case)
                        activeButton.style.color = '#ffffff';  // Set text color to white (or any color you like)
                    }

                    // Set the default section on page load
                    window.onload = function () {
                        // Show 'editGuard' content by default
                        showContent('editGuard');
                    };
                </script>

            </section>
            <!-- /wrapper -->
        </section>

        <!--main content end-->

    </section>

    <!-- JS placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('lib/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('lib/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('lib/jquery-ui-1.9.2.custom.min.js') ?>"></script>
    <script src="<?= base_url('lib/jquery.ui.touch-punch.min.js') ?>"></script>
    <script class="include" type="text/javascript" src="<?= base_url('lib/jquery.dcjqaccordion.2.7.js') ?>"></script>
    <script src="<?= base_url('lib/jquery.scrollTo.min.js') ?>"></script>
    <script src="<?= base_url('lib/jquery.nicescroll.js') ?>" type="text/javascript"></script>
    <!-- Common script for all pages -->
    <script src="<?= base_url('lib/common-scripts.js') ?>"></script>
    <!-- Script for this page -->
    <script type="text/javascript"
        src="<?= base_url('css/lib/bootstrap-fileupload/bootstrap-fileupload.js') ?>"></script>


</body>

</html>