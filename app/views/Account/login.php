<html>
<head>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- LINEAR ICONS -->
    <link rel="stylesheet" href="/fonts/linearicons/style.css">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="/vendor/date-picker/css/datepicker.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
<div class="container-fluid">
    <div class="con-navbar">
        <div>
            <h4 style="font-size: 40px; color: black; padding: 10px;">

                <div class="row">
                    <div class="col-10">
                        <div style="text-align: left;"> GradeSpot </div>
                    </div>

                    <div class="col-2" style="text-align: right;">
                        <img src="/images/user.png" alt="Profile" width="28" onclick="location.href='/account/login'" style="cursor: pointer;">
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-md" style="background-color:#3e91f7; text-align: center">
            <h3 class="formheader">Welcome</h3>
            <img style="width: 400px; margin-top: 65px"  src="/images/lock.png">
        </div>

        <div class="col-md">
            <h3 style="padding: 15% 46px 0px"> Log In </h3>

            <?php if(isset($model['error']))
                    echo "<div class='alert alert-danger' role='alert'>$model[error]</div>";
        ?>

        <form action="" method="post" class="form-horizontal" style="padding: 40px 46px 2px; display: inline-block;">
            <div class="form-group" style="margin-bottom: 50px;">
                <label for="email" class="credentials">Email Address</label>
                <input type="text" class="form-control" name="email" id="email" />
            </div>

            <div class="form-group" style="margin-bottom: 50px;">
                <label for="password" class="credentials">Password</label>
                <input type="text" class="form-control" name="password" id="password" />
            </div>


            <div class="form-group">
                <input type="submit" name="login" value="Login" class="btn btn-primary" />
            </div>
        </form>

        <a href="create" style="padding: 0px 46px"> No account? Register here! </a>
    </div>
</div>
</body>
</html>