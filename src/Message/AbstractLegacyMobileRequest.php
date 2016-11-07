<?php

namespace Omnipay\Wjminions\Message;

/**
 * Class AbstractLegacyMobileRequest
 * @package Omnipay\Wjminions\Message
 */
abstract class AbstractLegacyMobileRequest extends AbstractLegacyRequest
{

    protected $endpoints = array(
        'sandbox'    => array(
            'trade' => 'http://222.66.233.198:8080/gateway/merchant/trade',
            'query' => 'http://222.66.233.198:8080/gateway/merchant/query',
        ),
        'production' => array(
            'trade' => 'https://mgate.Wjminions.com/gateway/merchant/trade',
            'query' => 'https://mgate.Wjminions.com/gateway/merchant/query',
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
