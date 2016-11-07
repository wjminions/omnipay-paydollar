<?php

namespace Omnipay\Paydollar;

/**
 * Class LegacyQuickPayGateway
 * @package Omnipay\Paydollar
 */
class LegacyQuickPayGateway extends AbstractLegacyGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'Paydollar_LegacyQuickPay';
    }


    public function purchase(array $parameters = array ())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\LegacyQuickPayPurchaseRequest', $parameters);
    }


    public function completePurchase(array $parameters = array ())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\LegacyCompletePurchaseRequest', $parameters);
    }
}
