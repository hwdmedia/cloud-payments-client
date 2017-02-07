<?php

namespace CloudPayments\Exception;

class RequestException extends BaseException
{
    public function __construct($response)
    {
        parent::__construct(isset($response['Message']) ? $response['Message'] : $response);
    }
}