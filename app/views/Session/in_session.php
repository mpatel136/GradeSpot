<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>In Session</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- LINEARICONS -->
        <link rel="stylesheet" href="/fonts/linearicons/style.css">

        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

        <!-- DATE-PICKER -->
        <link rel="stylesheet" href="/vendor/date-picker/css/datepicker.min.css">
        
        <!-- STYLE CSS -->
        <link rel="stylesheet" href="/css/style.css">
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="con-navbar">
                <div>
                    <h4 style="font-size: 40px; color: black; padding: 10px;">
                        <div class="row">
                            <div class="col-10">
                                <div style="text-align: left;">
                                    GradeSpot
                                </div>
                            </div>
                            <div class="col-2" style="text-align: right;">
                                <img src="/images/user.png" alt="Profile" width="28">
                            </div>
                        </div>
        
                    </h4>
                    <div style="color: black; padding: 10px; margin-bottom: 20px; font-family: Arial, Helvetica, sans-serif;">
                        <div style="font-size: 17px; text-align: center;">
                            <span class="badge badge-success" style="font-size: 12px; margin-right: 10px;">Session Info</span>

                            <span>Concordia University</span> &nbsp; &bull; &nbsp;
                            <span>Software Engineering</span> &nbsp; &bull; &nbsp;
                            <span>SOEN 331</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin: 0px 0px;">
                <div class="col-8" style="background: black; padding: 10px;">
                    White board section
                </div>
                <div class="col-4" style="background-color: rgb(160, 115, 115);">
                    <div id="wrapper_chat">
                        <div id="menu_chat">
                            <?php
                                $current_user = "";
                                if(isset($_SESSION['current_user_name_in_chat'])) {
                                    $current_user = $_SESSION['current_user_name_in_chat'];
                                }

                                echo "
                                    <p class='welcome_chat'>Welcome, $current_user.<b></b></p>
                                ";
                            ?>
                            <!-- <p class="logout_chat"><a id="exit" href="#">Exit Chat</a></p> -->
                        </div>
                        <div id="chatbox">
                            <?php
                                if(file_exists("log.html") && filesize("log.html") > 0){
                                    $contents = file_get_contents("log.html");          
                                    echo $contents;
                                }
                            ?>
                        </div>
                        <form name="message" action="">
                            <input name="usermsg" type="text" id="usermsg" />
                            <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
                        </form>
                    </div>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script type="text/javascript">
                // jQuery Document
                $(document).ready(function () {
                    $("#submitmsg").click(function () {
                        var clientmsg = $("#usermsg").val();
                        $.post("Post.php", { text: clientmsg });
                        $("#usermsg").val("");
                        return false;
                    });
                
                    function loadLog() {
                        var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request

                        $.ajax({
                            url: "log.html",
                            cache: false,
                            success: function (html) {
                                $("#chatbox").html(html); //Insert chat log into the #chatbox div
                                
                                //Auto-scroll
                                var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request

                                if(newscrollHeight > oldscrollHeight){
                                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                                }	
                            }
                        });
                    }
                    //setInterval (loadLog, 2500);
                    });
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>