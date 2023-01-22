<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title> GradeSpot</title>

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
								<div style="text-align: left; font-weight: bold;" onclick="location.href='/'">
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
			
			<div class="row" style="margin: 0px 0px;">
				<div class="col-8 bg-title-home" style="margin-top: 2%;">
					<h3 class="mainheader">Study Together.</h3>
					<img src="/images/team_builder.jpg">
				</div>
				<div class="col-4 bg-home-content" style="margin-top: 5%; text-align: center; padding-top: 13%;">
					<div>
						<div style="font-size: 18px; font-weight: bold; color: #3e91f7;">
							Join an ongoing session by clicking below.
						</div>
						<button type="button" class="btn btn-primary" onclick="location.href='/session/search'">Join</button>
					</div>
					<div style="margin-top: 30px; margin-bottom: 28px;">
						----------------
					</div>
					<div>
						<div style="font-size: 18px; font-weight: bold; color: #3e91f7;">
							Create a session with your friends by clicking below.
						</div>
						<button type="button" class="btn btn-primary create-session-btn" onclick="location.href='/session/create'">Create</button>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>