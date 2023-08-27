<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เข้าสู่ระบบ</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dist/css/mycustom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Itim&family=Mochiy+Pop+One&family=Prompt:wght@100&display=swap" rel="stylesheet">
    
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script>
        function myFunction2() {
            var xx = document.getElementById("myInput2");
            if (xx.type === "password") {
                xx.type = "text";
            } else {
                xx.type = "password";
            }
        }
    </script>

</head>
<body>

    <div class="blurred-box">

        <div class="user-login-box">
            <span class="user-icon"></span>
            <div class="user-name">ระบบยืม-คืนอุปกรณ์ทางการแพทย์</div>

            <form role="form" action="<?php echo  site_url('user/checklogin2'); ?>" method="post" class="form-horizontal">



                <input type="text" class="user-username" name="m_username" required placeholder="Username">

                <input type="password" class="user-password" id="myInput" name="m_password" required placeholder="Password">
                
                <input type="checkbox" class="user-checkbox" onclick="myFunction()">
                <br>
                <button class="user-button" type="submit">
                    <i class="fa fa-sign-in" aria-hidden="true"></i> ล็อกอิน</button>



                </form>
            </div>

        </div>

    </body>
    </html>