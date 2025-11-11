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
            width: 80%;
            background-color: white;
            padding: 25px 20px;
            margin: 100px 0;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            display: flex;
            gap: 20px;
            flex-direction: column;
        }

        .second_container{
            display: flex;
            justify-content: space-between; 
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding-left: 15px;
            width: 55%;
        }

        

        form input{
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            width: 100%;
        }

        .name{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .name input{
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            width: 100%;
        }

        textarea{
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            width: 100%;
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

        label{
            display: block;
            padding-bottom: 5px;
        }
    </style>
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