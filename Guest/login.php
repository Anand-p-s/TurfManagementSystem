

<link rel="stylesheet" href="login.css">
<script src="login.js"></script>
<a href="../Guest/index.php"><h3>Home</h3></a>
<div class="container" id="container">
	<!-- <div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div> -->
	<a href="../Guest/index.php">Home</a>
	<div class="form-container sign-in-container">
		<form action="loginaction.php" method="post">
			<h1>Sign in</h1>
			<input type="text" placeholder="Username" name="username" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<a href="forgotpwd.php">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<a href="customerreg.php"><button class="ghost" id="signUp">Sign Up</button></a>
			</div>
		</div>
	</div>
</div>


