<?php

namespace Omnipay\Paydollar\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Paydollar\Helper;

/**
 * Class ClientPurchaseResponse
 * @package Omnipay\Paydollar\Message
 */
class ClientRefundResponse extends AbstractResponse
{
    public function isRedirect()
    {
        return false;
    }


    public function getRedirectMethod()
    {
        return 'POST';
    }


    public function getRedirectUrl()
    {
        return false;
    }


    public function getRedirectHtml()
    {
        return false;
    }


    public function getTransactionNo()
    {
        return isset($this->data['ref']) && $this->data['ref'] == '0';
    }


    public function isSuccessful()
    {
        return isset($this->data['resultCode']) && $this->data['resultCode'] == '0';
    }

    public function getMessage()
    {
        return isset($this->data['errMsg']) ? $this->data['errMsg'] : '';
    }
}
