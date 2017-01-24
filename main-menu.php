<!--NAV TOP-->
<nav class="navbar navbar-default navbar-cls-top navbar-fixed-top">
    <div class="navbar-header">
        <a href="index.php">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
    </div>
    <div class="login-box">
        <div class="dropdown">
            <a class="dropdown-toggle admin-panel-user" data-toggle="dropdown" href="#">
                Hello <?php echo $_SESSION['username']; ?>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAV TOP  -->

<!-- SIDE BAR  -->
<div class="sidebar-wrapper">
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <a href="index.php">
                    <li class="text-center">
                        <img src="assets/images/ops.png" style="height:100px;width: 250px; margin-bottom: 4px; margin-left: 5px; margin-right: 5px;"/>
                    </li>
                </a>
                <li>
                    <a href="admin.php"><img src="assets/images/dashboard.ico" class="img"> Dashboard</a>
                </li>
                <li>
                    <a  href="inventory.php"><img src="assets/images/inventory-flat.png" class="img"> Inventory</a>
                </li>
                <li>
                    <a  href="catalog.php"><img src="assets/images/catalogue-icon.png" class="img"> Product Catalog</a>
                </li>
                <li>
                    <a  href="order-tracking.php"><img src="assets/images/order-tracking.png" class="img"> Order Tracking</a>
                </li>
                <li  >
                    <a   href="user.php"><img src="assets/images/user-512.png" class="img"> User Account</a>
                </li>
                <li>
                    <a href="reports.php"> <img src="assets/images/analytics.png" class="img"> Reports</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!--End of sidebar-->