<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <title>Create new session</title>

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

    <div style="background-color: #3e91f7; z-index: 1">
        <div class="container" style="background-color: white; width: 55%; height: 100vh">
                <?php if (isset($data['error']))
                    echo "<div class='alert alert-danger' role='alert'>$data[error]</div>";
                ?>
                <h3 style="padding: 50px 46px 0px">Create a GradeSpot Session</h3>
                <form action="" method="post" class="form-horizontal">
                    <label class="credentials"> University </label>
                    <select class="form-control form-control-lg" style="margin-bottom: 40px" name="university_id" id="university_id">
                      <option selected disabled>Select a University</option>
                      <option value="1">Concordia University</option>
                      <option value="2">McGill University</option>
                      <option value="3">Harvard University</option>
                    </select>

                    <div class="form-group row" style="margin-bottom: 40px">
                        <div class="col-md">
                            <label for="program_id" class="credentials">Program</label>
                            <input type="text" class="form-control" name="program_id" id="program_id" />
                        </div>
                        <div class="col-md">
                            <label for="subject_id" class="credentials">Subject</label>
                            <input type="text" class="form-control" name="subject_id" id="subject_id" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="is_in_person" class="credentials">In person</label>
                        <input type="checkbox" value="1" name="is_in_person" id="is_in_person" style="margin-left: 10px"/>
                    </div>

                    <div class="form-group" style="margin-bottom: 50px">
                        <label for="is_private" class="credentials">Private</label>
                        <input type="checkbox" value="1" name="is_private" id="is_private" style="margin-left: 10px"/>
                    </div>

                    <input type="submit" name="create_session" value="Create New Session" class="btn btn-primary form-group"/>
                </form>
            </div>
    </div>
</body>

</html>