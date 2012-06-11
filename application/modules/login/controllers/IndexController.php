<?php

class Login_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $this->view->title = 'Login de Usuario';
        if(Zend_Auth::getInstance()->hasIdentity()){
            $this->_redirect('/');
        }

        $request = $this->getRequest();
        $form = new Login_Form_LoginForm();
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                $authAdapter = $this->getAuthAdapter();

                $username = $form->getValue('us_nick');
                $password = $form->getValue('us_clave');

                $authAdapter->setIdentity($username)
                            ->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                if($result->isValid()){
                    $identity = $authAdapter->getResultRowObject();

                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);

                    $this->_redirect('/');
                } else {
                    $this->view->errorMessage = "Nombre de Usuario o Contraseña invalida.";
                }
            }
        }


        $this->view->form = $form;

    }

    public function logoutAction()
    {
        

    }

private function getAuthAdapter() {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('usuario')
                    ->setIdentityColumn('us_nick')
                    ->setCredentialColumn('us_clave');

        return $authAdapter;
    }


}

