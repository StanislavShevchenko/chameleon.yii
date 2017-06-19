<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class WebUser extends CWebUser {
    private $_model = null;
	
    function getRole() {
        if($user = $this->getModel()){
          return $user->userRole->name;
        }
    }
	
    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
          $this->_model = User::model()->findByPk($this->id);
        }
        return $this->_model;
    }   
}