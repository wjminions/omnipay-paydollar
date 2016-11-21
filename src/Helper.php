<?php
namespace Omnipay\Paydollar;

/**
 * Class Helper
 * @package Omnipay\Paydollar
 */
class Helper
{
    public static function verify($data, $security)
    {
        if(isset( $data ['secureHash'] )){
            $secureHash = $data ['secureHash'];
        }
        $secureHashSecret = trim ( $security );
        if (isset ( $secureHash ) && $secureHash && $secureHashSecret) {
            $secureHashs = explode ( ',', $secureHash );
            while ( list ( $key, $value ) = each ( $secureHashs ) ) {
                $verifyResult = self::verifyPaymentDatafeed (
                    $data['src'],
                    $data['prc'],
                    $data['successcode'],
                    $data['ref'],
                    $data['payRef'],
                    $data['cur'],
                    $data['amt'],
                    $data['payerAuth'],
                    $secureHashSecret,
                    $value
                );
            }
            return $verifyResult;
        }
    }

    protected static function verifyPaymentDatafeed($src, $prc, $successCode, $merchantReferenceNumber, $paydollarReferenceNumber, $currencyCode, $amount, $payerAuthenticationStatus, $secureHashSecret, $secureHash) {

        $buffer = $src . '|' . $prc . '|' . $successCode . '|' . $merchantReferenceNumber . '|' . $paydollarReferenceNumber . '|' . $currencyCode . '|' . $amount . '|' . $payerAuthenticationStatus . '|' . $secureHashSecret;

        $verifyData = sha1($buffer);

        if ($secureHash == $verifyData) {
            return true;
        }

        return false;

    }


    public static function getParamsSignatureWithSecurity($data, $security)
    {
        $secureHashSecret = trim ( $security );
        if ($secureHashSecret) {
            $secureHash = self::generatePaymentSecureHash (
                $data['merchantId'],
                $data['orderRef'],
                $data['currCode'],
                $data['amount'],
                $data['payType'],
                $secureHashSecret
            );

            return $secureHash;
        } else {
            return '';
        }
    }

    protected static function generatePaymentSecureHash($merchantId, $merchantReferenceNumber, $currencyCode, $amount, $paymentType, $secureHashSecret) {

        $buffer = $merchantId . '|' . $merchantReferenceNumber . '|' . $currencyCode . '|' . $amount . '|' . $paymentType . '|' . $secureHashSecret;
        //echo $buffer;
        return sha1($buffer);

    }


    public static function sendHttpRequest($url, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-type:application/x-www-form-urlencoded;charset=UTF-8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }


    public static function filterData($data)
    {
        $data = array_filter(
            $data,
            function ($v) {
                return $v !== '';
            }
        );

        return $data;
    }
}
