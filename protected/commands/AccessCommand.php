<?php
class AccessCommand extends CConsoleCommand {
	
    public function actionAddRules() {
      $auth = Yii::app()->authManager;
	  
      $auth->createOperation('login',      'Авторизация');    
      $auth->createOperation('indexBook',  'Список Книг');
      $auth->createOperation('createBook', 'Создать книга');
      $auth->createOperation('updateBook', 'Изменить книгу');
      $auth->createOperation('deleteBook', 'Удалить книгу');
     
     
      $role=$auth->createRole('user');
      $role->addChild('login');
      $role->addChild('indexBook');
      $role->addChild('createBook');
      $role->addChild('updateBook');
      $role->addChild('deleteBook');
    }   
}