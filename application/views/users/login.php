<div class="row justify-content-center">
    <div class="col-md-6">
        <h1><?php echo $title ?></h1>
        <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('message')?>
            </div>
        <?php } ?>
        <?php echo form_open('users/login', array('id' => 'loginForm')) ?>
            <div class="form-group">
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
                <?php echo form_error('email', '<div class="error">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                <?php echo form_error('password', '<div class="error">', '</div>') ?>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Login" class="btn btn-primary"/>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
