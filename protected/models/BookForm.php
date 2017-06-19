<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class BookForm extends CFormModel
{
	public $name;
	public $id;
	public $date;
	public $preview;
	public $author_id;


	public function rules()
	{
		return array(
			array('name, author_id', 'required'),
			array('name', 'length', 'max'=>250),
			array('date', 'length', 'min'=>10, 'max'=>10),
			array('preview', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true),
			array('author_id, id', 'numerical', 'integerOnly' => true),
//			array('name', 'newBook'),
		);
		
	}
	
	public function newBook()
	{
		if($this->id > 0){
			$criteria=new CDbCriteria;
			$criteria->condition='name LIKI :name';
			$criteria->params=array(':name' => $this->name);
			$Book = Books::model()->find($criteria);
		}
		return true;
	}
	
	public function save(){
		
		if(is_object($this->preview)){
			$path = 'upload/' . time() . '_' . $this->preview->getName();
			if($this->preview->saveAs($path)){
				$this->preview = $path;
			}			
		}								
		$this->date = strtotime($this->attributes['date']);
		
		if($this->id > 0)
			$books = Books::model()->findByPk ($this->id);
		else
			$books = new Books();

		$this->preview = (empty($this->attributes['preview'])) ? $books->attributes['preview'] : $this->attributes['preview'];
		$books->attributes = $this->attributes;
		
		if(!$books->save()){
			$this->errors = $books->getErrors();
			return false;
		}
		return true;
	}

}
