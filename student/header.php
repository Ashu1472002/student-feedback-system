<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <title>FMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/index.css"></link>
    <script src="../js/index.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

</head>

<body class="admin">
    <!--sidebar-->
    <div class="d-flex justify-content-between">
        <div id="sidebar-container" class="bg-dark  ">
            <div class="logo media-body">
                <h4 class="text-light font-weight-bold m-0">Student Feedback System</h4>
                <button id="close_btn" type="button" class="close" aria-label="Close" onclick="closeNav()" style="display: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="menu ">
                <a href="../index.php" class="d-block text-light p-3"><i class="bi bi-house-fill mr-2 lead"></i>Home</a>
                <a href="./Student_home.php" class="d-block text-light p-3"> <i class="bi bi-grid-3x3-gap-fill mr-2 lead"></i>Dashboard</a>
                <a href="./student_profile.php" class="d-block text-light p-3"> <i class="bi bi-person-square mr-2 lead"></i>Profile</a>
                <a href="./givefeedback.php" class="d-block text-light p-3"> <i class="bi bi-menu-up mr-2 lead"></i>Give Feedbacks</a>
            </div>
        </div>
        <!--end of sidebar-->
        <!--Navbar-->
        <div class="flex-grow-1">
            <nav class="navbar navbar-expand-sm navbar-light  bg-warning  border-bottom ">
                <button id="sidebarCollapse" type="button" class="btn btn-light bg-light square shadow-sm px-2 mb-4" onclick="openNav()">
                   
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><img class="img-fluid rounded-circle mr-2" src="../img/login_logo.png" alt="..." width="50" height="50"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <span class=".pill"><img src="https://img.icons8.com/plasticine/40/000000/automatic.png" />Student</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="./student_profile.php"><i class="bi bi-person-square mr-2 lead"></i>Profile</a>
                                <a class="dropdown-item " href="../logout.php" style="color: red;"><i class=" bi bi-box-arrow-right mr-2 lead"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--End of Navbar-->