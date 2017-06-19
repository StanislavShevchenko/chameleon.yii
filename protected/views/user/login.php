<?php $this->pageTitle = 'Авторизация'; ?>

<div class="site-login">
    <h1>Авторизация</h1>
    <form id="login-form" class="form-horizontal" action="/login" method="post" role="form">
		<div class="form-group ">
			<label class="col-lg-1 control-label" for="login-login">Логин</label>
			<div class="col-lg-3"><input class="form-control" name="Login[username]" autofocus="" type="text"></div>
			<div class="col-lg-3 error" style="<?=(!empty($errors['username']))? '	display: block':''?>">
				<?=$errors['username']['0'] ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-1 control-label" for="login-password">Пароль</label>
			<div class="col-lg-3"><input  class="form-control" name="Login[password]"  type="password"></div>
			<div class="col-lg-3 error" style="<?=(!empty($errors['password']))? '	display: block':''?>">
				<?=$errors['password']['0'] ?>
			</div>
		</div>
		
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
			<button type="submit" class="btn btn-primary" name="login-button">Авторизация / Регистрация </button>            </div>
        </div>
    </form>
</div>