<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('loginpage/style.css')}}">
    <title>Login Page </title>
</head>
<body>
   <div  class="wrapper">
    <form class="form-signin" method="post" action="/login">
      <h2 class="form-signin-heading">Admin login</h2>
		{{csrf_field()}}
      <input type="text" class="form-control" name="email" placeholder="email address" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="password" required=""/>
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberme" name="rememberme"> remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">login</button>
    </form>
  </div>
</body>
</html>
