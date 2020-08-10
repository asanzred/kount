<?php

namespace Smallworldfs\Kount;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use Config;
use Log;
use Lang;
use Session;
use Exception;

use Smallworldfs\Kount\Libraries\Kount\Ris\Request\Inquiry;
use Smallworldfs\Kount\Libraries\Kount\Ris\Request\Update;
use Smallworldfs\Kount\Libraries\Kount\Models\KountResponse;
use Smallworldfs\Kount\Libraries\Kount\Ris\Data\CartItem;
use Smallworldfs\Kount\Libraries\Kount\Log\Factory\LogFactory;
use Smallworldfs\Kount\Libraries\Kount\Ris\IllegalArgumentException;

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

    public static function requestU($ktid,$transactionid,$user,$sessionid,$conn = null){
            
            $params = [];
            $mode  = Update::MODE_U;
            $kount = Kount::instance($mode);

            $params['ORDR'] = $transactionid;
            $params['TRAN'] = $ktid;
            $params['SESS'] = $sessionid;
            $params['MACK'] = 'N';

            

            foreach($params as $k => $v){
                $kount->setParm($k,$v);    
            }

        
            $response = $kount->getResponse();
            $r = new KountResponse($response->getAll());
            if(!is_null($conn)){
                $r->setConnection($conn);
            }

            $r->save();

            return $response->getAll();
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