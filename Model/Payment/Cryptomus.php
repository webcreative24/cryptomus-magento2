<?php

declare(strict_types=1);

namespace Cryptomus\Payment\Model\Payment;

class Cryptomus extends \Magento\Payment\Model\Method\AbstractMethod
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
