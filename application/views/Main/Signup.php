<h2> Sign up </h2>

<?php
echo form_open("user/signup");
echo validation_errors();
echo '<p>Email ';
echo form_input('email', $this->input->post('email'));
echo '</p>' ;

echo '<p>Password ';
echo form_password('password');
echo '</p>' ;

echo '<p>Confirm Password ';
echo form_password('cpassword') ;
echo '</p>' ;

echo '<p>' ;
echo form_submit('','Sign Up') ;
echo '</p>' ;

echo form_close();
?>