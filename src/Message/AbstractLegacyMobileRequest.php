<?php

namespace Omnipay\Paydollar\Message;

/**
 * Class AbstractLegacyMobileRequest
 * @package Omnipay\Paydollar\Message
 */
abstract class AbstractLegacyMobileRequest extends AbstractLegacyRequest
{

    protected $endpoints = array(
        'sandbox'    => array(
            'trade' => 'http://222.66.233.198:8080/gateway/merchant/trade',
            'query' => 'http://222.66.233.198:8080/gateway/merchant/query',
        ),
        'production' => array(
            'trade' => 'https://mgate.Paydollar.com/gateway/merchant/trade',
            'query' => 'https://mgate.Paydollar.com/gateway/merchant/query',
        ),
    );


    public function getOrderTimeout()
    {
        return $this->getParameter('orderTimeout');
    }


    public function setOrderTimeout($value)
    {
        return $this->setParameter('orderTimeout', $value);
    }
}
