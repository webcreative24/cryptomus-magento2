<?php
declare(strict_types=1);

namespace MageBrains\Cryptomus\Logger;

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
     * File name
     * @var string
     */
    protected $fileName = '/var/log/cryptomus.log';
}
