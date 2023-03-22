<header class="header">
    <div class="nav nav-1">
        <section class="flex">
        <a href=" home.php" class="logo"><i class="fas fa-plane"></i>Freedom.</a>

        <ul>
            <li><a class="dest" href="post_destination.php"> post destination <i class="fas fa-paper-plane"></i></a>

            </li>
        </ul>
    </section>
    </div>
    <div class="nav nav-2">
        <section class="flex">
            <div id="menu-btn" class="fas fa-bars"></div>

            <div class="menu">
                <ul>
                    <li><a href="#">my destinations <i class="fas fa-angle-down"></i>
                    </a>
                    <ul>
                        <li><a href="dashboard.php">dashboard</a></li>
                        <li><a href="post_destination.php">post destination</a></li>
                        <li><a href="my_destinations.php">my destinations</a></li>
                    </ul>
                </li>
                <li><a href="#">options <i class="fas fa-angle-down"></i>
                    </a>
                    <ul>
                        <li><a href="search.php">filter search</a></li>
                        <li><a href="destinations.php">all destinations</a></li>
                       
                    </ul>
                </li>
                <li><a href="#">help <i class="fas fa-angle-down"></i>
                    </a>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="contact.php#FAQ">FAQ</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            <ul>
                <li><a href="saved.php">saved<i class="fas fa-heart"></i></a>
            </li>
                    <li><a href="#">account <i class="fas fa-angle-down"></i></a>
                        <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                        <?php if($user_id != ''){ ?>
                            <li><a href="update.php">update profile</a></li>
                            <li><a href="components/user_logout.php" onclick="return confirm('logout from this website?');">Logout</a>
                            <?php } ?></li>
                        </ul>
                </li>
            </ul>
        </section>
    </div>
</header>