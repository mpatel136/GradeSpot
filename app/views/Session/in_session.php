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

        <style>
            /* styles for the canvas element */
            canvas {
            border: 1px solid black;
            }
            /* Styles for the buttons */
            .color-button {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                margin: 5px;
                cursor: pointer;
                border: 1px solid #000;
            }
        </style>  
    </head>
    <body>
        <div class="container-fluid">
            <div class="con-navbar">
                <div>
                    <h4 style="font-size: 40px; color: black; padding: 10px;">
                        <div class="row">
                            <div class="col-10">
                                <div style="text-align: left;" onclick="location.href='/'">
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
                <div class="col-8">
                    <canvas id="whiteboard"></canvas>
                    <div>
                        <button class="color-button" style="background-color: black; display:inline-block;" onclick="setColor('black')"></button>
                        <button class="color-button" style="background-color: red; display:inline-block;" onclick="setColor('red')"></button>
                        <button class="color-button" style="background-color: blue; display:inline-block;" onclick="setColor('blue')"></button>
                        <button class="color-button" style="background-color: green; display:inline-block;" onclick="setColor('green')"></button>
                        <button class="color-button" style="background-color: white; display:inline-block;" onclick="setColor('white')"></button>
                        <button style="display:inline-block; margin-left: 50%;" onclick="saveAsPNGWithWhiteBg()">Save as PNG</button>
                    </div>
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
                                    <p onclick='myFunction()' class=''><a id='ask' href='#'>Ask the Presenter</a></p>
                                    <p class=''><a id='exit_chat' href='\index'>Exit Chat</a></p>
                                ";
                            ?>
                            <!-- <p class='welcome_chat'>Welcome, $current_user.<b></b></p> -->
                            <!-- <p class="logout_chat"><a id="exit" href="#">Exit Chat</a></p> -->
                        </div>
                        <div id="chatbox">
                            <?php
                                if(file_exists("log.html") && filesize("log.html") > 0){
                                    $contents = file_get_contents("log.html");          
                                    echo $contents;
                                }
                                echo "Khalid: test";
                                echo "<br>Miraj: hello world";
                                echo "<br>Emmanuel: I love PHP";
                                echo "<br>Tim: #CONUHACKS";
                            ?>
                        </div>
                        <form class="message" action="">
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

    <script type="text/javascript">
        function myFunction() {
        let text;
        let question = prompt("Please enter your question:");
        if (question == null || question == "") {
            text = "User cancelled the prompt.";
        } else {
            // text = "Hello " + question + "! How are you today?";
            text = question;
        }
        // document.getElementById("demo").innerHTML = text;
        }
    </script>

    <script>
    // get reference to the canvas element
    var canvas = document.getElementById("whiteboard");

    // set the canvas dimensions
    canvas.width = 800;
    canvas.height = 600;

    // get the 2D rendering context
    var ctx = canvas.getContext("2d");

    // flag to track whether the user is currently drawing
    var isDrawing = false;

    // starting position of the line
    var x = 0;
    var y = 0;

    // add event listeners for user input
    canvas.addEventListener("mousedown", startDrawing);
    canvas.addEventListener("mousemove", draw);
    canvas.addEventListener("mouseup", stopDrawing);

    // color of the marker
    var color = "black";

    // color of the marker
    var color = "black";
    var eraser = false;

    function setColor(newColor) {
        if (newColor === "white") {
            eraser = true;
        } else {
            color = newColor;
            eraser = false;
        }
    }


    function startDrawing(e) {
      // update the flag and starting position
      isDrawing = true;
      x = e.clientX;
      y = e.clientY;
    }

    function draw(e) {
      if (isDrawing) {
        // set the color and line width
        ctx.strokeStyle = eraser ? "white" : color;
        ctx.lineWidth = eraser ? 20 : 2;

        // begin a new path
        ctx.beginPath();

        // move the cursor to the starting position
        ctx.moveTo(x, y);

        // update the ending position and draw the line
        x = e.clientX;
        y = e.clientY;
        ctx.lineTo(x, y);

        // render the path on the canvas
        ctx.stroke();
      }
    }

    function stopDrawing() {
      // update the flag
      isDrawing = false;
    }

    function saveAsPNG() {
        // get the canvas content as a data URI
        var dataURL = canvas.toDataURL();
        // create a temporary link element
        var link = document.createElement("a");
        // set the link's href to the data URI
        link.href = dataURL;
        // set the link's download attribute
        link.download = "whiteboard.png";
        // simulate a click on the link
        link.click();
        // remove the link from the DOM
        link.remove();
    }

    function saveAsJPG() {
        // get the canvas content as a data URI
        var dataURL = canvas.toDataURL("image/jpeg");
        // create a temporary link element
        var link = document.createElement("a");
        // set the link's href to the data URI
        link.href = dataURL;
        // set the link's download attribute
        link.download = "whiteboard.jpg";
        // simulate a click on the link
        link.click();
        // remove the link from the DOM
        link.remove();
    }

    function saveAsPNGWithWhiteBg() {
        // create a new canvas element
        var tempCanvas = document.createElement("canvas");
        // set the new canvas dimensions
        tempCanvas.width = canvas.width;
        tempCanvas.height = canvas.height;

        // get the 2D rendering context for the new canvas
        var tempCtx = tempCanvas.getContext("2d");
        // fill the new canvas with white background
        tempCtx.fillStyle = "white";
        tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);
        // draw the original canvas content onto the new canvas
        tempCtx.drawImage(canvas, 0, 0);

        // get the canvas content as a data URI
        var dataURL = tempCanvas.toDataURL();
        // create a temporary link element
        var link = document.createElement("a");
        // set the link's href to the data URI
        link.href = dataURL;
        // set the link's download attribute
        link.download = "whiteboard.png";
        // simulate a click on the link
        link.click();
        // remove the link from the DOM
        link.remove();
    }
  </script>
</html>