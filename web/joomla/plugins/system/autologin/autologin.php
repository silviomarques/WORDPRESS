<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
* @version    2.5.0
* @copyright  Copyright (C) 2009 Andrea Parmeggiani. All rights reserved.
* @license    GNU/GPL, see LICENSE.php
* @autor      Andrea Parmeggiani www.textarea.it
* See COPYRIGHT.php for copyright notices and details.
*
*/

jimport('joomla.plugin.plugin');

class plgSystemAutologin extends JPlugin
{

  function onAfterInitialise()
  {
    $user=JRequest::getVar('user', null);
    $passw=JRequest::getVar('passw', null);

    if (!empty($user) && !empty($passw)) {
    
      if ($this->params->get('authmethod','1')==='0') {
        $result = $this->plainLogin();
      } else {
        $result = $this->encryptLogin();
      }
      
    }
    
    return;

  }
  
  /**
   *
   * PLAIN LOGIN
   *
   */
  function plainLogin() {
    // Get the application object.
    $app = JFactory::getApplication();

    // Get the log in credentials.
    $credentials = array();
    $credentials['username'] = JRequest::getVar('user', null);
    $credentials['password'] = JRequest::getVar('passw', null);
    
    $options = array();
    $result = $app->login($credentials, $options);

    // if OK go to redirect page
    if ($this->params->get('urlredirect', null)) {
     if (!JError::isError($result)) {
       $app->redirect($this->params->get('urlredirect', null));
     }
    }
    
    return;
  }

  /**
   *
   * ENCRYPT LOGIN
   *
   */
  function encryptLogin() {
    // Get the application object.
    $app = JFactory::getApplication();
    
    $db =& JFactory::getDBO();
    $query = 'SELECT `id`, `username`, `password`'
      . ' FROM `#__users`'
      . ' WHERE username=' . $db->Quote( JRequest::getVar('user', null) )
      . '   AND password=' . $db->Quote( JRequest::getVar('passw', null) )
      ;
    $db->setQuery( $query );
    $result = $db->loadObject();
    
    if($result) {
      JPluginHelper::importPlugin('user');
      
      $options = array();
      $options['action'] = 'core.login.site';
      
      $response->username = $result->username;
      $result = $app->triggerEvent('onUserLogin', array((array)$response, $options));
    }
    
    // if OK go to redirect page
    if ($this->params->get('urlredirect')) {
     if ($result) {
       $app->redirect($this->params->get('urlredirect'));
     }
    }

    return;
  }

}
