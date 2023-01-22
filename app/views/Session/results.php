<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> GradeSpot</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

  <div class="container">
    <?php
      // var_dump($model['result']);
      $session_obj = $model['result'];
      
      echo "
        <table class='table' style='color: black'>
          <thead>
            <tr>
              <th scope='col'>Session</th>
              <th scope='col' class='text-center'>Program</th>
              <th scope='col' class='text-center'>Subject</th>
              <th scope='col' class='text-center'># of participants</th>
              <th scope='col' class='text-center'>Room #</th>
              <th scope='col' class='text-center'>Join</th>
            </tr>
          </thead>
          <tbody>
          ";
          foreach($session_obj as $obj) {
            
            $session_token = $obj->session_token;
            $program = $this->model('Program')->getProgramName($obj->program_id)->program_name;
            $subject = $this->model('Subject')->getSubjectName($obj->subject_id)->subject_number;
            $room_id = $obj->room_id;

            echo "
                  <tr>
                    <td>$session_token</td>
                    <td class='text-center'>$program</td>
                    <td class='text-center'>$subject</td>
                    <td class='text-center'>$obj->participant_count</td>
                    <td class='text-center'>$room_id</td>
                    <td class='text-center'>
                      <a href='/session/join/$session_token' class='btn btn-primary' style='height: 24px; width: 40px; font-size: 15px; padding: 0px;'>Join</a>
                    </td>
                  </tr>
                ";
              }
          echo "
          </tbody>
        </table>
      "
      ?>
  </div>
  
   

</body>

</html>