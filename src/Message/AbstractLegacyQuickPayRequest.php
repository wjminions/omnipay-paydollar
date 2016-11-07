<?php

namespace Omnipay\Paydollar\Message;

/**
 * Class AbstractLegacyQuickPayRequest
 * @package Omnipay\Paydollar\Message
 */
abstract class AbstractLegacyQuickPayRequest extends AbstractLegacyRequest
{

    protected $endpoints = array(
        'sandbox'    => array(
            'front' => 'http://202.101.25.184/UpopWeb/api/Pay.action',
            'back'  => 'http://202.101.25.184/UpopWeb/api/BSPay.action',
            'query' => 'http://202.101.25.184/UpopWeb/api/Query.action',
        ),
        'staging'    => array(
            'front' => 'https://www.epay.lxdns.com/UpopWeb/api/Pay.action',
            'back'  => 'https://www.epay.lxdns.com/UpopWeb/api/BSPay.action',
            'query' => 'https://www.epay.lxdns.com/UpopWeb/api/Query.action',
        ),
        'production' => array(
            'front' => 'https://Paydollarsecure.com/api/Pay.action',
            'back'  => 'https://besvr.Paydollarsecure.com/api/BSPay.action',
            'query' => 'https://query.Paydollarsecure.com/api/Query.action',
        ),
    );
}
