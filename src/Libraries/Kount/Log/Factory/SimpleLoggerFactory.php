<?php

namespace Smallworldfs\Kount\Libraries\Kount\Log\Factory;

use Smallworldfs\Kount\Libraries\Kount\Log\Binding\SimpleLogger;
/**
 * @package Kount_Log
 * @subpackage Factory
 */

/**
 * A factory class that creates Kount_Log_Binding_SimpleLogger objects.
 *
 * @package Kount_Log
 * @subpackage Factory
 * @author Kount <custserv@kount.com>
 * @copyright 2012 Kount, Inc. All Rights Reserved.
 */
class SimpleLoggerFactory implements LoggerFactory {

  /**
   * Get a Simple Logger.
   * @param string $name Logger name
   * @return SimpleLogger
   */
  public static function getLogger ($name) {
    return new SimpleLogger($name);
  }

} // end Kount_Log_Factory_SimpleLoggerFactory
