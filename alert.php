<?php
$error = 5;
 if ($error == 8) {
$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
}else {
    $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>frfr</title>
</head>
<body>

<div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <?php echo $result; ?>    
        </div>
    </div>

</body>
</html>
