<!DOCTYPE html>
<html>
<head>
  <title>Log-in page</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div>
    {{session('msg')}}
  </div>
  <div class="h4">
    <b style="float: left;">LogIn Page</b>
    <a href="/register" style="float: right;">
    <b>Register</b>
    </a>
    </div><br><br>
  <div class="form"> 
    <form method="post" style="height: 250px">
      Email :<br><input class="space" type="text" name="email" placeholder="{{ $errors->first('email')}}" ><br>
      Password :<br><input class="space" type="password" name="password" placeholder="{{ $errors->first('password')}}"><br><br>
      <input type="submit" id="submit" name="" value="Submit">
    </form>
  </div>

</body>
</html>