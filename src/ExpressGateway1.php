<?php

namespace Omnipay\Paydollar;

use Omnipay\Common\AbstractGateway;

/**
 * Class ExpressGateway
 * @package Omnipay\Paydollar
 */
class ExpressGateway extends AbstractGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'Paydollar_Express';
    }


    public function getDefaultParameters()
    {
        return array (
            'currencyCode'   => '344',
        );
    }


    public function setReturnUrl($value)
    {
        return $this->setParameter('returnUrl', $value);
    }


    public function getReturnUrl()
    {
        return $this->getParameter('returnUrl');
    }


    public function setNotifyUrl($value)
    {
        return $this->setParameter('notifyUrl', $value);
    }


    public function getNotifyUrl()
    {
        return $this->getParameter('notifyUrl');
    }


    public function setMerId($value)
    {
        return $this->setParameter('merId', $value);
    }


    public function getMerId()
    {
        return $this->getParameter('merId');
    }


    public function setCurrencyCode($value)
    {
        return $this->setParameter('currencyCode', $value);
    }


    public function getCurrencyCode()
    {
        return $this->getParameter('currencyCode');
    }


    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\ExpressPurchaseRequest', $parameters);
    }


    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\ExpressCompletePurchaseRequest', $parameters);
    }


    public function query(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\ExpressQueryRequest', $parameters);
    }


    public function consumeUndo(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\ExpressConsumeUndoRequest', $parameters);
    }


    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\ExpressRefundRequest', $parameters);
    }


    public function fileTransfer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\ExpressFileTransferRequest', $parameters);
    }
}
