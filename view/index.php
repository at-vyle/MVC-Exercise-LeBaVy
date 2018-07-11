<!DOCTYPE html>
<html>
<head>
	<title>Book MVC</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="media/css/reset.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link rel="stylesheet" type="text/css" href="media/css/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css">
</head>
<?php
$msg;
if(isset($_REQUEST['msg'])){
	switch ($_REQUEST['msg']) {
		case 1:
			# code...
			$msg="Add ";
			break;
		case 2:
			# code...
			$msg="Edit ";
			break;
		case 3:
			# code...
			$msg="Delete ";
			break;
	}
}
$err;
if(isset($_REQUEST['err'])){
	switch ($_REQUEST['err']) {
		case 3:
			# code...
			$err="Delete book fail ";
			break;
	}
}
?>
<body bgcolor="#E6E6FA">
	<div class="wrapper">
		<div class="container">
			<div class="table-container">
				<div class="clr">
					<?php if(isset($_REQUEST['msg'])) {?>
					<div class="msg-div">
						<i class="fas fa-check fa-lg"></i><span class="tag-name"><?=$msg?> book successful</span>
					</div>
					<?php } ?>
					<?php if(isset($_REQUEST['err'])) {?>
					<div class="err-div">
						<i class="fas fa-ban fa-lg"></i><span class="tag-name"><?=$err?></span>
					</div>
					<?php } ?>
					<div class="add-div">
						<button class="add-button"><a href="?action=add" style="color:  white;"><i class="fas fa-plus fa-lg"></i><span class="tag-name">Add book</span></a></button>
					</div>
				</div>
				<form class="clr search-form" action="/" method ="POST">
					<div class="input-search">
						<div class="input-name"><input type="text" value="<?= isset($_POST['keyword'])?$_POST['keyword']:"" ?>" name="keyword"></div>
					</div>
					<div class="search-div">
						<button type="submit" class="add-button"><i class="fas fa-plus fa-lg"></i><span class="tag-name">Search book</span></button>
					</div>
				</form>
				<form class="del-form" action="xulyxoaallnhanvien.php" method="post">
					<table class="table" border="1px" width="100%" align="center">
						<tr>
							<th class="label">ID</th>
							<th class="label">Name</th>
							<th class="label">Author</th>
							<th class="label">Year</th>
							<th class="label">Action</th>
						</tr>
						<?php 
                            foreach($listBooks as $key => $value)
                            {
								$id=$value->getId();
								$name =$value->getName();
								$author =$value->getAuthor();
								$year =$value->getYear();
								?>
								<tr>
										<td class="value"><?= $id ?></td>
										<td class="value"><?= $name; ?></td>
										<td class="value"><?= $author; ?></td>
										<td class="value"><?= $year; ?></td>
										<td style="text-align: center;">
											<a href="?action=edit&id=<?= $id ?>" style='margin-right: 44px;'><i class='far fa-edit fa-lg'></i></a>
											<a href="?action=delete&id=<?= $id ?>"><i class='far fa-trash-alt fa-lg'></i></a>
										</td>
								</tr>
						<?php 
							}
						 ?>

					</table>
					<div id="del-all" style="display: none;" class="add-div">
						<button class="add-button" style="width: 122px" ><i class="fas fa-trash fa-lg"></i><span class="tag-name">Xóa tất cả</span></button>
					</div>
				</form>
			</div>
			
			

		</div>
    </div>
    </body>
    </html>
