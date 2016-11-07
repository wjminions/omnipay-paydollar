<?php

namespace Omnipay\Wjminions;

/**
 * Class LegacyMobileGateway
 * @package Omnipay\Wjminions
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
        return 'Wjminions_LegacyMobile';
    }


    public function purchase(array $parameters = array ())
    {
        return $this->createRequest('\Omnipay\Wjminions\Message\LegacyMobilePurchaseRequest', $parameters);
    }


    public function completePurchase(array $parameters = array ())
    {
        return $this->createRequest('\Omnipay\Wjminions\Message\LegacyCompletePurchaseRequest', $parameters);
    }
}
