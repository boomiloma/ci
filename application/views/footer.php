<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js'); ?>"></script>

<script>
	$(document).ready(function() {

		$('.chumma').click(function() {
			$("#load").show();
			var id = $(this).attr('id');
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected').css('background-color', '#2980b9');
				$('#img_' + id).attr('src', '<?= base_url(); ?>assets/images/grey.png');
			} else {
				$(this).addClass('selected');
		 
				$.ajax({
					method: 'POST',
					url: '<?= base_url(); ?>index.php/users/addPlayers',
					dataType: 'json',
					data: {
						'id': $(this).data('id')
					},
					success: function(response) {
						$("#load").hide();
						if (response.status == true) {
							$('#img_' + response.id).attr('src', '<?= base_url(); ?>assets/images/' + response.image);
							$('#notif').html('<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-success alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + response.message + '</div>');

							socket.emit('message', {
								id: response.id,
								image: response.image,
								status: response.status,
								team: response.team,
								captain: response.captain,
								name: response.name,
							});


						} else {
							$('#notif').html('<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + response.message + '</div>');
						}

						$('#notif').focus();
					}
				});
			}
		});
	});





	var socket = io.connect('http://' + window.location.hostname + ':3000');

	socket.on('message', function(data) {
		console.log(data);
		if (data.id && data.status == true) {
			$('#img_' + data.id).attr('src','<?= base_url(); ?>assets/images/' + data.image);
		}

	});
</script>
