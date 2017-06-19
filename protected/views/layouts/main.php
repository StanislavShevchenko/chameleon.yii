<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/daterangepicker/daterangepicker.css" >
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Ch</span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/"><?=Yii::app()->user->name?></a>
	</div>
	<div class="collapse navbar-collapse">
		<?php $url = Yii::app()->request->pathInfo;?>
		<ul class="nav navbar-nav">			
			<?php if(Yii::app()->user->isGuest):?>
				<li>
					<a href="/login" class="<?=(strripos($url, 'login') === false)?'':'active_main_menu'?>"><i  class="fa fa-sign-in " aria-hidden="true"></i> Войти</a>
				</li>
			<?php else:?>
				<li>
					<a href="/logout" ><i  class="fa fa-sign-out " aria-hidden="true"></i> Выйти</a>
				</li>
			<?php endif;?>
		</ul>			
	</div>
</div>
	
	
<div class="container container_main">	
	<?php echo $content; ?>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/daterangepicker/moment.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>
</body>
</html>
