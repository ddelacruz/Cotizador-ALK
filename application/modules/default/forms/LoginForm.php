<?php

class Default_Form_LoginForm extends Zend_Form
{
   	public function __construct($option=null)
           {
            parent::__construct($option);
        

         $this->setName('login');
         $username    =    $this->CreateElement('text','us_nick')
                   ->setLabel('Usuario')
                   ->setAttrib('size',15)
                   ->setRequired(true)
                   ->addFilter('StripTags')
                          ->addFilter('StringTrim')
                          ->addValidators(array(
                              array('NotEmpty', true, array('messages' =>
                                  array(Zend_Validate_NotEmpty::IS_EMPTY => 'Ingrese Nombre de Usuario'))
                              ),
                              array('StringLength', false, array('messages' =>
                                  array(Zend_Validate_StringLength::TOO_SHORT => 'Nombre muy corto',
                                            Zend_Validate_StringLength::TOO_LONG => 'Nombre muy largo'),
                                  'min' => 4,
                                  'max' => 15
                              )
                          )));

       $username->setDecorators(array(

                 'ViewHelper',
				 array('Description',array('tag'=>'','escape'=>false)),
 				'Errors',
				 array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				 array('Label', array('tag' => 'td')),
				 array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
       ));
  	  $password=$this->CreateElement('password','us_clave')
  	  				 ->setLabel('Password')
  	  				 ->setAttrib('size',15)
  	  				 ->setRequired(true)
                                         ->addFilter('StripTags')
                          ->addFilter('StringTrim')
                          ->addValidators(array(
                              array('NotEmpty', true, array('messages' =>
                                  array(Zend_Validate_NotEmpty::IS_EMPTY => 'Ingrese Password'))
                              )));

	  $password->setDecorators(array(
	  			'ViewHelper',
	  			array('Description',array('tag'=>'','escape'=>false)),
	  			'Errors',
	  			array(array('data'=>'HtmlTag'), array('tag' => 'td')),
	  			array('Label', array('tag' => 'td')),
	  			array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
	  			));


       $login=$this->CreateElement('submit','login')
       			   ->setLabel('Entrar');

       $login->setDecorators(array(
       			'ViewHelper',
       			'Description',
       			'Errors', array(array('data'=>'HtmlTag'), array('tag' => 'td','colspan'=>'2','align'=>'center')),
       			 array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
       			 ));


       $this->addElements(array(
       				 $username,
       				 $password,
       				 $login
       		));

      
       $this->setDecorators(array(
       		'FormElements',
       		array(array('data'=>'HtmlTag'),array('tag'=>'table')),
       		'Form'
       		));

	}

}


