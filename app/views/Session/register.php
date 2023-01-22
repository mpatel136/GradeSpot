<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Register a session</title>

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
		</div>

        <div class="container register-section" style="margin-top: 3%;">
            <div>
                <span style="font-size: 17px;">Welcome</span>
                <h1 style="font-size: 33px; font-weight: bold; ">Khalid</h1>
            </div>

            <div>
                <h3 style="font-size: 20px; margin-top: 30px;">
                    You can register a room.
                </h3>

                <div class="row">
                    <div class="col-5 room-search" style="border-right: 1px solid red;">   
                        <form method="POST">
                            <div class="form-group">
                                <label for="room_no">Room#</label>
                                <input type="text" class="form-control" name="room_no" id="room_no" aria-describedby="roomNumber" placeholder="Enter Room#">
                            </div>

                            <button type="submit" name="search_room" class="btn btn-primary">Search</button>
                        </form>
                    </div>

                    <div class="col-7" style="padding: 40px 46px 55px;">   
                        <?php
                            if(isset($model['room_obj'])) {
                                $room_obj = $model['room_obj'];

                                $room_id = $room_obj->room_id;
                                $room_number = $room_obj->room_number;
                                $building = $room_obj->building_name;
                                $status = $room_obj->status;

                                $status_label = ($status == 0) ? "Available" : "Already Assigned";
                                $status_badge = ($status == 0) ? "success" : "secondary";

                                echo "
                                    <form method='post'>
                                        <div class='room-search'>
                                            <span class='badge badge-$status_badge' style='font-size: 12px; margin-right: 10px;'>$status_label</span>
                                            <div style='font-size: 20px; padding-bottom: 10px;'>
                                                Room#: <span style='font-weight: bold;'>$room_number</span>
                                            </div>
                                            <div style='font-size: 20px;'>
                                                Building: <span style='font-weight: bold;'>$building</span>
                                            </div>";
                                            if($status == 0) {
                                                echo "
                                                    <button type='submit' name='register_room' class='btn btn-primary' style='margin-top: 20px;'>Register</button>
                                                ";
                                            }
                                            else {
                                                if(isset($model['qr_code'])) {
                                                    $qr_code_filename = $model['qr_code'];
                                                    echo "
                                                        <img src='/images/qr_codes/$qr_code_filename' alt='' width='100'>
                                                    ";
                                                }
                                            }
                                            echo "
                                        </div>
                                    </form>
                                ";
                            }

                            if(isset($model['error'])) {
                                $error = $model['error'];
                                $room_number = $model['room_number'];

                                echo "
                                    <div class='room-search'>
                                        <span class='badge badge-danger' style='font-size: 12px; margin-right: 10px;'>Error</span>
                                        <div style='font-size: 20px; padding-bottom: 10px;'>
                                            Room#: <span style='font-weight: bold;'>$room_number</span>
                                        </div>
                                        <div style='font-size: 20px; color: red;'>
                                            $error
                                        </div>
                                    </div>
                                ";
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>