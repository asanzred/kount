<?php

namespace Asanzred\Kount;

use Asanzred\Kount\Libraries\Kount\Log\Factory\LogFactory;
use Asanzred\Kount\Libraries\Kount\Ris\Request\Inquiry;
use Asanzred\Kount\Libraries\Kount\Ris\Request\Update;
use Asanzred\Kount\Libraries\Kount\Ris\Data\CartItem;
use Asanzred\Kount\Libraries\Kount\Ris\IllegalArgumentException;

use \User;
use \Lang;
use \CountryEquivalenceIso;
use \Session;
use \Config;

class Kount
{
    protected $inquiry = null;
    protected $mode    = null;
    /**
     * Create a new Kount Instance
     */
    public function __construct($mode = null)
    {
        $this->mode = $mode;
        switch($mode){
            case Inquiry::MODE_Q:
            case Inquiry::MODE_P:
            case Inquiry::MODE_W:
            case Inquiry::MODE_J:
                try{
                    $this->inquiry = new Inquiry();
                }catch(IllegalArgumentException $ex){
                    self::log($ex->getMessage());
                    return null;
                }
                break;
            case Update::MODE_U:
            case Update::MODE_X:
                try{
                    $this->inquiry = new Update();
                }catch(IllegalArgumentException $ex){
                    self::log($ex->getMessage());
                    return null;
                }
            break;
        }
    }

    public static function log($msg){
        $loggerFactory = LogFactory::getLoggerFactory();
        $logger = $loggerFactory->getLogger('KOUNT');
        $logger->error($msg);
    }

    public static function instance($mode)
    {
        $inquiry = new static($mode); 
        return $inquiry->inquiry;
    }

    public static function capturelogo($m,$s)
    { 
        return Config::get('kount.COMPANYSERVERURL')."/logo.htm?m=$m&s=$s";
    }

    public static function capturegif($m,$s)
    {
        return Config::get('kount.COMPANYSERVERURL')."/logo.htm?m=$m&s=$s";
    }

}