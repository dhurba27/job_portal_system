<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/user/job_form.css">
</head>
<body>

    <?php include "navbar.html"; ?>

    <div class="container">
        <h3>Job Form</h3>
        <div class="second_container">
            <form action="">
                <div class="name">
                    <div>
                        <label for="first_name">First Name</label>  
                        <input type="text" id="first_name" name="first_name">
                    </div>
                    <div>
                        <label for="last_name">Last Name</label>
                        <input type="text" id="Last_name" name="last_name">
                    </div>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
                <div>
                    <label for="contact">Contact</label>
                    <input type="tel" id="contact" name="contact">
                </div>
                <div>
                    <label for="address">Address</label>
                    <input type="tel" id="address" name="address">
                </div>
                <div>
                    <label for="letter">Cover Letter</label>
                    <textarea name="letter" id="letter"></textarea> 
                </div>
                <div>
                    <label for="cv">Upload CV</label>
                    <input type="file" id="cv" name="cv">
                </div>
                <div>
                    <input type="submit" name="submit" class="button">
                </div>
            </form>
            <div>
                <img src="../../image/image1.jpg" alt="image" width="400px">
            </div>
        </div>
    </div>
</body>
</html>