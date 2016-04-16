<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="Cat" name="Category" action="<?php echo site_url("category/create"); ?>" method="post">
		<h2> Category </h2>
		<p> 
			<label for="categoryName"  >Name </label>
			<input class="input" name ="categoryName" type ="text">
		</p>
			
		<input type="submit" value="Create" name="">
</form>
