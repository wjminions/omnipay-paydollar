<?php

namespace Omnipay\Paydollar\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Class ExpressResponse
 * @package Omnipay\Paydollar\Message
 */
class ExpressResponse extends AbstractResponse
{

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return isset($this->data['respCode']) && $this->data['respCode'] == '00';
    }
}
