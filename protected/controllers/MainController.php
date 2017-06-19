<?php

class MainController extends Controller
{
	
	public function filters() {
		return array('accessControl');
	}
	  
	public function accessRules() {
		return array(
			array('allow',
				'actions' => array('index'),
				'roles'   => array('user', 'guest')
			),
//			array('deny',
//				'users' => array('guest'),
//			),
		);
	}
	
	public function actionIndex()
	{		
		$arResult  = [];
		$params    = [];
		$condition = [];
		$criteria  = new CDbCriteria;
		$sort      = (!empty($_GET['sort'])) ? Yii::app()->request->getQuery('sort') : 'asc';
		$order     = (!empty($_GET['order'])) ? Yii::app()->request->getQuery('order') : 'id';
		$arOrder = [
			'id'     => 't.id',
			'name'   => 't.name',
			'date'   => 't.date',
			'author' => 'authors.firstname',
		];
		
		
		//Поиск в указанном типе 
		if(!empty($_GET['t_q']) && !empty($_GET['q'])){
			switch ($_GET['t_q']) {
				case 'name':{
					$condition[] = "t.name like :q ";
					$params =  array(':q' => '%'.Yii::app()->request->getQuery('q').'%');
					break;
				}
				case 'authors':{
					$criteria->with  = ['authors'];
					$condition[]   = "authors.firstname like :q OR authors.lastname like :q ";
					$params = array(':q' => '%'.Yii::app()->request->getQuery('q'));
					break;
				}
				default:
					break;
			}
		}
		
		//Внутри указанных дат
		if(!empty($_GET['date_s'])){
			$condition[] = 't.date >= :date_s';
			$params[':date_s'] = strtotime($_GET['date_s']);
		}

		if(!empty($_GET['date_e'])){
			$condition[] = 't.date <= :date_e';
			$params[':date_e'] = strtotime($_GET['date_e']);
		}
		

		if(isset($arOrder[$order]) && in_array($sort, ['asc', 'desc'])){
			$criteria->order = $arOrder[$order] . ' ' . $sort;
		}
		
		$criteria->condition = implode(' AND ', $condition);
		$criteria->params = $params;

		//Сохраним гет
		if(!empty($_GET))
			Yii::app()->request->cookies['getParams'] = new CHttpCookie('getParams', http_build_query($_GET));
		
		$arBooks = Books::model()->with(['authors'])->findAll($criteria);

		foreach ($arBooks as $key => $row) {
			$arResult['arBooks'][$key] = $row->attributes;
			$arResult['arBooks'][$key]['authors'] = $row->authors->attributes;
		}
		
		$arResult['sort']  = $sort;
		$arResult['order'] = $order;
		$this->render('index', $arResult);
	}

	public function actionEdit()
	{		
		$this->render('index');
	}
	
}