<?php

namespace CloudPayments;

use CloudPayments\Exception\RequestException;

class Manager {
    /**
     * @var string
     */
    protected $url = 'https://api.cloudpayments.ru';

    /**
     * @var string
     */
    protected $locale = 'en-US';

    /**
     * @var string
     */
    protected $publicKey;

    /**
     * @var string
     */
    protected $privateKey;

    /**
     * @param $publicKey
     * @param $privateKey
     */
    public function __construct($publicKey, $privateKey) {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @return array
     * @throws RequestException
     */
    protected function sendRequest($endpoint, array $params = []) {
        $params['CultureName'] = $this->locale;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url . $endpoint);
        curl_setopt($curl, CURLOPT_USERPWD, sprintf('%s:%s', $this->publicKey, $this->privateKey));
        curl_setopt($curl, CURLOPT_TIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new Exception\RequestException(curl_error($curl));
        }
        return (array)json_decode($result, true);
    }

    /**
     * @return string
     */
    public function getLocale() {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale) {
        $this->locale = $locale;
    }

    /**
     * @throws Exception\RequestException
     */
    public function test() {
        try {
            $response = $this->sendRequest('/test');
        } catch (RequestException $e) {
            throw $e;
        }
        if (!$response['Success']) {
            throw new Exception\RequestException($response);
        }
    }

    /**
     * @param $amount
     * @param $currency
     * @param $ipAddress
     * @param $cardHolderName
     * @param $cryptogram
     * @param array $params
     * @param bool $requireConfirmation
     * @return Model\Required3DS|Model\Transaction
     * @throws Exception\PaymentException
     * @throws Exception\RequestException
     */
    public function chargeCard($amount, $currency, $ipAddress, $cardHolderName, $cryptogram, $params = [], $requireConfirmation = false) {
        $endpoint = $requireConfirmation ? '/payments/cards/auth' : '/payments/cards/charge';
        $defaultParams = [
            'Amount' => $amount,
            'Currency' => $currency,
            'IpAddress' => $ipAddress,
            'Name' => $cardHolderName,
            'CardCryptogramPacket' => $cryptogram
        ];

        try {
            $response = $this->sendRequest($endpoint, array_merge($defaultParams, $params));
        } catch (RequestException $e) {
            throw $e;
        }

        if ($response['Success']) {
            return Model\Transaction::fromArray($response['Model']);
        }

        if ($response['Message']) {
            throw new Exception\RequestException($response);
        }

        if (isset($response['Model']['ReasonCode']) && $response['Model']['ReasonCode'] !== 0) {
            throw new Exception\PaymentException($response);
        }

        return Model\Required3DS::fromArray($response['Model']);
    }

    /**
     * @param $amount
     * @param $currency
     * @param $accountId
     * @param $token
     * @param array $params
     * @param bool $requireConfirmation
     * @return Model\Required3DS|Model\Transaction
     * @throws Exception\PaymentException
     * @throws Exception\RequestException
     */
    public function chargeToken($amount, $currency, $accountId, $token, $params = [], $requireConfirmation = false) {
        $endpoint = $requireConfirmation ? '/payments/tokens/auth' : '/payments/tokens/charge';
        $defaultParams = [
            'Amount' => $amount,
            'Currency' => $currency,
            'AccountId' => $accountId,
            'Token' => $token,
        ];

        try {
            $response = $this->sendRequest($endpoint, array_merge($defaultParams, $params));
        } catch (RequestException $e) {
            throw $e;
        }

        if ($response['Success']) {
            return Model\Transaction::fromArray($response['Model']);
        }

        if ($response['Message']) {
            throw new Exception\RequestException($response);
        }

        if (isset($response['Model']['ReasonCode']) && $response['Model']['ReasonCode'] !== 0) {
            throw new Exception\PaymentException($response);
        }

        return Model\Required3DS::fromArray($response['Model']);
    }

    /**
     * @param $transactionId
     * @param $token
     * @param $withResponseDump
     * @return Model\Transaction
     * @throws Exception\PaymentException
     * @throws Exception\RequestException
     */
    public function confirm3DS($transactionId, $token, $withResponseDump = false) {
        try {
            $response = $this->sendRequest('/payments/cards/post3ds', [
                'TransactionId' => $transactionId,
                'PaRes' => $token
            ]);
        } catch (RequestException $e) {
            throw $e;
        }

        if ($response['Message']) {
            throw new Exception\RequestException($response);
        }

        if (isset($response['Model']['ReasonCode']) && $response['Model']['ReasonCode'] !== 0) {
            throw new Exception\PaymentException($response);
        }

        return $withResponseDump ? Model\Transaction::fromArray($response['Model'], $response) : Model\Transaction::fromArray($response['Model']);
    }

    /**
     * @param $transactionId
     * @param $amount
     * @throws Exception\RequestException
     */
    public function confirmPayment($transactionId, $amount) {
        try {
            $response = $this->sendRequest('/payments/confirm', [
                'TransactionId' => $transactionId,
                'Amount' => $amount
            ]);
        } catch (RequestException $e) {
            throw $e;
        }

        if (!$response['Success']) {
            throw new Exception\RequestException($response);
        }
    }

    /**
     * @param $transactionId
     * @throws Exception\RequestException
     */
    public function voidPayment($transactionId) {
        try {
            $response = $this->sendRequest('/payments/void', [
                'TransactionId' => $transactionId
            ]);
        } catch (RequestException $e) {
            throw $e;
        }

        if (!$response['Success']) {
            throw new Exception\RequestException($response);
        }
    }

    /**
     * @param $transactionId
     * @param $amount
     * @throws Exception\RequestException
     */
    public function refundPayment($transactionId, $amount) {
        try {
            $response = $this->sendRequest('/payments/refund', [
                'TransactionId' => $transactionId,
                'Amount' => $amount
            ]);
        } catch (RequestException $e) {
            throw $e;
        }

        if (!$response['Success']) {
            throw new Exception\RequestException($response);
        }
    }

    /**
     * @param $invoiceId
     * @return Model\Transaction
     * @throws Exception\RequestException
     */
    public function findPayment($invoiceId) {
        try {
            $response = $this->sendRequest('/payments/find', [
                'InvoiceId' => $invoiceId
            ]);
        } catch (RequestException $e) {
            throw $e;
        }

        if (!$response['Success']) {
            throw new Exception\RequestException($response);
        }

        return Model\Transaction::fromArray($response['Model']);
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setUrl($value) {
        $this->url = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublicKey() {
        return $this->publicKey;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPublicKey($value) {
        $this->publicKey = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateKey() {
        return $this->privateKey;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPrivateKey($value) {
        $this->privateKey = $value;

        return $this;
    }
}