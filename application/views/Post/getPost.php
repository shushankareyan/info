<h1>Posts</h1>
 
<div id="body">
        <div>
             <a href="<?php echo site_url ('/post/create/'); ?>">Create Post</a>
        </div>
    <br/>
    <div>
        <?php
            foreach($posts as $post){
                ?>
                <a href="<?php echo site_url ('/post/update/'.$post['id']); ?>"><?php echo $post['name']?></a>
                 <a href="<?php echo site_url ('/post/delete/'.$post['id']); ?>">Delete</a></br>
                
        <?php
            }

        ?>
     </div>            
</div>
