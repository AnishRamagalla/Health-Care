<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <style>
        body{
            background-image: url('https://cf-images.us-east-1.prod.boltdns.net/v1/static/3281700261001/d5af8031-2862-4247-a83b-17a10ba459fe/daab5b96-df69-481c-ad06-f54b1d7d3449/1920x1080/match/image.jpg');
        }
        img{
            background-size: cover;
        }
    </style>
</head>
<body>

	<style type="text/css">
	
	#text{

height: 25px;
border-radius: 5px;
padding: 4px;
border: solid thin #aaa;
width: 100%;
}

#button{

padding: 10px;
width: 100px;
color: white;
background-color: #f4511e;
border: none;
opacity: 0.6;
transition: 0.3s;
}
#button:hover{
cursor: pointer;
opacity: 1
}

#box{
margin-top: 220px;
margin-left: 800px;
background-color: darkslategray;
width: 300px;
padding: 20px;
padding-right: 60px;
}
form #x{
text-decoration: none;
color: aliceblue;
}
form #x:hover{
color: aquamarine;
}
.item2 {
    height: 70px;
    box-shadow: rgba(240, 46, 170, 0.4) -5px 5px, rgba(240, 46, 170, 0.3) -10px 10px, rgba(240, 46, 170, 0.2) -15px 15px, rgba(240, 46, 170, 0.1) -20px 20px, rgba(240, 46, 170, 0.05) -25px 25px;
	margin-left: 125px;
}

	</style>

	<div id="box">
		
		<form method="post">
		<a href="page1.php"><img class="item2" src="https://images-workbench.99static.com/iwtka28M5zc-aYIwxZ2_DkoOQRw=/99designs-contests-attachments/19/19156/attachment_19156974" >
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php" id="x">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>