<?php

namespace Omnipay\Wjminions;

/**
 * Class LegacyQuickPayGateway
 * @package Omnipay\Wjminions
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
        return 'Wjminions_LegacyQuickPay';
    }


    public function purchase(array $parameters = array ())
    {
        return $this->createRequest('\Omnipay\Wjminions\Message\LegacyQuickPayPurchaseRequest', $parameters);
    }


    public function completePurchase(array $parameters = array ())
    {
        return $this->createRequest('\Omnipay\Wjminions\Message\LegacyCompletePurchaseRequest', $parameters);
    }
}
