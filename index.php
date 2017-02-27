<?php

session_start();

ini_set('display_errors',0);



 

	define( 'URL',  'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) );

	define( 'DIR',__dir__ );

	require_once('config/db.php');

	require_once('includes/functions.php');

	

	

	

		$data = [ 'seo_title'=>'Home' ];

		


		$con = db_connect();

		$data['con'] = $con;

	

	

	if( isset( $_POST['l_submit'] ) 

		&& !empty( $_POST['l_email'] ) 

		&& !empty( $_POST['l_pass'] ) )

		db_login( $_POST['l_email'],$_POST['l_pass'], $con );

		



	

	

		$param = $_GET['p'];

	

	switch( $param ) {

			case "logout";

				$_SESSION['user_email'] = NULL;

				header('Location: index.php');

				die;

			break;

			case "map";

				$data['seo_title'] = "Map";

				$content = view('map',$data );

			break;

			case "registration";
			
				global $data;
				$data['seo_title'] = "Rejestracja";
				if( isset( $_POST['ssubmit'] )) {
					$sel_user = "SELECT * 
								 FROM User
								 WHERE mail='".$_POST['email']."' ;";

					$run_user = mysqli_query($con, $sel_user );
					$check_user = mysqli_num_rows( $run_user );
					if( $check_user > 0 ) {
						$data['notifications'][] = 'Taki użytkownik już istnieje...';
					}else{
						if( $_POST['password'] != $_POST['password2'] ) {
							$data['notifications'][] = 'Hasła muszą być takie same';
						}elseif( empty( $_POST['g-recaptcha-response'] )) {
							$data['notifications'][] = 'Należy potwierdzić człowieczeństwo';
						}elseif( empty( $_POST['terms'] )) {
							$data['notifications'][] = 'Należy potwierdzić regulamin';
							
						}else{
							db_register( $_POST, $con );
							$_POST = NULL;
							$data['notifications_ok'][] = 'Rejestracja powiodła się';
							
						}
					}
						
					
					}
				$content = view('registration',$data );

			break;
			
			case "about";

				$data['seo_title'] = "O Nas";

				$content = view('about',$data );

			break;
			
			case "contact";

				$data['seo_title'] = "Kontakt";

				$content = view('contact',$data );

			break;

			default:

			

			$content = view('home',$data );

		

		}

	

	

		echo $content; 

		

	

	

 ?>