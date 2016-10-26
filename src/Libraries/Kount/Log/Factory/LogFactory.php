<?php

namespace Asanzred\Kount\Libraries\Kount\Log\Factory;

use Asanzred\Kount\Libraries\Kount\Util\ConfigFileReader;

/**
 * @package Kount_Log
 * @subpackage Factory
 */

/**
 * A factory class for creating Kount_Log_Factory_LoggerFactory objects.
 *
 * @package Kount_Log
 * @subpackage Factory
 * @author Kount <custserv@kount.com>
 * @copyright 2012 Kount, Inc. All Rights Reserved.
 */
class LogFactory {

  /**
   * NOP logger configuration setting name.
   * @var string
   */
  const NOP_LOGGER = 'NOP';

  /**
   * Simple logger configuration setting name.
   * @var string
   */
  const SIMPLE_LOGGER = 'SIMPLE';

  /**
   * Logger factory.
   * @var Kount_Log_Factory_LoggerFactory
   */
  protected static $loggerFactory = null;

  /**
   * Get the logger factory to be used.
   * @return Kount_Log_Factory_LoggerFactory
   */
  public static function getLoggerFactory () {

    if (self::$loggerFactory == null) {
      $configReader = ConfigFileReader::instance();
      $logger = $configReader->getConfigSetting('LOGGER');

      if ($logger == self::NOP_LOGGER) {
        self::$loggerFactory = new NopLoggerFactory();
      } else if ($logger == self::SIMPLE_LOGGER) {
        self::$loggerFactory = new SimpleLoggerFactory();
      } else {
        throw new Exception("Unknown logger [{$logger}] defined in setting " .
            "file [" . ConfigFileReader::SETTINGS_FILE . "]");
      }

    }

    return self::$loggerFactory;
  }

  /**
   * Set the logger factory to be used.
   * @param Kount_Log_Factory_LoggerFactory $factory The logger factory to use
   * @return void
   */
  public static function setLoggerFactory ($factory) {
    self::$loggerFactory = $factory;
  }

} // end Kount_Log_Factory_LogFactory
