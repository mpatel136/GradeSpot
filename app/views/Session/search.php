<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

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
    
    <div class="container-fluid">
        <div class="con-navbar">
            <div>
                <h4 style="font-size: 40px; color: black; padding: 10px;">
                    <div class="row">
                        <div class="col-10">
                            <div style="text-align: left;" onclick="location.href='/'"  >
                                GradeSpot
                            </div>
                        </div>
                        <div class="col-2" style="text-align: right;">
                            <img src="/images/user.png" alt="Profile" width="28"
                                onclick="location.href='/account/login'" style="cursor: pointer;">
                        </div>
                    </div>
            </div>
        </div>

        <div class="container" style=" padding: 10px">
        <h1 style="color:black; padding: 10px">Search for a GradeSpot Session</h1>
        <form method="post">
            <div class="row">
                <div class="col-sm">
                    <input type="search" placeholder="Search for a Program" class="form-control rounded" name="search_input" id="search_input" />
                </div>
                <div class="col-sm">
                    <input type="submit" class="btn btn-primary" name="search_session" value="Search">
                </div>
            </div>

        </form>

        </div>
    </div>



</body>

</html>