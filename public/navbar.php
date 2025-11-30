<style>
    .navbar {
            background-color: #3E5172;
            color: white;
            padding: 15px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            position: relative;
        }

        .navbar a::before{
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -7px;
            height: 3px;
            border-radius: 10px;
            background: lightblue;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.25s ease;
        }

        .navbar a:hover{
            color: lightblue;
        }

        .navbar a:hover::before {
            transform: scaleX(1);
        }

        .links{
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .nav_button{
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background-color: #0d6efd;
            color: white;
            cursor: pointer;
        }

        .profile_button{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            border: none;
        }

        .profile_button:hover{
            border: solid 2px lightblue;
        }

        .profile_button img{
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
</style>
<?php session_start(); ?>
<div class="navbar">
    <h2>rojgari</h2>
    <div class="links">
        <?php if($_SESSION['user_role'] === 'user') { ?>
            <a href="user_dashboard.php">Home</a>
            <a href="jobs.php">Jobs</a>
            <a href="my_applications.php">Applications</a>
            <button class="nav_button" onclick="window.location.href='../../backend/logout.php'">Logout</button>
            <button class="profile_button">
                <img src="../../image/01.jpg" alt="profile">
            </button>
        <?php } else if($_SESSION['user_role'] === 'employer') { ?>
            <a href="employer_dashboard.php">Home</a>
            <a href="add_job.php">Add Job</a>
            <a href="applications.php">Applications</a>
            <button class="nav_button" onclick="window.location.href='../../backend/logout.php'">Logout</button>
            <button class="profile_button">
                <img src="../../image/01.jpg" alt="profile">
            </button>
        <?php } else { ?>
            <a href="admin_dashboard.php">Jobs</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="add_user.php">Add User</a>
            <button class="nav_button" onclick="window.location.href='../../backend/logout.php'">Logout</button>
            <button class="profile_button">
                <img src="../../image/01.jpg" alt="profile">
            </button>
        <?php } ?>
    </div>
</div>