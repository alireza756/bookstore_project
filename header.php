<?php
session_start();
?>
<header class="container">
        <div class="logo-header"><img src="cropped-favicon-1-192x192.png" alt="logo"></div>
        <div class="main-menu">
            <ul>
                <li><a href="index.php">Home         </a>  </li>
                <li><a href="#products">Products     </a>  </li>
                <?php
                if (isset($_SESSION['state_login']) && $_SESSION['state_login'] === true)
                {
                    ?>
                <li><a href="profile.php">Profile     </a>  </li>
                <?php
                }
                else
                {
                ?>
                <li><a href="register.php">Register        </a>  </li>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['state_login']) && $_SESSION['state_login'] === true)
                {
                    ?>
                    <li><a href="logout.php">Logout<?php echo (" ({$_SESSION['username']})")?></a></li>
                    <?php
                }
                else
                {
                ?>
                <li><a href="login.php">Login        </a>  </li>
                <?php
                }
                ?>
                <li><a href="">about us     </a>   </li>

                <?php
                if (isset($_SESSION['state_login']) && $_SESSION['state_login'] === true && $_SESSION["user_type"] == "admin")
                {
                ?>
                <li><a href="admin/admin_product.php">Product management</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="hamburger">
            <input class="btn" type="checkbox" id="nav">
            <label class="menu" for="nav">
                <div>
                </div>
            </label>
            <div class="sidebar">
                <div>
                    <svg>
                        <text x="18%" y="65%">
                            alireza cheraghliei
                        </text>
                    </svg>
                </div>

                <a href="index.php">Home         </a>
                <a href="">Products     </a>
                <a href="register.php">Register     </a>
                <a href="login.php">Login        </a>
                <a href="">about us     </a>
                <div class="email-sidebar">
                    <a href="mailto:alirezacheraqali992@gmail.com">alirezacheraqali992@gmail.com</a>

                </div>

              </div>
        </div>
    </header>