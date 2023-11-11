<?php
declare(strict_types=1);

namespace MageBrains\Cryptomus\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Get api key
     *
     * @param int|null $storeId
     * @return string
     */
    public function getPaymentKey(?int $storeId = null): string
    {
        $apiKey = $this->scopeConfig->getValue(
            'payment/cryptomus/payment_key',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        return $apiKey;
    }

    /**
     * Get api merchant UUID
     *
     * @param int|null $storeId
     * @return string
     */
    public function getMerchantUUID(?int $storeId = null)
    {
        $apiIdentifier = $this->scopeConfig->getValue(
            'payment/cryptomus/merchant_uuid',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        return $apiIdentifier;
    }

    /**
     * Get api lifitime
     *
     * @param int|null $storeId
     * @return string
     */
    public function getLifetime(?int $storeId = null)
    {
        $apiIdentifier = $this->scopeConfig->getValue(
            'payment/cryptomus/lifetime',
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        return $apiIdentifier;
    }

    /**
     * Check api credentials
     *
     * @return bool
     */
    public function configIsValid()
    {
        return $this->getPaymentKey() && $this->getMerchantUUID();
    }
}
