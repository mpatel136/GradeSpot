<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Join a session</title>

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
                <span style="font-size: 17px;">Hi,</span>
                <h1 style="font-size: 33px; font-weight: bold; ">Khalid</h1>
            </div>

            <div>
                <h3 style="font-size: 20px; margin-top: 30px;">
                    You are joining the following session.
                </h3>

                <div class="row">
					<?php
						$session = $model['session'];
						// var_dump($session);
						$in_person = $session->is_in_person;
						// $in_person = 0;
						$in_person_label = ($in_person == 1) ? "In Person" : "Online";

						$program_id = $session->program_id;
						$subject_id = $session->subject_id;

						$participant_count = $session->participant_count;
						
						$claimed_label = "Claimed";
						if($participant_count == 0) {
							$claimed_label = "Unclaimed";
						}

						$room_id = $session->room_id;
						$room_obj = $this->model('Room')->findById($room_id);
						$room_number = $room_obj->room_number;
					?>
                    <div class="col-5 room-search" style="border-right: 1px solid red;">   
						<?php
							echo "
								<div>
									<span class='badge badge-success' style='font-size: 12px; margin-right: 10px;'>$in_person_label</span>
									
									<span class='badge badge-success' style='font-size: 12px; margin-right: 10px;'>$claimed_label</span>
									
									<div style='font-size: 15px;'>
										<span>Concordia University</span> &nbsp; &bull; &nbsp;
										<span>$room_number</span>
										";
										if($participant_count >= 1) {
											$program = $this->model('Program')->getProgramName($program_id)->program_name;
											$subject = $this->model('Subject')->getSubjectName($subject_id)->subject_number;
											echo "
												&nbsp; &bull; &nbsp;
												<span>$program</span> &nbsp; &bull; &nbsp;
												<span>$subject</span>
											";
										}
										echo "
									</div>
								</div>

								<form method='POST' style='padding: 20px 0px 55px;'>
								";
									if($participant_count < 1) {
										echo "
											<div class='form-group'>
												<label for='program'>Program</label>
												<select name='program' id='program' class='form-control'>
													<option value='' selected disabled>--- Choose your program ---</option>
													<option value='1'>COMP</option>
													<option value='2'>SOEN</option>
												</select>
											</div>
		
											<div class='form-group'>
												<label for='subject'>Subject</label>
												<select name='subject' id='subject' class='form-control'>
													<option value='' selected disabled>--- Choose your subject ---</option>
													<option value='1'>335</option>
													<option value='2'>341</option>
												</select>
											</div>
										";
									}
									echo "
									<div class='form-group'>
										<label for='student_name'>Name</label>
										<input type='text' class='form-control' name='student_name' id='student_name' aria-describedby='roomNumber' placeholder='Enter your name'>
									</div>

		
									<button type='submit' name='join_session' class='btn btn-primary'>Join</button>
								</form>
							";
						?>
                    </div>
					
					<?php
						// default JMSB
						$map_url = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2796.735150173881!2d-73.58123288437645!3d45.495277879101245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91180e3ca7ac1%3A0x120287ab05c709e2!2sJMSB!5e0!3m2!1sen!2sca!4v1674378949777!5m2!1sen!2sca";
						
						$room_obj = $this->model('Room')->findById($room_id);
						// var_dump($room_obj);

						$building_name = $room_obj->building_name;

						if($building_name == "Hall Building") {
							$map_url = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2796.646618656639!2d-73.58099088437643!3d45.4970604791013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91a6a62e7797d%3A0xde5eb29ec0db21ef!2sHall%20Building%20Auditorium!5e0!3m2!1sen!2sca!4v1674381706477!5m2!1sen!2sca";
						}
					?>
                    <div class="col-7" style="padding: 0px 46px 55px;">   
						<iframe src="<?php echo $map_url; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>