<?php

class UserController extends Controller
{
	public function actionLogin()
	{
		$arResult = [];
		if(!Yii::app()->user->isGuest) 
			$this->redirect('/');		

		if(isset($_POST['Login']))
		{
			$loginFirm = new LoginForm;
			$loginFirm->attributes = $_POST['Login'];
			if($loginFirm->validate() && $loginFirm->login())
				$this->redirect('/');
			else{
				
				$arResult['errors'] = $loginFirm->getErrors();
			}
			
		}
		$this->render('login', $arResult);
	}
	
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('/');

	}
	
}