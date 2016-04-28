<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if ( empty($categories)){
    ?>
        <div>
            <h3>
                You don't have categories. Please add category at first
            </h3>
        </div>

    <?php

} else {
?>

<form id="Post" name="Post" action="<?php echo site_url("post/create"); ?>" method="post">
		<h2> Post </h2>

		<p> 
			<label for="postName"  >Name </label>
			<input class="input" name ="postName" type ="text">
		</p>
		<p> 
                    <label >Category </label>
                    <select name='categoryId'>
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
