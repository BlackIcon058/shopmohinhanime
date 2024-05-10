<?php
session_start();
require_once 'functions/functions.php';
$cat = display_cat();
$cart_value = total_cart_num();
?>


<header>
  <!--LOGO SHOP-->
  <a href="index.php" class="logo"><i class='bx bxl-flutter'></i>FIGURE SHOP</a>
  <ul class="nav-bar">
    <li><a href="index.php">Home</a></li>
    <li><a href="index.php#new">New Arrival</a></li>
    <li><a href="index.php#product">Products</a></li>
  </ul>
  <!--ICON-->
  <div class="header-icons">
    <i class='bx bx-filter' id="filter-icon"></i>
    <i class='bx bx-search' id="search-icon"></i>
    <a href="cart.php">
      <i class='bx bx-cart-alt' id="cart-icon" style="color: var(--text-color);"></i>
    </a>
    <?php
    if (isset($_SESSION['EMAIL_USER_LOGIN'])) {
    ?>
      <a href="order_history.php">
        <i class='bx bx-file' id="file-icon" style="color: var(--text-color);"></i>
      </a>
    <?php
    }
    ?>
    <i class='bx bx-user' id="user-icon"></i>

  </div>

  <!--LOC SAN PHAM-->

  <div class="filter-container">
    <form class="header-search-form" action="search_page_advanced.php" method="get" style="display: flex; align-items: center;">

      <div class="filter-body">
        <div class="filter-group">
          <label for="keyword">Keyword</label>
          <div class="price-range">
            <input type="search" class="header_search-input" name="keyword" id="" placeholder="Search...">
          </div>
        </div>

        <div class="filter-group">
          <label for="category">Category</label>
          <select name="cat" id="category">
            <option value="">All</option>
            <?php

            while ($row = mysqli_fetch_assoc($cat)) {
            ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>

            <?php
            }
            ?>
          </select>
        </div>

        <div class="filter-group">
          <label for="price">Price</label>
          <div class="price-range">
            <input name="min_price" type="number" id="min-price" placeholder="Low" min="1">
            <span>-</span>
            <input name="max_price" type="number" id="max-price" placeholder="High" min="1">
          </div>
        </div>
        <div class="filter-group">
          <label>
            <button type="submit" style="background: none; border: none; padding: 0; font: inherit; cursor: pointer;">Search</button>
          </label>
        </div>
      </div>
    </form>
  </div>



  <!--THANH TIM KIEM-->
  <div class="search-box">
    <form class="header-search-form" action="search_page.php" method="get" style="display: flex; align-items: center;">
      <input type="search" class="header_search-input" name="keyword" id="" placeholder="Search..." style="margin-right: -40px; width: 210px; border-radius: 10px">
      <button type="submit" class="bx bx-search search-icon" style="background: none; border: none; cursor: pointer;  padding: 0 10px; border-radius: 50px "></button>
    </form>
  </div>


  </div>
  <div class="user">
    <?php
    if (isset($_SESSION['EMAIL_USER_LOGIN'])) {
    ?>
      <i class="flaticon-profile"></i>
      <a href="profile_info.php">
        <?php
        $fullUsername = $_SESSION['USERNAME_USER_LOGIN'];
        $maxLength = 12;

        if (strlen($fullUsername) > $maxLength) {
          $shortenedUsername = substr($fullUsername, 0, $maxLength) . '...';
          echo $shortenedUsername;
        } else {
          echo $fullUsername;
        }
        // echo $_SESSION['USERNAME_USER_LOGIN']; 
        ?>
        <!-- <div id="userDropdown"> -->
        <a id="userDropdown" href="logout.php">Logout</a>
        <!-- </div> -->
        <!--USER-->
      <?php
    } else {
      ?>

        <a href="register.php" class="btn">Sign Up</a>
        <a href="login.php" class="btn">Login</a>

      <?php
    }
      ?>
  </div>

  <style>
    #userDropdownToggle {
      font-weight: bolder;
    }

    /* #userDropdown {
      font-weight: bolder;
      position: absolute;
      top: 70%;

      display: none;
      z-index: 1;
    }

    .up-item {
      position: relative;
      display: inline-block;
    } */

    #userDropdown {
      font-weight: bold;
      color: #333;
      text-decoration: none;
    }

    #userDropdown:hover {
      color: red;
    }
  </style>
</header>