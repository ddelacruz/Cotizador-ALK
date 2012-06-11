<?php

/**
 * Description of ControlAcl
 *
 * @author ddelacruz
 */
class Default_Model_ControlAcl extends Zend_Acl{

    public function  __construct() {
        $this->addRole(new Zend_Acl_Role('guest'));
        $this->addRole(new Zend_Acl_Role('user'),'guest');
        $this->addRole(new Zend_Acl_Role('admin'),'user');

        $this->add(new Zend_Acl_Resource('default'))
             ->add(new Zend_Acl_Resource('default:auth'), 'default')
	     ->add(new Zend_Acl_Resource('default:index'), 'default')
	     ->add(new Zend_Acl_Resource('default:error'), 'default');

        $this->add(new Zend_Acl_Resource('member'));
        $this->add(new Zend_Acl_Resource('member:index','member'));
        
        $this->add(new Zend_Acl_Resource('admin'))
             ->add(new Zend_Acl_Resource('admin:user'),'admin')
             ->add(new Zend_Acl_Resource('admin:customer'),'admin')
             ->add(new Zend_Acl_Resource('admin:catalog'),'admin');

        

        $this->allow('guest','default:auth','login');
        $this->allow('guest','default:error','error');

        $this->allow('user', 'default:index', 'index');
        $this->allow('user', 'default:auth', 'logout');
        $this->allow('user', array('admin:catalog','admin:customer'), 'index');
        $this->deny('user', 'member:index', 'index');

        $this->allow('admin', 'admin:user', 'index');
        $this->allow('admin', 'member:index', 'index');
       





      //  $this->allow('user','admin:index','index');



       }
}
?>
