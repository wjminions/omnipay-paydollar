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
            'currCode'   => '344',
            'mpsMode'    => 'NIL',
            'payType'    => 'N',
            'lang'       => 'C',
            'payMethod'  => 'ALL',
            'redirect'   => '5'
        );
    }


    public function setPayServerUrl($value)
    {
        return $this->setParameter('pay_server_url', $value);
    }


    public function getPayServerUrl()
    {
        return $this->getParameter('pay_server_url');
    }


    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }


    public function getAmount()
    {
        return $this->getParameter('amount');
    }


    public function setOrderRef($value)
    {
        return $this->setParameter('orderRef', $value);
    }


    public function getOrderRef()
    {
        return $this->getParameter('orderRef');
    }


    public function setRedirect($value)
    {
        return $this->setParameter('redirect', $value);
    }


    public function getRedirect()
    {
        return $this->getParameter('redirect');
    }


    public function setSuccessUrl($value)
    {
        return $this->setParameter('successUrl', $value);
    }


    public function getSuccessUrl()
    {
        return $this->getParameter('successUrl');
    }


    public function setFailUrl($value)
    {
        return $this->setParameter('failUrl', $value);
    }


    public function getFailUrl()
    {
        return $this->getParameter('failUrl');
    }


    public function setCancelUrl($value)
    {
        return $this->setParameter('cancelUrl', $value);
    }


    public function getCancelUrl()
    {
        return $this->getParameter('cancelUrl');
    }


    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }


    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }


    public function setMpsMode($value)
    {
        return $this->setParameter('mpsMode', $value);
    }


    public function getMpsMode()
    {
        return $this->getParameter('mpsMode');
    }


    public function setCurrCode($value)
    {
        return $this->setParameter('currCode', $value);
    }


    public function getCurrCode()
    {
        return $this->getParameter('currCode');
    }


    public function setPayType($value)
    {
        return $this->setParameter('payType', $value);
    }


    public function getPayType()
    {
        return $this->getParameter('payType');
    }


    public function setLang($value)
    {
        return $this->setParameter('lang', $value);
    }


    public function getLang()
    {
        return $this->getParameter('lang');
    }


    public function setPayMethod($value)
    {
        return $this->setParameter('payMethod', $value);
    }


    public function getPayMethod()
    {
        return $this->getParameter('payMethod');
    }


    public function setSecurity($value)
    {
        return $this->setParameter('security', $value);
    }


    public function getSecurity()
    {
        return $this->getParameter('security');
    }


    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\ExpressPurchaseRequest', $parameters);
    }


    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Paydollar\Message\ExpressCompletePurchaseRequest', $parameters);
    }
}
