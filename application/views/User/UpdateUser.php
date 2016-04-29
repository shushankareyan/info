<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?> 

<form id="Cat" name="user" action="<?php echo  site_url('/user/update/'.$user->id); ?>" method="post">
		<h2> <?php echo $user->name; ?> </h2>
		<p> 
			<label for="userName"  >Name </label>
			<input class="input" name ="userName" value="<?php echo $user->name; ?>" type ="text">
		</p>
                <p> 
			<label for="userEmail">Email </label>
			<input class="input" name ="userEmail" value="<?php echo $user->email; ?>" type ="text" readonly>
		</p>
                              			
		<input type="submit" value="Update" name="">
</form>
