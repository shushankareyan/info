<h1>Users</h1>

<div id="body">
    <div>
        <a href="<?php echo site_url ('/user/create/'); ?>">Create User</a>
    </div>
    <br/>
    <div>
        <?php
            foreach($users as $user){
        ?>
            <a href="<?php echo site_url ('/user/update/'.$user['id']); ?>"><?php echo $user['name']?></a>
            <a href="<?php echo site_url ('/user/deleteUser/'.$user['id']); ?>">Delete</a></br>
        <?php
            }
        ?>
    </div>
</div>
