<?php

namespace Smallworldfs\Kount\Libraries\Kount\Log\Factory;

use Smallworldfs\Kount\Libraries\Kount\Log\Binding\NopLogger;
/**
 * @package Kount_Log
 * @subpackage Factory
 */

/**
 * A factory class that creates Kount_Log_Binding_NopLogger objects.
 *
 * @package Kount_Log
 * @subpackage Factory
 * @author Kount <custserv@kount.com>
 * @copyright 2012 Kount, Inc. All Rights Reserved.
 */
class NopLoggerFactory implements LoggerFactory {

  /**
   * Get a Nop Logger.
   * @param string $name Logger name
   * @return Kount_Log_Binding_NopLogger
   */
  public static function getLogger ($name) {
    return new NopLogger($name);
  }

} // end Kount_Log_Factory_NopLoggerFactory
