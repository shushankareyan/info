<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="Reg" name="Registration" action="<?php echo site_url("user/registrationHandle"); ?>" method="post">
		<h2> Registration </h2>
		<p> 
			<label for="name"  >Name </label>
			<input class="input" name ="name" type ="text">
		</p>
		<p> 
			<label for="email"  >Email </label>
			<input class="input" name ="email" type ="text">
		</p>
		<p> 
			<label for="password"  > Password </label>
			<input class="input" name ="password" type ="password">
		</p>
		<input type="submit" value="Sign Up" name="registration">
</form>
