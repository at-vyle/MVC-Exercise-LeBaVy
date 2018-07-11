<!DOCTYPE html>
<html>
<head>
	<title>Book MVC</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="media/css/reset.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link rel="stylesheet" type="text/css" href="media/css/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
</head>
<body bgcolor="#E6E6FA">
	<div class="wrapper">
		<div class="container">
			<form class="add-form" action="?action=store" method="post">
				<div class="block-title"><h2>Add Book</h2></div>
				<div class="form-group">
					<div class="label-name"><label>Name:</label></div>
					<div class="input-name"><input type="text" name="name" required></div>
				</div>
				<div class="form-group">
					<div class="label-name"><label>Author:</label></div>
					<div class="input-name"><input type="text" name="author" required></div>
				</div>
				<div class="form-group">
					<div class="label-name"><label>Year:</label></div>
					<div class="input-name"><input type="text" name="year" required></div>
				</div>
				
				<div class="form-group" style="padding-left: 123px;">
				
					<div class="button-sub"><input class="button-name" type="submit" value="Add"></div>
					
					<div class="button-res"><input class="button-name" type="reset" value="Reset"></div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
