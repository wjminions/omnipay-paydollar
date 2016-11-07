<?php

namespace Omnipay\Paydollar;

/**
 * Class LegacyMobileGateway
 * @package Omnipay\Paydollar
 */
class LegacyMobileGateway extends AbstractLegacyGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'Paydollar_LegacyMobile';
    }


    public function purchase(array $parameters = array ())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\LegacyMobilePurchaseRequest', $parameters);
    }


    public function completePurchase(array $parameters = array ())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\LegacyCompletePurchaseRequest', $parameters);
    }
}
