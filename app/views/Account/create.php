<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <title>Create an account</title>

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
            <div class="con-navbar" style="margin-bottom:1px">
            				<div>
            					<h4 style="font-size: 40px; color: black; padding: 10px;">
            						<div class="row">
            							<div class="col-10">
            								<div style="text-align: left; font-weight: bold;">
            									GradeSpot
            								</div>
            							</div>
            							<div class="col-2 home-login-lb" style="text-align: right;">
            								<?php
            									if(isset($_SESSION['account_id'])) {
            										echo "
            											<span style='font-size: 20px;'>Khalid</span>
            										";
            									}
            								?>
            								<img src="/images/user.png" alt="Profile" width="28" onclick="location.href='/account/login'" style="cursor: pointer; vertical-align: middle;">
            							</div>
            						</div>
            					</div>
            				</div>
            			</div>
            <div class="row">
                <div class="col-md" style="background-color:#3e91f7; text-align: center">

                </div>

                <div class="col-md">
                    <h3 style="padding: 15% 46px 0px">Sign up</h3>
                        <?php if(isset($model['error']))
                            echo "<div class='alert alert-danger' role='alert'>$model[error]</div>";
                        ?>

                        <form action="" method="post" class="form-horizontal" style="padding: 40px 46px 2px; display: inline-block;">
                            <div class="row">
                                <div class="form-group col-md">
                                    <label for="first_name" class="credentials">First name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" />
                                </div>
                                <div class="form-group col-md">
                                    <label for="last_name" class="credentials">Last name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="university_id" class="credentials">University</label>
                                <input type="text" class="form-control" name="university_id" id="university_id" />
                            </div>

                            <div class="form-group">
                                <label for="email" class="credentials">Email Address</label>
                                <input type="text" class="form-control" name="email" id="email" />
                            </div>

                            <div class="row">
                                <div class="form-group col-md">
                                    <label for="password" class="credentials">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" />
                                </div>

                                <div class="form-group col-md">
                                    <label for="confirm_password" class="credentials">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" />
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="create_user" value="Create an account" class="btn btn-primary" />
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </body>
 </html>