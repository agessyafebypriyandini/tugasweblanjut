<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/signin.css"/>
</head>
<style class="text/css">
	body{
		background : url(images/souveniers.jpg) no-repeat;
		background-size : cover;
	}
	.form-signin{
		width: 30%;
		height: 500px;
		background-color: #F0E68C;
		margin: 5% auto;
		padding: 2%;
	}
</style>
<body>
	<form action="cek_login.php" method="POST" class="form-signin" autocomplete="off">
		<center><h1 class="h3 mb-3 font-weight-normal"><b>Sign In</b></h1></center><br/>
		<label class="">Username</label>
		<input type="text" name="txtUser" class= "form-control" placeholder="Username" required="required" autofocus="autofocus"/>
		<label  class="">Password</label>
		<input type="password" name="txtPass" class= "form-control"  placeholder="Password" required="required"/>
		<label  class="">Level</label>
		<select name="txtLevel" class= "form-control custom-select" required="required">
			<option value="">Pilih</option>
			<option value="admin">Admin</option>
			<option value="user">User</option>
		</select>
		<br/>
		<br/>
		<button class= "btn btn-primary btn-block" type="submit">Login</button>
		<center><p class="mt-5 mb-3 text-muted">&copy; 2022</p></center>
	</form>
</body>
</html>