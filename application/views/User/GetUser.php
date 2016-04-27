<h1>Users</h1>

<div id="body">
     <div>
        <a href="<?php echo site_url ('/user/create/'); ?>"><button style='background-color: #cfd7dd 'type="button">Add User</button></a>
    </div>
    <br/>
    <div>
        <table style="width:6%">
        <?php
            foreach($users as $user){
         ?>
            <tr>
                <td><a style='color: darkblue' href="<?php echo site_url ('/user/update/'.$user['id']); ?>"><?php echo $user['name']?></a></td>
                <td><a style='color: #E67E22'  href="<?php echo site_url ('/user/deleteUser/'.$user['id']); ?>">Delete</a></br></td> 
            </tr>          
        <?php
            }
        ?>
        </table>
    </div>
</div>