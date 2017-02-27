<?php require_once('head.php'); ?>



	<div id="content">

		<content>

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d80127.55468561659!2d16.92182471665884!3d51.12716471923209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470fe9c2d4b58abf%3A0xb70956aec205e0f5!2zV3JvY8WCYXc!5e0!3m2!1spl!2spl!4v1459714333467" width="600" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

		</content>

		<aside>

		<?php if( db_check( $data['con'] ) ) { ?>

			Zalogowany jako: <?php echo $_SESSION['user_email']; ?>


		<?php }else{ ?>

			 <?php header('Location: index.php'); ?>
			 
		<?php } ?>

		</aside>



	</div>

<?php require_once('foot.php'); ?>