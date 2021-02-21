<?php

namespace App\Actions;

use GuzzleHttp\Client;

class ReCaptchaAction
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $endpoint;

    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->setKey();
        $this->setEndpoint();
        $this->setClient();
    }

    /**
     * @return $this
     */
    public function setKey(): ReCaptchaAction
    {
        $this->key = config('services.google.recaptcha_secret');

        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return $this
     */
    public function setEndpoint(): ReCaptchaAction
    {
        $this->endpoint = 'https://google.com/recaptcha/api/';

        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @return $this
     */
    public function setClient(): ReCaptchaAction
    {
        $this->client = new Client([
            'base_uri' => $this->getEndpoint(),
        ]);

        return $this;
    }

    /**
     * @return Client
     */
    public function getClient(): string
    {
        return $this->client;
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verify(): array
    {
        $params = $this->requestParams();
        $response = $this->getClient()->post('siteverify', [
            'query' => $params
        ]);

        $data = json_decode($response->getBody(), true);

        if (!is_array($data)) {
            $data = [];
        }

        return $data;
    }

    /**
     * @param string $value
     * @return array
     */
    private function requestParams(string $value): array
    {
        return [
            'secret' => config('services.google.recaptcha_secret'),
            'response' => $value
        ];
    }
}