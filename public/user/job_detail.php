<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f2f5f7;
            display: flex;
            justify-content: center;
        }

        .container{
            display: flex;
            flex-direction: column;
            width: 80%;
            background-color: white;
            gap: 20px;
            padding: 20px 15px;
            margin-top: 100px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .job_info{
            display: flex;
            gap: 10px;
        }

        .button{
            border: none;
            padding: 10px 40px;
            border-radius: 10px;
            background-color: lightblue;
        }

        .button:hover{
            cursor: pointer;
            background-color: #84f1ffff;    
        }
    </style>
</head>
<body>

    <?php include "navbar.html"; ?>

    <div class="container">
        <h3>Job Title</h3>
        <div class="job_info">
            <div>Full Time</div>
            <div>Location</div>
            <div>Posted: 1 hour ago</div>
            <div><b>Closes:</b> January 9, 2025</div>
        </div>
        <div>
            Job Description
        </div>
        <div>
            <button class="button">Apply for job</button>
        </div>
    </div>
</body>
</html>