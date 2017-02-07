<?php

namespace CloudPayments\Model;

class Transaction
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var integer
     */
    protected $currencyCode;

    /**
     * @var string
     */
    protected $invoiceId;

    /**
     * @var string
     */
    protected $accountId;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $authorizedAt;

    /**
     * @var \DateTime
     */
    protected $confirmedAt;

    /**
     * @var string
     */
    protected $authCode;

    /**
     * @var boolean
     */
    protected $testMode;

    /**
     * @var string
     */
    protected $ipAddress;

    /**
     * @var string
     */
    protected $ipCountry;

    /**
     * @var string
     */
    protected $ipCity;

    /**
     * @var string
     */
    protected $ipRegion;

    /**
     * @var string
     */
    protected $ipDistrict;

    /**
     * @var float
     */
    protected $ipLatitude;

    /**
     * @var float
     */
    protected $ipLongitude;

    /**
     * @var string
     */
    protected $cardFirstSix;

    /**
     * @var string
     */
    protected $cardLastFour;

    /**
     * @var integer
     */
    protected $cardExpiredMonth;

    /**
     * @var integer
     */
    protected $cardExpiredYear;

    /**
     * @var string
     */
    protected $cardType;

    /**
     * @var integer
     */
    protected $cardTypeCode;

    /**
     * @var string
     */
    protected $issuer;

    /**
     * @var string
     */
    protected $issuerBankCountry;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var integer
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $reason;

    /**
     * @var integer
     */
    protected $reasonCode;

    /**
     * @var string
     */
    protected $cardHolderMessage;

    /**
     * @var string
     */
    protected $cardHolderName;

    /**
     * @var string
     */
    protected $token;


    /**
     * @var string
     */
    protected $_rawResponse;



    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $value
     */
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $value
     */
    public function setAmount($value)
    {
        $this->amount = $value;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $value
     */
    public function setCurrency($value)
    {
        $this->currency = $value;
    }

    /**
     * @return integer
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param integer $value
     */
    public function setCurrencyCode($value)
    {
        $this->currencyCode = $value;
    }

    /**
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @param string $value
     */
    public function setInvoiceId($value)
    {
        $this->invoiceId = $value;
    }

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param string $value
     */
    public function setAccountId($value)
    {
        $this->accountId = $value;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $value
     */
    public function setEmail($value)
    {
        $this->email = $value;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $value
     */
    public function setDescription($value)
    {
        $this->description = $value;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $value
     */
    public function setData($value)
    {
        $this->data = $value;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $value
     */
    public function setCreatedAt($value)
    {
        $this->createdAt = $value;
    }

    /**
     * @return \DateTime
     */
    public function getAuthorizedAt()
    {
        return $this->authorizedAt;
    }

    /**
     * @param \DateTime $value
     */
    public function setAuthorizedAt($value)
    {
        $this->authorizedAt = $value;
    }

    /**
     * @return \DateTime
     */
    public function getConfirmedAt()
    {
        return $this->confirmedAt;
    }

    /**
     * @param \DateTime $value
     */
    public function setConfirmedAt($value)
    {
        $this->confirmedAt = $value;
    }

    /**
     * @return string
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @param string $value
     */
    public function setAuthCode($value)
    {
        $this->authCode = $value;
    }

    /**
     * @return boolean
     */
    public function isTestMode()
    {
        return $this->testMode;
    }

    /**
     * @param boolean $value
     */
    public function setTestMode($value)
    {
        $this->testMode = $value;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $value
     */
    public function setIpAddress($value)
    {
        $this->ipAddress = $value;
    }

    /**
     * @return string
     */
    public function getIpCountry()
    {
        return $this->ipCountry;
    }

    /**
     * @param string $value
     */
    public function setIpCountry($value)
    {
        $this->ipCountry = $value;
    }

    /**
     * @return string
     */
    public function getIpCity()
    {
        return $this->ipCity;
    }

    /**
     * @param string $value
     */
    public function setIpCity($value)
    {
        $this->ipCity = $value;
    }

    /**
     * @return string
     */
    public function getIpRegion()
    {
        return $this->ipRegion;
    }

    /**
     * @param string $value
     */
    public function setIpRegion($value)
    {
        $this->ipRegion = $value;
    }

    /**
     * @return string
     */
    public function getIpDistrict()
    {
        return $this->ipDistrict;
    }

    /**
     * @param string $value
     */
    public function setIpDistrict($value)
    {
        $this->ipDistrict = $value;
    }

    /**
     * @return float
     */
    public function getIpLatitude()
    {
        return $this->ipLatitude;
    }

    /**
     * @param float $value
     */
    public function setIpLatitude($value)
    {
        $this->ipLatitude = $value;
    }

    /**
     * @return float
     */
    public function getIpLongitude()
    {
        return $this->ipLongitude;
    }

    /**
     * @param float $value
     */
    public function setIpLongitude($value)
    {
        $this->ipLongitude = $value;
    }

    /**
     * @return string
     */
    public function getCardFirstSix()
    {
        return $this->cardFirstSix;
    }

    /**
     * @param string $value
     */
    public function setCardFirstSix($value)
    {
        $this->cardFirstSix = $value;
    }

    /**
     * @return string
     */
    public function getCardLastFour()
    {
        return $this->cardLastFour;
    }

    /**
     * @param string $value
     */
    public function setCardLastFour($value)
    {
        $this->cardLastFour = $value;
    }

    /**
     * @return integer
     */
    public function getCardExpiredMonth()
    {
        return $this->cardExpiredMonth;
    }

    /**
     * @param integer $value
     */
    public function setCardExpiredMonth($value)
    {
        $this->cardExpiredMonth = $value;
    }

    /**
     * @return integer
     */
    public function getCardExpiredYear()
    {
        return $this->cardExpiredYear;
    }

    /**
     * @param integer $value
     */
    public function setCardExpiredYear($value)
    {
        $this->cardExpiredYear = $value;
    }

    /**
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param string $value
     */
    public function setCardType($value)
    {
        $this->cardType = $value;
    }

    /**
     * @return integer
     */
    public function getCardTypeCode()
    {
        return $this->cardTypeCode;
    }

    /**
     * @param integer $value
     */
    public function setCardTypeCode($value)
    {
        $this->cardTypeCode = $value;
    }

    /**
     * @return string
     */
    public function getIssuer()
    {
        return $this->issuer;
    }

    /**
     * @param string $value
     */
    public function setIssuer($value)
    {
        $this->issuer = $value;
    }

    /**
     * @return string
     */
    public function getIssuerBankCountry()
    {
        return $this->issuerBankCountry;
    }

    /**
     * @param string $value
     */
    public function setIssuerBankCountry($value)
    {
        $this->issuerBankCountry = $value;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $value
     */
    public function setStatus($value)
    {
        $this->status = $value;
    }

    /**
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param integer $value
     */
    public function setStatusCode($value)
    {
        $this->statusCode = $value;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $value
     */
    public function setReason($value)
    {
        $this->reason = $value;
    }

    /**
     * @return integer
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param integer $value
     */
    public function setReasonCode($value)
    {
        $this->reasonCode = $value;
    }

    /**
     * @return string
     */
    public function getCardHolderMessage()
    {
        return $this->cardHolderMessage;
    }

    /**
     * @param string $value
     */
    public function setCardHolderMessage($value)
    {
        $this->cardHolderMessage = $value;
    }

    /**
     * @return string
     */
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * @param string $value
     */
    public function setCardHolderName($value)
    {
        $this->cardHolderName = $value;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $value
     */
    public function setToken($value)
    {
        $this->token = $value;
    }

    /**
     * @return string
     */
    public function getRawResponse() {
        return $this->_rawResponse;
    }

    /**
     * @param string $value
     */
    public function setRawResponse($value) {
        $this->_rawResponse = $value;
    }


    /**
     * @param array $params
     * @param array|null $params
     * @return Transaction
     */
    public static function fromArray($params, $response = null)
    {
        $transaction = new Transaction();

        $transaction->setId($params['TransactionId']);
        $transaction->setAmount($params['Amount']);
        $transaction->setCurrency($params['Currency']);
        $transaction->setCurrencyCode($params['CurrencyCode']);
        $transaction->setCardFirstSix($params['CardFirstSix']);
        $transaction->setCardLastFour($params['CardLastFour']);
        $transaction->setCardExpiredMonth(explode('/', $params['CardExpDate'])[0]);
        $transaction->setCardExpiredYear(substr(date('Y'), 0, 2) . explode('/', $params['CardExpDate'])[1]);

        if (isset($params['InvoiceId'])) {
            $transaction->setInvoiceId($params['InvoiceId']);
        }

        if (isset($params['AccountId'])) {
            $transaction->setAccountId(['AccountId']);
        }

        if (isset($params['Email'])) {
            $transaction->setEmail($params['Email']);
        }

        if (isset($params['Description'])) {
            $transaction->setDescription($params['Description']);
        }

        if (isset($params['JsonData'])) {
            $transaction->setData((array)$params['JsonData']);
        }

        if (isset($params['CreatedDateIso'])) {
            $transaction->setCreatedAt(new \DateTime($params['CreatedDateIso']));
        }

        if (isset($params['AuthDateIso'])) {
            $transaction->setAuthorizedAt(new \DateTime($params['AuthDateIso']));
        }

        if (isset($params['ConfirmDateIso'])) {
            $transaction->setConfirmedAt(new \DateTime($params['ConfirmDateIso']));
        }

        if (isset($params['AuthCode'])) {
            $transaction->setAuthCode($params['AuthCode']);
        }

        if (isset($params['TestMode'])) {
            $transaction->setTestMode($params['TestMode']);
        }

        if (isset($params['IpAddress'])) {
            $transaction->setIpAddress($params['IpAddress']);
        }

        if (isset($params['IpCountry'])) {
            $transaction->setIpCountry($params['IpCountry']);
        }

        if (isset($params['IpCity'])) {
            $transaction->setIpCity($params['IpCity']);
        }

        if (isset($params['IpRegion'])) {
            $transaction->setIpRegion($params['IpRegion']);
        }

        if (isset($params['IpDistrict'])) {
            $transaction->setIpDistrict($params['IpDistrict']);
        }

        if (isset($params['IpLatitude'])) {
            $transaction->setIpLatitude($params['IpLatitude']);
        }

        if (isset($params['IpLongitude'])) {
            $transaction->setIpLongitude($params['IpLongitude']);
        }

        if (isset($params['CardType'])) {
            $transaction->setCardType(strtolower($params['CardType']));
        }

        if (isset($params['CardTypeCode'])) {
            $transaction->setCardTypeCode($params['CardTypeCode']);
        }

        if (isset($params['Issuer'])) {
            $transaction->setIssuer($params['Issuer']);
        }

        if (isset($params['IssuerBankCountry'])) {
            $transaction->setIssuerBankCountry($params['IssuerBankCountry']);
        }

        if (isset($params['Status'])) {
            $transaction->setStatus(strtolower($params['Status']));
        }

        if (isset($params['StatusCode'])) {
            $transaction->setStatusCode($params['StatusCode']);
        }

        if (isset($params['Reason'])) {
            $transaction->setReason($params['Reason']);
        }

        if (isset($params['ReasonCode'])) {
            $transaction->setReasonCode($params['ReasonCode']);
        }

        if (isset($params['CardHolderMessage'])) {
            $transaction->setCardHolderMessage($params['CardHolderMessage']);
        }

        if (isset($params['Name'])) {
            $transaction->setCardHolderName($params['Name']);
        }

        if (isset($params['Token'])) {
            $transaction->setToken($params['Token']);
        }

        if ($response != null) {
            $transaction->setRawResponse(json_encode($response));
        }

        return $transaction;
    }
}