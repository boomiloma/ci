<br>
<div id="notif"></div>
<div class="col-md-12">
		<div class="row">	
<?php
if (!empty($users)) :
	
	foreach ($users as $user) : ?>
	
		<div class="col-md-2">	
			<div class="flip-card">
				<div class="flip-card-inner">
					<div class="flip-card-front" >
						<img src="<?= base_url('assets/images/').$user->team.'.png'; ?>" alt="Avatar" 
						style="width:200px;height:200px;" id="img_<?=strtolower($user->id); ?>">
					</div>
					<div class="flip-card-back" id="<?=strtolower($user->id); ?>" data-id="<?=$user->id?>">
						<h3><?= $user->first_name; ?> <?= $user->last_name; ?></h3>

					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>


<?php endforeach;
endif; ?>

</div>
		</div>
