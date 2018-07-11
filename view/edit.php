<!DOCTYPE html>
<html>
<head>
	<title>BOOKMVC</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="media/css/reset.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link rel="stylesheet" type="text/css" href="media/css/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
</head>
<body bgcolor="#E6E6FA">
	<div class="wrapper">
		<div class="container">
			<form class="add-form" action="?action=update" method="post">
				<div class="block-title"><h2>Edit Book</h2></div>
				<div class="form-group">
                    <input type="hidden" name="id" value="<?= $objBook->getId() ?>">
					<div class="label-name"><label>Name:</label></div>
					<div class="input-name"><input type="text" name="name" value="<?= $objBook->getName() ?>" required></div>
				</div>
				<div class="form-group">
					<div class="label-name"><label>Author:</label></div>
					<div class="input-name"><input type="text" name="author" value="<?= $objBook->getAuthor() ?>" required></div>
				</div>
				<div class="form-group">
					<div class="label-name"><label>Year:</label></div>
					<div class="input-name"><input type="text" name="year" value="<?= $objBook->getYear() ?>" required></div>
				</div>
				
				<div class="form-group" style="padding-left: 123px;">
				
					<div class="button-sub"><input class="button-name" type="submit" value="Update"></div>
					
					<div class="button-res"><input class="button-name" type="reset" value="Reset"></div>
				</div>

			</form>

		</div>
		</div>
    </div>
    </body>
    </html>
