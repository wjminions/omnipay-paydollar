<?php

namespace Omnipay\Paydollar\Message;

use Omnipay\Common\Message\ResponseInterface;
use Omnipay\Paydollar\Helper;

/**
 * Class ExpressQueryRequest
 * @package Omnipay\Paydollar\Message
 */
class ExpressQueryRequest extends AbstractExpressRequest
{

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $this->validate('certPath', 'certPassword', 'orderId', 'txnTime', 'txnAmt');

        $data = array(
            'merchantId'     => $this->getMerId(),
            'amount'         => $this->getAmount(),
            'orderRef'       => $this->getOrderRef(),
            'currCode'       => $this->getCurrCode(),
            'mpsMode'        => $this->getMpsMode(),
            'successUrl'     => $this->getSuccessUrl(),
            'failUrl'        => $this->getFailUrl(),
            'cancelUrl'      => $this->getCancelUrl(),
            'payType'        => $this->getPayType(),
            'lang'           => $this->getLanguage(),
            'payMethod'      => $this->getPayMethod(),
            'redirect'       => $this->getRedirect(),
        );

        $data = Helper::filterData($data);

        return $data;
    }


    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     *
     * @return ResponseInterface
     */
    public function sendData($data)
    {

        $data = $this->httpRequest('query', $data);

        return $this->response = new ExpressResponse($this, $data);
    }
}
