 

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to Premier League</h1>
            <div class="account-wall">
                <img class="profile-img" src="<?=base_url('assets/images/grey.png')?>"
                    alt="">                
				<?php echo form_open('users/login', array('id' => 'loginForm','class' =>'form-signin')) ?>
                <input type="text" class="form-control" placeholder="Email" required autofocus name="email">
				<?php echo form_error('email', '<div class="error">', '</div>') ?>
                <input type="password" class="form-control" placeholder="Password" required name="password">
				<?php echo form_error('password', '<div class="error">', '</div>') ?>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
               
				<?php echo form_close(); ?>
            </div>
       
        </div>
    </div>
</div>

