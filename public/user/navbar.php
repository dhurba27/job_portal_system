<style>
    .navbar {
            background-color: #3E5172;
            color: white;
            padding: 15px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
        }

        .navbar a {
            color: white;
            text-decoration: none;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .links{
            display: flex;
            gap: 25px;
        }
</style>

<div class="navbar">
    <h2>rojgari</h2>
    <div class="links">
        <a href="user_dashboard.php">Home</a>
        <a href="jobs.php">Jobs</a>
        <a href="my_applications.php">My Applications</a>
        <a href="../../backend_php/logout.php">Logout</a>
    </div>
</div>