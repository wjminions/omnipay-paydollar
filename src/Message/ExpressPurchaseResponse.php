<?php

namespace Omnipay\Paydollar\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Paydollar\Helper;

/**
 * Class ExpressPurchaseResponse
 * @package Omnipay\Paydollar\Message
 */
class ExpressPurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{

    public function isSuccessful()
    {
        return true;
    }


    public function isRedirect()
    {
        return true;
    }


    public function getRedirectUrl()
    {
        return $this->getRequest()->getEndpoint('front');
    }


    public function getRedirectMethod()
    {
        return 'POST';
    }


    public function getRedirectData()
    {
        return $this->data;
    }


    public function getRedirectHtml()
    {
        $action = $this->getRequest()->getEndpoint('front');
        $fields = $this->getFormFields();
        $method = $this->getRedirectMethod();

        $html = <<<eot
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>跳转中...</title>
</head>
<body  onload="javascript:document.pay_form.submit();">
    <form id="pay_form" name="pay_form" action="{$action}" method="{$method}">
        {$fields}
    </form>
</body>
</html>
eot;

        return $html;
    }


    public function getFormFields()
    {
        $html = '';
        foreach ($this->data as $key => $value) {
            $html .= "<input type='hidden' name='{$key}' value='{$value}'/>\n";
        }

        return $html;
    }


    public function getTradeNo()
    {
        $endpoint = $this->getRequest()->getEndpoint('app');

        $result = Helper::sendHttpRequest($endpoint, $this->data);

        parse_str($result, $data);

        if (is_array($data) && isset($data['tn'])) {
            return $data['tn'];
        } else {
            return null;
        }
    }
}
