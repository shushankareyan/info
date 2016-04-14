<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


 <?php
            foreach($posts as $post){
?>
<form id="Post" name="Post" action="<?php echo site_url("post/update".$post['id']); ?>" method="post">
		<h2> Post </h2>
		<p> 
			<label for="postName"  >Name </label>
			<input class="input" name ="postName" value="<?php echo $post['name']; ?>"  type ="text">
		</p>
		<p> 
                    <label >Category </label>
                    <select name='categoryId'>
                        <option value="<?php echo $post['category_id']; ?>" selected ><?php echo $post['category_name']; ?></option>
                        <?php
                            foreach($categories as $category){
                        ?>
                            <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                        <?php
                            }
                        ?>
                    </select>
		</p>
                
		<input type="submit" value="Create" name="">
</form>
 <?php
    }
 ?>