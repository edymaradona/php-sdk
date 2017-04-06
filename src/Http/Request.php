<?php

namespace Mailscout\Http;

use Mailscout\Mailscout;
use Exception as BaseException;
use Mailscout\Exception\Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use Mailscout\Exception\NotFoundException;
use Mailscout\Exception\ValidationException;

class Request extends Mailscout
{
    /**
     * Guzzle http client.
     *
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * Create a new instance of Request.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient([
            'base_uri' => $this->getApiBaseUrl(),
            'headers' => [
                'Accept'     => 'application/json'
            ],
            'verify' => false
        ]);
    }

    /**
     * Http get method.
     *
     * @param string $url
     *
     * @return mixed
     */
    public function get($url)
    {
        return $this->call('GET', "{$url}");
    }

    /**
     * Http post method.
     *
     * @param string $url
     * @param array $data
     *
     * @return mixed
     */
    public function post($url, $data = [])
    {
        return $this->call('POST', "{$url}", [
            'form_params' => $data
        ]);
    }

    /**
     * Http put method.
     *
     * @param string $url
     * @param array $data
     *
     * @return mixed
     */
    public function put($url, $data = [])
    {
        return $this->call('PUT', "{$url}", [
            'form_params' => $data
        ]);
    }

    /**
     * Http delete method.
     *
     * @param string $url
     * @param array $data
     *
     * @return mixed
     */
    public function delete($url, $data = [])
    {
        return $this->call('DELETE', "{$url}", [
            'form_params' => $data
        ]);
    }

    /**
     * Call http method.
     *
     * @param string $method
     * @param string $url
     * @param array  $data
     *
     * @return mixed
     * @throws Exception
     * @throws NotFoundException
     * @throws ValidationException
     */
    public function call($method, $url, $data = [])
    {
        try {
            return json_decode(
                $this->httpClient->request($method, Mailscout::getApiBaseUrl() . $url, $data)
                    ->getBody()->getContents(), true
            );
        } catch(ClientException $e) {

            if( ($e->getCode() == 422) or ($e->getCode() == 22) or ($e->getCode() == 23) ) {
                throw new ValidationException(
                    $e->getResponse()->getBody()->getContents(),
                    $e->getCode()
                );
            }

            if($e->getCode() == 404) {
                throw new NotFoundException(
                    $e->getResponse()->getBody()->getContents(),
                    $e->getCode()
                );
            }

            throw new Exception(
                $e->getResponse()->getBody()->getContents(),
                $e->getCode()
            );
        } catch(BaseException $e) {
            var_dump($e->getMessage());
            throw new Exception(
                $e->getResponse()->getBody()->getContents(),
                $e->getCode()
            );
        }
    }
}