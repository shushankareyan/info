<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="Reg" name="Register" action="<?php echo site_url("user/register"); ?>" method="post">
		<h2> Sign up </h2>
		
                <p> 
			<label for="userEmail"  >Email </label>
			<input class="input" name ="userEmail" type ="text">
		</p>
		<p> 
			<label for="userPass"  > Password </label>
			<input class="input" name ="userPass" type ="password">
		</p>
			
		<input type="submit" value="Sign up" name="">
</form>
