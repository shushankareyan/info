<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="Login" name="Login" action="<?php echo site_url("user/loginHandle"); ?>" method="post">
		<h2> Login </h2>
		<p> 
			<label for="email"  >Email </label>
			<input class="input" name ="email" type ="text">
		</p>
		<p> 
			<label for="password"  > Password </label>
			<input class="input" name ="password" type ="password">
		</p>
		<input type="submit" value="Log In" name="login">
</form>

