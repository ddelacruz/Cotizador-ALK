<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

public function _initAutoload() {

        $autoloader = new Zend_Application_Module_Autoloader(array(
                                'namespace' => 'Default',
                                'basePath' => dirname(__FILE__) . '/modules/default'

        ));
//        if(Zend_Auth::getInstance()->hasIdentity()) {
//			Zend_Registry::set('rol', Zend_Auth::getInstance()->getStorage()->read()->us_rol);
//		} else {
//			Zend_Registry::set('rol', 'guest');
//		}
//
//        $this->_acl = new Default_Model_ControlAcl;
//        $this->_auth = Zend_Auth::getInstance();
//
//        $fc = Zend_Controller_Front::getInstance();
//        $fc->registerPlugin(new Default_Plugin_AccessCheck($this->_acl));

       

        return $autoloader;
    }

    function _initViewHelpers() {
		$this->bootstrap('layout');
		$layout = $this->getResource('layout');
		$view = $layout->getView();

		$view->setHelperPath(APPLICATION_PATH.'/helpers', '');

		$view->doctype('HTML4_STRICT');
		$view->headMeta()->appendHttpEquiv('Content-type', 'text/html;charset=utf-8, encoding=utf-8')
						->appendName('description', 'Using view helpers in Zend_view');

		$view->headTitle()->setSeparator(' - ')
			 ->headTitle('JG3 Construcciones SAC');

		

		
	}

        protected function _initView()
    {
        $view = new Zend_View();
        // más inicialización...

        return $view;
    }

        protected function _initPlugins(){
		$this->bootstrap('frontController');

		$plugin = new My_LayoutPlugin();
                $this->frontController->registerPlugin($plugin);
               
	}

   
      protected function _initResourceAutoloader()
   
      {
   
            $resourceLoader = new Zend_Application_Module_Autoloader(array(
   			         'basePath' => dirname(__FILE__) . '/modules/admin',
 				 'namespace' => 'Admin',
                                 
                ));
   
         
             return $resourceLoader;
   
      }

      

      protected function _initNavigation()
        {
       $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $config = new Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');

                $container = new Zend_Navigation($config);

                $view->navigation($container);


        }


}

