<?php include 'rech.php';
			$ddb=$_POST['debut'];
			$dfn=$_POST['fin'];
			$array =array();
			$array=rech($ddb,$dfn);

			echo json_encode($array);


			
		?>