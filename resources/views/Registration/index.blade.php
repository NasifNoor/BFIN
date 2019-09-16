<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
          <div>
            {{session('msg')}}
          </div>
        <div class="h4">
			<b style="float: left;">User Registration</b>
            <a href="/" style="float: right;">
                <b>LogIn</b>
            </a>
        </div><br><br>
        <div class="form">
            <form method="post">
                User Name :<br> <input class="space" type="text" name="name" placeholder="{{ $errors->first('name')}}"> <br>
                Email : <br><input class="space" type="email" name="email" placeholder="{{ $errors->first('email')}}"><br>
                Address :<br> <input class="space" type="text" name="address" placeholder="{{ $errors->first('address')}}"><br>
                Password : <br><input class="space" type="password" name="password" placeholder="{{ $errors->first('password')}}"><br>
                Confirm Password : <br><input class="space" type="password" name="confirmPassword" placeholder="{{ $errors->first('confirmPassword')}}"><br>
				<input id="submit" type="submit" name="update" value="Register" >
            </form>
        </div>  
    </body>
</html>