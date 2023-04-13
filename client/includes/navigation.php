<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">TuitionPlatform</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="request a tuition.php">Request a tuition</a>
                </li>
                <li>
                    <a href="tuition list.php">Tuition list</a>
                </li>
                <li>
                    <?php if (is_logged_in()) echo '<a href="logout.php">Logout</a>';
                    else echo '<a href="login.php">Login</a>';
                    ?>

                </li>
                <li>
                    <?php if (!(is_logged_in())) echo '<a href="register.php">Register</a>'
                    ?>
                </li>
                <li><?php if (is_logged_in()) echo '<a href="profile.php">Profile</a>';
                    ?></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- <ul>
            <li><a href="">tutors list</a></li>
            <li><a href="">how to use</a></li>
            <li><a href="">become a tutor</a></li>
        </ul> -->
</nav>