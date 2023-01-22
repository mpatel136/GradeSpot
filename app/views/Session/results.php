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
    <?php
    // var_dump($model['result']);
    $session_obj = $model['result'];
    echo "
      <table class='table'>
        <thead>
          <tr>
            <th scope='col'>Session</th>
            <th scope='col'>Subject</th>
            <th scope='col'>Number of participants</th>
            <th scope='col'>Room #</th>
          </tr>
        </thead>
        <tbody>
        ";
        foreach($session_obj as $obj) {
          $session_token = $obj->session_token;
          echo "
            <tr>
              <th>$session_token</th>
              <td>TEST335</td>
              <td>TEST</td>
              <td>@mdo</td>
            </tr>
          ";
        }
        echo "
        </tbody>
      </table>
    "
    ?>

</body>

</html>