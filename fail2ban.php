<?php
/**
 * RoundCube Fail2Ban Plugin
 *
 * @version 1.0
 * @author Matt Rude [matt@mattrude.com]
 * @url
 */
class fail2ban extends rcube_plugin
{
  function init()
  {
    $this->add_hook('login_failed', array($this, 'log'));
  }

  function log($args)
  {
    $log_entry = 'failed login attempt - username=' .$args['user']. ' - ip-address=' .getenv('REMOTE_ADDR'); 
    syslog(LOG_WARNING, $log_entry);
  }

}

?>
