<?php

namespace Omnipay\Paydollar\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Paydollar\Helper;

/**
 * Class ExpressPurchaseResponse
 * @package Omnipay\Paydollar\Message
 */
class ExpressRefundResponse extends AbstractResponse
{

    public function isSuccessful()
    {
        return isset($this->data['resultCode']) && $this->data['resultCode'] == '0';
    }

    public function getMessage()
    {
        return isset($this->data['errMsg']) ? $this->data['errMsg'] : '';
    }
}
