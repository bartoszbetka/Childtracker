<?php require_once('head.php'); ?>


		<?php if( db_check( $data['con'] ) ) { ?>

			<?php header('Location: index.php'); ?>


		<?php } ?>

			 
		

		

<div id="content">
<div id="formularz">
<form action="" method="post">
	<span style="color:red;"><?php foreach( $data['notifications'] as $n ) echo $n.'<br />'; ?></span>
	<span style="color:green;"><?php foreach( $data['notifications_ok'] as $n ) echo $n.'<br />'; ?></span>
<fieldset>
 Obowiązkowe pola oznaczono znakiem <em>*</em>
<?php 
	$dp='none';
	if( isset( $_POST['type'] ))
		if( $_POST['type'] == 'child' )
			$dp = 'block';
		
	?>
   
 <legend>Rejestracja</legend>
 <br /><br />
 Typ konta<br />
 <div style="float:left;display:block;clear:both;width:100%;">
	<div style="display:inline-block;clear:both;"><input  <?php  echo ($_POST['type'] == 'child' )   ? 'checked="checled"': ''; ?> style="width:auto;" type="radio" name="type" id="child" value="child"/> <label style="display:inline-block;width:auto;" for="child">Dziecko</label></div>
	<div style="display:inline-block;clear:both;"><input <?php  echo ($_POST['type'] == 'parent')   ? 'checked="checled"': ''; ?> style="width:auto;" type="radio" name="type" id="parent" value="parent"/> <label style="display:inline-block;width:auto;" for="parent">Rodzic</label></div>
	</div>	
<br />
 <label for="first_name">Imię: <em>*</em></label>
	<input name="first_name" value="<?php  echo  isset( $_POST['first_name'] ) ?  $_POST['first_name'] : ''; ?>" id="first_name" required pattern="[A-Za-ząćęłńóśżźĄĆĘŁŃÓŚŻŹ]{3,25}"><br>
 
 <label for="last_name">Nazwisko: <em>*</em></label>
	<input name="last_name" value="<?php  echo  isset( $_POST['last_name'] ) ? $_POST['last_name'] : ''; ?>" id="last_name" required pattern="[A-Za-ząćęłńóśżźĄĆĘŁŃÓŚŻŹ]{3,25}"><br>
 
 <label for="email">E-mail: <em>*</em></label>
	<input name="email" value="<?php  echo  isset( $_POST['email'] ) ? $_POST['email'] : ''; ?>" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Niewłaściwy adres Email"><br>
 
 <label for="password">hasło: <em>*</em></label>
	<input name="password" value="<?php  echo  isset( $_POST['password'] ) ? $_POST['password'] : ''; ?>" type="password" id="password" required pattern=".{6,}" title="Hasło musi mieć conajmniej 6 znaków"><br>
 
 <label for="password2">powtórz hasło: <em>*</em></label>
	<input name="password2" value="<?php  echo  isset( $_POST['password2'] ) ? $_POST['password2'] : ''; ?>" type="password" id="password2" required pattern=".{6,}" title="Hasło musi mieć conajmniej 6 znaków" ><br>
	 <div style="display:<?php echo $dp; ?>;" class="er">
	 <label for="parent_mail">E-mail rodzic: <em>*</em></label>
		<input name="parent_email" value="<?php  echo  isset( $_POST['parent_email'] ) ? $_POST['parent_email'] : ''; ?>" id="parent_mail"  title="Niewłaściwy adres Email"><br>
	</div>
<label for="terms">Akceptuję regulamin <em>*</em></label> 
	<input type="checkbox" name="terms" required/><br>
 <br /> 
<div class="g-recaptcha" data-sitekey="6Lc3KR8TAAAAAJHX6_DX0c1OWLpMr5AN4xjW0M5f"></div>
 <br /> <br /> <br /> 
 <label for="ssubmit"><br></label>
 <input type="submit" name="ssubmit" value="Rejestracja" />

 </fieldset>
 </form>

</div>

</div>
<script>
	jQuery( document ).ready(function () {
			$('body').on('change','[name=type]',function() {

					if( $(this).val() == 'child' )
						$('.er').slideDown();
					else
						$('.er').slideUp();
				});
		
		
		});
</script>
<?php require_once('foot.php'); ?>