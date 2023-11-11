<?php

declare(strict_types=1);

namespace MageBrains\Cryptomus\Model\Payment;

class Cryptomus extends \Magento\Payment\Model\Method\Adapter
{

    /**
     * @var string
     */
    protected $_code = "cryptomus";

    /**
     * @var bool
     */
    protected $_isOffline = true;
}
