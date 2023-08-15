<?php
/*
 * Bundle: Crisp
 * Project: Crisp - PHP API
 * Author: Baptiste Jamin http://jamin.me/
 * Copyright: 2018, Crisp IM
 */

namespace Crisp;

use Crisp\Resources\Buckets;
use Crisp\Resources\PluginSubscriptions;
use Crisp\Resources\UserProfile;
use Crisp\Resources\Website;
use Crisp\Resources\WebsiteAvailability;
use Crisp\Resources\WebsiteConversations;
use Crisp\Resources\WebsiteOperators;
use Crisp\Resources\WebsitePeople;
use Crisp\Resources\WebsiteSettings;
use Crisp\Resources\WebsiteVerify;
use Crisp\Resources\WebsiteVisitors;
use Http\Client\HttpClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

class CrispClient
{
    // Rest default configuration
    public $DEFAULT_REST_HOST = "https://api.crisp.chat";
    public $DEFAULT_REST_BASE_PATH = "/v1/";

    private $headers;
    private $baseUrl;
    private $client;
    private $requestFactory;
    private $streamFactory;

    /**
     * @var Buckets
     */
    public $buckets;
    /**
     * @var UserProfile
     */
    public $userProfile;
    /**
     * @var Website
     */
    public $website;
    /**
     * @var WebsiteVerify
     */
    public $websiteVerify;
    /**
     * @var WebsiteSettings
     */
    public $websiteSettings;
    /**
     * @var WebsiteConversations
     */
    public $websiteConversations;
    /**
     * @var WebsitePeople
     */
    public $websitePeople;
    /**
     * @var WebsiteAvailability
     */
    public $websiteAvailability;
    /**
     * @var WebsiteOperators
     */
    public $websiteOperators;
    /**
     * @var WebsiteVisitors
     */
    public $websiteVisitors;
    /**
     * @var PluginSubscriptions
     */
    public $pluginSubscriptions;

    public function __construct(HttpClient $client = null, RequestFactoryInterface $requestFactory = null, StreamFactoryInterface $streamFactory = null)
    {
        $this->client  = $client ?: Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?: Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?: Psr17FactoryDiscovery::findStreamFactory();
        $this->baseUrl = $this->DEFAULT_REST_HOST . $this->DEFAULT_REST_BASE_PATH;

        $this->headers = [
            'Content-Type' => "application/json"
        ];

        $this->buckets              = new Buckets($this);
        $this->userProfile          = new UserProfile($this);
        $this->website              = new Website($this);
        $this->websiteSettings      = new WebsiteSettings($this);
        $this->websiteVerify        = new WebsiteVerify($this);
        $this->websiteConversations = new WebsiteConversations($this);
        $this->websitePeople        = new WebsitePeople($this);
        $this->websiteAvailability  = new WebsiteAvailability($this);
        $this->websiteOperators     = new WebsiteOperators($this);
        $this->websiteVisitors      = new WebsiteVisitors($this);
        $this->pluginSubscriptions  = new PluginSubscriptions($this);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function post($path, $encodedData = '')
    {
        return $this->client->sendRequest(
            $this
                ->createBaseRequest('POST', $path)
                ->withBody($this->streamFactory->createStream($encodedData))
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function patch($path, $encodedData = '')
    {
        return $this->client->sendRequest(
            $this
                ->createBaseRequest('PATCH', $path)
                ->withBody($this->streamFactory->createStream($encodedData))
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function put($path, $encodedData = '')
    {
        return $this->client->sendRequest(
            $this
                ->createBaseRequest('PUT', $path)
                ->withBody($this->streamFactory->createStream($encodedData))
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function get($path)
    {
        return $this->client->sendRequest(
            $this->createBaseRequest('GET', $path)
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function delete($path)
    {
        return $this->client->sendRequest(
            $this->createBaseRequest('DELETE', $path)
        );
    }

    private function createBaseRequest($method, $path)
    {
        $request = $this->requestFactory->createRequest($method, $this->getUri($path));

        foreach ($this->headers as $key => $value) {
            $request = $request->withAddedHeader($key, $value);
        }

        return $request;
    }

    /**
     * @param $path
     *
     * @return string
     */
    private function getUri($path)
    {
        return rtrim($this->baseUrl, '/') .'/' .ltrim($path, '/');
    }

    public function setRestHost($host)
    {
        $this->baseUrl = $host;
    }

    public function authenticate($identifier, $key)
    {
        $login = sprintf('%s:%s', $identifier, $key);
        $this->headers['Authorization'] = sprintf('Basic %s', base64_encode($login));
    }

    public function setTier($tier)
    {
        $this->headers["X-Crisp-Tier"] = $tier;
    }
}
