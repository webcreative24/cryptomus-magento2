<?php
declare(strict_types=1);

namespace Cryptomus\Payment\Service;

use Cryptomus\Api\Client;
use Cryptomus\Payment\Model\Config;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\UrlInterface;
use Magento\Sales\Model\Order;
use Magento\Store\Model\StoreManagerInterface;

class Cryptomus
{
    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;

    /**
     * @var Config
     */
    private Config $config;

    /**
     * @var UrlInterface
     */
    private UrlInterface $urlBuilder;

    /**
     * @param StoreManagerInterface $storeManager
     * @param Config $config
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        Config                $config,
        UrlInterface          $urlBuilder
    ) {
        $this->storeManager = $storeManager;
        $this->config = $config;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Get payment provider class instance
     *
     * @return \Cryptomus\Api\Payment
     */
    private function get()
    {
        return Client::payment($this->config->getPaymentKey(), $this->config->getMerchantUUID());
    }

    /**
     * Create order in pyament gateway
     *
     * @param Order $order
     * @return mixed|null
     * @throws LocalizedException
     * @throws \Cryptomus\Api\RequestBuilderException
     */
    public function createOrder($order)
    {
        if (!$this->config->configIsValid()) {
            throw new LocalizedException(
                __('Payment config isn\'t valid.')
            );
        }
        $paymentInstance = $this->get();
        $result = $paymentInstance->create($this->getData($order));

        if (isset($result['url'])) {
            return $result['url'];
        }

        return null;
    }

    /**
     * Get data for payment request
     *
     * @param Order $order
     * @return array
     */
    private function getData($order)
    {
        return [
            'amount' => (string)round((float)$order->getGrandTotal(), 2),
            'currency' => $this->getCurrentCurrencyCode(),
            'order_id' => $order->getIncrementId(),
            'url_return' => $this->getDefaultSuccessPageUrl(),
            'url_callback' => $this->urlBuilder->getUrl('cryptomus/payment/callback'),
            'is_payment_multiple' => false,
            'lifetime' => $this->config->getLifetime()
        ];
    }

    /**
     * Get current store currency code
     *
     * @return string
     */
    private function getCurrentCurrencyCode()
    {
        return $this->storeManager->getStore()->getCurrentCurrencyCode();
    }

    /**
     * Get successe page url
     *
     * @return string
     */
    private function getDefaultSuccessPageUrl()
    {
        return $this->urlBuilder->getUrl('checkout/onepage/success/');
    }
}
