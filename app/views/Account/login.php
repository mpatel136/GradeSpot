<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<title>Login</title>
</head>
<body>
<div class="container">

	<h1>Log in</h1>

    <?php if(isset($model['error']))
        echo "<div class='alert alert-danger' role='alert'>$model[error]</div>";
	?>

	<form action="" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" name="email" id="email" />
        </div>
      
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password" />
        </div>


        <div class="form-group">
            <input type="submit" name="login" value="Login" />
        </div>
	</form>
</div>
</body></html>