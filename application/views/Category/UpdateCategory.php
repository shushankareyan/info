<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?> 

<form id="Cat" name="category" action="<?php echo  site_url('/category/update/'.$category->id); ?>" method="post">
		<h2> <?php echo $category->name; ?> </h2>
		<p> 
			<label for="categoryName"  >Name </label>
			<input class="input" name ="categoryName" value="<?php echo $category->name; ?>" type ="text">
		</p>
               			
		<input type="submit" value="Update" name="">
</form>
