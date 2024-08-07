<?php

namespace PS\Functions\Payment;

use Exception;
use InvalidArgumentException;

class Monobank{
    const CURRENCY_UAH = 980;

    private string $_token;
    private string $_api_url = 'https://api.monobank.ua/api/merchant/invoice/create';
    private string|null $_redirect_url = null;
    private string|null $_web_hook_url = null;
    private int $_validity = 86400;
    private array $_emails = [];

    /**
     * Constructor.
     *
     * @param string $token
     * @param string|null $api_url
     * @param string|null $redirect_url
     * @param string|null $callback_url
     * @param int|null $validity
     * @param array|null $emails
     *
     * @throws InvalidArgumentException
     */
    public function __construct( string  $token, ?string $api_url = null, ?string $redirect_url = null, ?string $callback_url = null, ?int    $validity = null, ?array  $emails = null )
    {
        if (empty($token)) {
            throw new InvalidArgumentException('Token cannot be empty');
        }

        $this->_token = $token;

        if ($api_url !== null) {
            $this->_api_url = $api_url;
        }

        $this->_redirect_url = $redirect_url;
        $this->_web_hook_url = $callback_url;
        $this->_validity = $validity ?? $this->_validity;
        $this->_emails = $emails ?? $this->_emails;
    }

    /**
     * @param array $params
     *
     * @return string
     */
    public function generatePaymentLink(array $params): string
    {
        $url = $this->_api_url;

        $headers = [
            'Content-Type: application/json',
            'Accept: application/json',
            'X-Token: ' . $this->_token,
        ];

        try {
            $requestData = $this->formattingData($params);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));

        $result = curl_exec($ch);

        if ($result === false) {
            $result = 'Error sending request: ' . curl_error($ch);
        }

        curl_close($ch);

        return $result;
    }

    /**
     * @param array $params
     *
     * @return array
     */
    private function formattingData(array $params): array
    {
        $this->validateParams($params);

        return [
            'amount' => $params['amount'] * 100,
            'ccy' => $params['currency'],
            'merchantPaymInfo' => [
                'reference' => (string)$params['order_id'],
                'destination' => $params['description'],
                'comment' => $params['description'],
                'customerEmails' => $this->_emails,
                'basketOrder' => [
                    [
                        'name' => $params['name'],
                        'qty' => 1,
                        'sum' => $params['amount'] * 100,
                        'unit' => 'шт.',
                        'code' => (string)$params['order_id'],
                    ],
                ],
            ],
            'redirectUrl' => $this->_redirect_url,
            'webHookUrl' => $this->_web_hook_url,
            'validity' => $this->_validity,
            'paymentType' => 'debit',
            'saveCardData' => [
                'saveCard' => false,
            ],
        ];
    }

    /**
     * @param array $params
     *
     * @return void
     */
    private function validateParams(array $params): void
    {
        $this->checkParam($params, 'amount');
        $this->checkParam($params, 'order_id');
        $this->checkParam($params, 'currency');
        $this->validateCurrency($params['currency']);
        $this->checkParam($params, 'name');
        $this->checkParam($params, 'description');
    }

    /**
     * @param array $params
     * @param string $paramName
     *
     * @throws InvalidArgumentException
     */
    private function checkParam(array $params, string $paramName): void
    {
        if (!isset($params[$paramName])) {
            throw new InvalidArgumentException("$paramName is missing");
        }
    }

    /**
     * @param int $currency
     *
     * @throws InvalidArgumentException
     */
    private function validateCurrency(int $currency): void
    {
        if ($currency !== self::CURRENCY_UAH) {
            throw new InvalidArgumentException('Invalid currency');
        }
    }
}