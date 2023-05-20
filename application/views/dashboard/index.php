<br>
<div id="notif"></div>
<div id="load" style="display:none"></div>
<a href="<?=base_url();?>index.php/users/logout" class="btn btn-danger"> Logout</a>
<div class="col-md-12">
		<div class="row">	
<?php
if (!empty($users)) :
	
	foreach ($users as $user) :
	 ?>
	
		<div class="col-md-2 chumma <?php if($user->team!='grey'){echo 'selected'; }?>"  id="<?=strtolower($user->id); ?>" data-id="<?=$user->id?>" style="cursor:pointer;padding:5px">	
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front" >
						 <img src="<?= base_url('assets/images/').$user->team.'.png'; ?>" alt="Avatar" 
						style="width:200px;height:200px;" id="img_<?=strtolower($user->id); ?>">
						<b><h3 style="margin:-26px;font-family: cursive;"><?= $user->first_name; ?></h3></b>
					</div>
					 
				</div>
			</div>
			<div class="clearfix"></div>
		</div>


<?php endforeach;
endif; ?>

</div>
		</div>
