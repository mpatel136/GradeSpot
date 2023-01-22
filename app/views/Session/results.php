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
    $session_obj = $_SESSION["result"];
    $count = 1;
    echo '<link rel="stylesheet" href="/css/style.css">';
    echo '<table class="table">
        <thead>
          <tr>
            <th scope="col">Session</th>
            <th scope="col">Subject</th>
            <th scope="col">Number of participants</th>
            <th scope="col">Room #</th>
          </tr>
        </thead>';

    foreach ($session_obj as $obj) {
        echo '<tbody>
                <tr>
                <th scope="row">';
        echo $count;
        $count++;
        echo '</th>
                <td>';
        echo $subject_id = $obj->subject_id;
        echo '</td>
                <td>';
        echo $subject_id = $obj->participant_count;
        echo '</td>
                <td>';
        echo $subject_id = $obj->room_id;
        echo ' </td>
                </tr>
            </tbody>';
        echo '</br>';
    }
    echo '</table>'
    ;
    ?>

</body>

</html>

<!-- echo '<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Subject</th>
            <th scope="col">Number of participants</th>
            <th scope="col">Room #</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">TEST1</th>
            <td>TEST335</td>
            <td>TEST</td>
            <td>@mdo</td>
          </tr>
        </tbody>
      </table>'; -->