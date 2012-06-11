<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }
function preDispatch()
    {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
           $this->_redirect('/login');
        }
    }
    public function indexAction()
    {
            
       
    }

    
    


}

