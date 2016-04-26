<h1>Categories</h1>

<div id="body">
     <div>
        <a href="<?php echo site_url ('/category/create/'); ?>">Create Category</a>
    </div>
    <br/>
    <div>
         <?php
            foreach($categories as $category){
                ?>
                <a href="<?php echo site_url ('/category/update/'.$category['id']); ?>"><?php echo $category['name']?></a>
                 <a href="<?php echo site_url ('/category/deleteCategory/'.$category['id']); ?>">Delete</a></br>

                <?php
            }
         ?>
    </div>
</div>