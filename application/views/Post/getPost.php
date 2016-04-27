<h1>Posts</h1>

<div id="body">
     <div>
        <a href="<?php echo site_url ('/post/create/'); ?>"><button style='background-color: #cfd7dd 'type="button">Create Post</button></a>
    </div>
    <br/>
    <div>
        <table style="width:6%">
        <?php
            foreach($posts as $post){
         ?>
            <tr>
                <td><a style='color: darkblue' href="<?php echo site_url ('/post/update/'.$post['id']); ?>"><?php echo $post['name']?></a></td>
                <td><a style='color: #E67E22'  href="<?php echo site_url ('/post/delete/'.$post['id']); ?>">Delete</a></br></td> 
            </tr>          
        <?php
            }
        ?>
        </table>
    </div>

</div>