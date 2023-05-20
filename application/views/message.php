<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Premier League</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>
<style>
	body {
		padding-top: 70px;
	}

	#load {
		height: 100%;
		width: 100%;
	}

	#load {
		position: fixed;
		z-index: 99999;
		/* or higher if necessary */
		top: 0;
		left: 0;
		overflow: hidden;
		text-indent: 100%;
		font-size: 0;
		opacity: 0.6;
		background: #E0E0E0 url(<?php echo base_url('assets/images/load.gif'); ?>) center no-repeat;
	}

	.RbtnMargin {
		margin-left: 5px;
	}

	.blue,.Blue {
		background-color: lightskyblue;
	}

	.red,.Red {
		background-color: lightcoral;
	}
</style>

<body>
	<div id="load" style="display:none">Please wait ...</div>


	<nav class="navbar navbar-default navbar-fixed-top " role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url(); ?>message">Team List</a>
			</div>

		</div>
	</nav>

	<div class="container">
		<div id="new-message-notif"></div>
		<div class="row">
			<div class="table-responsive">
				<table id="mytable" class="table table-bordred table-striped">
					<thead>
						<th>Name</th>
						<th>Team</th>
						<th>Captain</th>
					</thead>

					<tbody id="message-tbody">

						<?php foreach ($message as $row) {  ?>

							<tr id="row_<?= $row->id ?>" class="<?php echo $row->team; ?>">
								<td><?php echo $row->first_name; ?></td>
								<td><?php echo ($row->team == 'grey') ? 'Not Selected' : ucfirst($row->team); ?></td>
								<td><?php echo ucfirst($this->db->get_where('users', ['id' => $row->id])->row()->first_name); ?></td>
							</tr>
						<?php

						}


						?>

					</tbody>
				</table>

			</div>

		</div>
	</div>


	<hr>
	<footer class="text-center">Premier League 2023</footer>
	<hr>

	<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js'); ?>"></script>

	<script>
		var socket = io.connect('http://' + window.location.hostname + ':3000');
		socket.on('message', function(data) {
	 
			if (data.status == true) {
				var team = 'Not selected';
				if (data.team != 'grey') {
					team = data.team;
				}
				$('#row_' + data.id).remove();
				$("#message-tbody").prepend('<tr id="row_' + data.id + '" class="' + data.team + '">' +
					'<td>' + data.name + '</td>' +
					'<td>' + team + '</td>' +
					'<td>' + data.captain + '</td>' +
					'</tr>');
			}

		});
	</script>
</body>

</html>
