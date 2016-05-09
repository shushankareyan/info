<h2> Login </h2>

<?php
        echo form_open("user/login_validation");
        echo validation_errors();
        echo '<p>Email ';
        echo form_input('email', $this->input->post('email'));
        echo '</p>' ;

        echo '<p>Password ';
        echo form_password('password');
        echo '</p>' ;

        echo '<p>' ;
        echo form_submit('','Login');
        echo '</p>' ;

        echo form_close();
 ?>