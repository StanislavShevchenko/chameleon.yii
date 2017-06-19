<?php

class BooksAjaxController extends Controller
{
	public function filters() {
		return array('accessControl');
	}
	  
	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('edit', 'view'),
				'roles'  => array('user')
			),
			array('allow',
				'actions' => array('view'),
				'roles'  => array('guest')
			),
			array('deny',
				'actions' => array('edit'),
				'roles'  => array('guest')
			),
		);
	}	
	
	public function actionDelete()
	{		
		$arResult = [];
		$actionDelete = false;
		
		if($_POST['id'] > 0){
			$book = Books::model()->findByPk($_POST['id']);
			if(is_object($book)){
				$book->delete();
				$actionDelete = true;
			}					
		}
		
		if($actionDelete)
			echo json_encode(['OK' => $_POST['id']]);
		else
			echo json_encode(['ERROR' => $_POST['id']]);
	}

	public function actionView()
	{		
		$arResult = [];
		$this->layout = '//layouts/ajax';
		if($_POST['id'] > 0){
			$arResult['book'] = Books::model()->with(['authors'])->findByPk($_POST['id']);
			
			if(is_object($arResult['book'])){
				$this->render('view', $arResult);
			}					
		}
		return; 	
		
	}
	
}