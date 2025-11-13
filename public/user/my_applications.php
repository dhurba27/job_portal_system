
<!DOCTYPE html>
<html>

<head>
    <title>My Applications - Job Portal</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/user/applications.css">
</head>

<body>

    <?php include "navbar.html"; ?>

    <div class="container">
        <h2>My Applications</h2>

        <div class="title">
            <div>Job Title</div>
            <div>Company</div>
            <div>Location</div>
            <div>Salary</div>
            <div>Employer</div>
            <div>Status</div>
        </div>

        <?php $i = 1; while ($i < 3) { ?>

            <div class="info">
                <div>title</div>
                <div>company</div>
                <div>location</div>
                <div>salary</div>
                <div>employer</div>
                <div class="status">
                    status
                </div>
            </div>

        <?php $i++;} ?>
    </div>

</body>

</html>