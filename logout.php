<?php 	
		session_start();
		session_destroy();
		echo "<script>
				window.alert('Logout Successfully')
				window.location='Login.php'
		</script>";
		
?>