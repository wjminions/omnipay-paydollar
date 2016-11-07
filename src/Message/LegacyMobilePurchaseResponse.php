<?php

namespace Omnipay\Paydollar\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class LegacyMobilePurchaseResponse
 * @package Omnipay\Paydollar\Message
 */
class LegacyMobilePurchaseResponse extends AbstractResponse implements ResponseInterface
{

    public function isSuccessful()
    {
        return true;
    }


    public function isRedirect()
    {
        return false;
    }


    public function getRedirectData()
    {
        return $this->data;
    }


    public function getTradeNo()
    {
        if (isset($this->data['tn'])) {
            return $this->data['tn'];
        } else {
            return null;
        }
    }
}
