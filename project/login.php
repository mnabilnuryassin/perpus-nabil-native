<!DOCTYPE html>
<html>
<head>
	<title></title>

    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>

<body>
<form action="proses_login.php" method="post">

		<div class="form-login">
			<input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">

			<input name="password" type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1"> 
		</div>


		<button name='submit_login' type='submit' class='btn btn-dark'>Login</button>

</form>
</body>
</html>