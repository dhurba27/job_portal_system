
<div class="navbar">
    <h2>rojgari</h2>
    <div class="links">
        
        <?php if(($_SESSION['user_role']??'') === 'user') { ?>

            <a href="user_dashboard.php">Home</a>
            <a href="jobs.php">Jobs</a>
            <a href="application.php">Applications</a>
            
            <div class="nav_profile_container">
                <button class="nav_profile_button" id="nav_profile_button">
                    <img src="../../image/01.jpg" alt="profile">
                </button>
                <div class="nav_profile_menu" id="nav_profile_menu">
                    <a href="profile.php">Profile</a>
                    <a href="account_setting.php">Account Setting</a>
                    <a href='../../backend/logout.php'>Logout</a>
                </div>
            </div>

        <?php } else if(($_SESSION['user_role']??'') === 'employer') { ?>

            <a href="employer_dashboard.php">Home</a>
            <a href="add_job.php">Add Job</a>
            <button class="nav_button" onclick="window.location.href='../../backend/logout.php'">Logout</button>

        <?php } else if(($_SESSION['user_role']??'') === 'admin') { ?>

            <a href="admin_dashboard.php">Home</a>
            <a href="add_employer.php">Add Employer</a>
            <button class="nav_button" onclick="window.location.href='../../backend/logout.php'">Logout</button>

        <?php } else { ?>
            <a href="user_dashboard.php">Home</a>
            <a href="jobs.php">Jobs</a>
            <button class="nav_button" onclick="window.location.href='../verification/login.php'">Login</button>
        <?php } ?>

    </div>
</div>

<script src="../../js/navbar.js"></script>