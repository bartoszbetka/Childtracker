<?php




	function view( $file = NULL , $data = NULL ) {

			$dirFile = str_replace('\\','/',DIR.'/includes/views/'.$file.'.php');

			

			

			if( $file ) 

				

				if( file_exists( $dirFile )) {

					

						ob_start();

						require_once( $dirFile );

						

						$content = ob_get_contents();

						ob_end_clean();


						return $content;

						

					}

					

				

				

			return false;

		}

	
	function db_connect( ) {

			$con = mysqli_connect( DB_HOST,DB_USER,DB_PASS,DB_NAME );



			if (mysqli_connect_errno()) {

				echo "MySQLi Connection was not established: " . mysqli_connect_error();

				return false;

				die();

			}

			

			return $con;



		}



	function db_login( $email, $pass, $con ) {



		$email =  $email ;

		$pass =  $pass;



		$sel_user = "SELECT * 

					 FROM User

					 WHERE mail='".$email."' 

					 AND password='". md5($pass)."' ;";



		$run_user = mysqli_query($con, $sel_user );



		$check_user = mysqli_num_rows( $run_user );

	

		if( $check_user>0 ) {

			

			$_SESSION['user_email'] = $email;

			header('Location: index.php?p=map');
			unset($_SESSION['blad']);

			die();

			

		} else {

			$_SESSION['blad']='<span style="color:red">Nierpawidlowy mail lub haslo!</span>';
			header('Location: index.php');
			die();

		}	

		}
	

	function db_register( $data, $con ) {


		$sel_user = "INSERT INTO `User`(`user_id`, `mail`, `name`, `last_name`, `password`, `parent`, `admin`, `data_id`) VALUES (
						'',
						'".$data['email']."',
						'".$data['first_name']."',
						'".$data['last_name']."',
						'".md5($data['password'])."',
						'".$data['parent_email']."',
						'0',
						'0')
							
							";
	

		$run_user = mysqli_query($con, $sel_user );


		}

	

	function db_check( $con  ) {



		$email = $_SESSION['user_email'];



		if( empty( $email ))

			return false;

		$sel_user = "SELECT * 

					 FROM User

					 WHERE mail='".$email."' ;";



		$run_user = mysqli_query($con, $sel_user );



		$check_user = mysqli_num_rows( $run_user );



		if( $check_user>0 ) {

			return true;

		}

	

			return false;

		}

		

	

	

 ?>