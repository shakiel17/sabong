<!DOCTYPE html>
<html>
<head>
	<title>Online Bet</title>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?=base_url('design/assets/production/images/sabong.png');?>">
	<!-- <link rel="stylesheet" type="text/css" href="slide navbar style.css"> -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet"> -->
<style>
    body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 90vh;
	font-family: 'Jost', sans-serif;
	background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
}
.main{
	width: 350px;
	height: 500px;
	background: red;
	overflow: hidden;
    background:#A27B5C;
	/*background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;*/
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: none;
}
.signup{
	position: relative;
	width:100%;
	height: 100%;
}
label{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 50px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}
input{
	width: 60%;
	height: 10px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 12px;
	border: none;
	outline: none;
	border-radius: 5px;
}
button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #FFD93D;
	font-size: 1em;
	font-weight: bold;
	margin-top: 30px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
button:hover{
	background: #6d44b8;
}
.login{
	height: 460px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
}
.login label{
	color: #573b8a;
	transform: scale(.6);
}

#chk:checked ~ .login{
	transform: translateY(-500px);
}
#chk:checked ~ .login label{
	transform: scale(1);	
}
#chk:checked ~ .signup label{
	transform: scale(.6);
}

    </style>
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form action="<?=base_url('authenticate');?>" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Username" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Login</button>
				</form>				
				<center>
					<?php
					if($this->session->error){
					?>
					<font style="color:red;"><?=$this->session->error;?></font>
					<?php
					}
					?>
					<?php
					if($this->session->success){
					?>
					<font style="color:lightgreen;"><?=$this->session->success;?></font>
					<?php
					}
					?>
				</center>
			</div>
            <div class="login">
				<form action="<?=base_url('registration');?>" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="fullname" placeholder="Full Name" required="">
					<input type="text" name="username" placeholder="Username" required="">          
					<input type="password" name="password" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>
	</div>
</body>
</html>