<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/bootstrap.js"></script>
	<title>Create an account</title>
</head>
<body>
<div class="container">

	<h1>Sign up</h1>

    <?php if(isset($model['error']))
        echo "<div class='alert alert-danger' role='alert'>$model[error]</div>";
	?>

	<form action="" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" />
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" />
        </div>

        <div class="form-group">
            <label for="university_id">University</label>
            <input type="text" class="form-control" name="university_id" id="university_id" />
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" name="email" id="email" />
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password" />
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="text" class="form-control" name="confirm_password" id="confirm_password" />
        </div>

        <div class="form-group">
            <input type="submit" name="create_user" value="Create an account" />
        </div>
	</form>
</div>
</body></html>