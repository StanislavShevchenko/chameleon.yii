<?php

class BooksController extends Controller
{
	public function filters() {
		return array('accessControl');
	}
	  
	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('edit'),
				'roles'   => array('user')
			),
			array('deny',
				'users' => array('guest'),
			),
		);
	}	
	
	public function actionEdit($id = 0 )
	{	
		$arResult = [
			'book'
		];					
		
		if(isset($_POST['BOOK']))
		{
			$bookForm = new BookForm;			
			$bookForm->preview = CUploadedFile::getInstanceByName('preview');
			$bookForm->id = ($id > 0) ? $id : '';
			$bookForm->attributes = $_POST['BOOK'];
			if($bookForm->validate() && $bookForm->save()){	
				$url = Yii::app()->request->cookies['getParams'];				
				$this->redirect('/?'.$url);
			}
			else{
				$arResult['errors'] = $bookForm->getErrors();
			}
			
		}	
		
		if($id > 0 ){
			$book = Books::model()->findByPk($id);
			if(is_object($book))
				$arResult['book'] = $book->attributes;
			else
				$this->redirect('/');
		}
		
		$arAuthors = Authors::model()->findAll();
		foreach ($arAuthors as $row) {
			$arResult['arAuthors'][] = $row->attributes;
		}		
	
		$this->render('edit', $arResult);
	}
	
}