<h1>Categories</h1>

<div id="body">
     <div>
        <a href="<?php echo site_url ('/category/create/'); ?>"><button style='background-color: #cfd7dd 'type="button">Create Category</button></a>
    </div>
    <br/>
    <div>
        <table style="width:6%">
        <?php
            foreach($categories as $category){
         ?>
            <tr>
                <td><a style='color: darkblue' href="<?php echo site_url ('/category/update/'.$category['id']); ?>"><?php echo $category['name']?></a></td>
                <td><a style='color: #E67E22' href="<?php echo site_url ('/category/deleteCategory/'.$category['id']); ?>">Delete</a></br></td> 
            </tr>          
        <?php
            }
        ?>
        </table>
    </div>

</div>