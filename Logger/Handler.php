<?php
declare(strict_types=1);

namespace Cryptomus\Payment\Logger;

use Magento\Framework\Logger\Handler\Base as BaseHandler;
use Monolog\Logger;

class Handler extends BaseHandler
{
    /**
     * Logging level
     * @var int
     */
    protected $loggerType = Logger::WARNING;

    /**
     * File name for custom logger
     * @var string
     */
    protected $fileName = '/var/log/cryptomus.log';
}
