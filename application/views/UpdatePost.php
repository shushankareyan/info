<form id="Post" name="Post" action="<?php echo site_url("post/update".$post->id); ?>" method="post">
		<h2> Post </h2>
		<p>
			<label for="postName"  >Name </label>
			<input class="input" name ="postName" value="<?php echo $post->name; ?>"  type ="text">
		</p>
		<p>
                    <label >Category </label>
                    <select name='categoryId'>
                        <?php
                            foreach($categories as $category){
                        ?>
                            <option value="<?php echo $category['id']?>" <?php if($category['id'] == $post->category_id){echo "selected"; } ?>><?php echo $category['name']?></option>
                        <?php
                            }
                        ?>
                    </select>
		</p>
		<input type="submit" value="Create" name="">
</form>