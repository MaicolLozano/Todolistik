<!DOCTYPE html>
<html lang="en">
<head>
  <title>Todolistik</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../navbar/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="shortcut icon" href="img/favi.ico" type="image/x-icon">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <style>
    .sidebar {
      background-color : #3F51B5;
    }

    .sidebar li a {
      background-color :#3F51B5;
    }
    .home-section {
      background-color : white ;
    }
  </style>
  <div class="sidebar">
    <div class="logo_details">
      <!-- <i class="bx bxl-audible icon"></i> -->
      <div class="logo_name">TODOLISTIK</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
        <i class="bx bx-search"></i>
        <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="#">
          <i class="bx bx-home-alt-2"></i>
          <span class="link_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-news"></i>
          <span class="link_name">News</span>
        </a>
        <span class="tooltip">News</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bxs-contact"></i>
          <span class="link_name">Contact</span>
        </a>
        <span class="tooltip">Contact</span>
      </li>
      <!-- <li>
        <a href="#">
          <i class="bx bx-folder"></i>
          <span class="link_name">File Manger</span>
        </a>
        <span class="tooltip">File Manger</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-cart-alt"></i>
          <span class="link_name">Order</span>
        </a>
        <span class="tooltip">Order</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-cog"></i>
          <span class="link_name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li> -->
      <li class="profile">
        <div class="profile_details">
        <i class='bx bxs-user-account' ></i>
          <!-- <img src="profile.jpeg" alt="profile image"> -->
          <div class="profile_content">
            <div class="name"><?php echo $user['name']; ?></div>
             <!-- <div class="designation">Admin</div>  -->
          </div>
        </div>

        <i class="bx bx-log-out" id="log_out" onclick="location.href='php/logout.php';"></i>

        <!-- <i class="bx bx-log-out" id="log_out"></i> -->
      </li>
    </ul>
  </div>



  <section class="home-section"> <br>  <br>
    <!-- <div class="text">Dashboard</div> -->
    <!--aqui va todo el codigo php-->

