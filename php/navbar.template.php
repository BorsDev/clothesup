        <!--navbar-->
        <nav class="navbar sticky-top">
            <div class="logo">
                <a href="index.php">Clothes UP!</a>
            </div>
            <div class="nav-list" id="naviList">
                <li class="nav-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a href="index.php#product">Shop</a>
                </li>
                <?php
                    if (isset($_SESSION["U_NAME"])) {
                        echo"<li class='nav-item'><a href='cart.php'>Cart</a></li>";
                        echo"<li class='nav-item'><a href='incl/logout.inc.php'>Logout</a></li>";
                    }
                    else{
                        echo "<li class='nav-item'><a href='login.php'>Login</a></li>";
                        echo "<li class='nav-item'><a href='signup.php'>Sign Up</a></li>";
                    }
                ?>
            </div>
            <div class="menu" id="button">
                <div class="menu-button"></div>
                <div class="menu-button"></div>
                <div class="menu-button"></div>
            </div>
        </nav>
        <!--end of navbar-->