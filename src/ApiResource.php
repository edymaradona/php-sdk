<?php

namespace Mailscout;

use Mailscout\Http\Request;

class ApiResource
{
    /**
     * Instance of http request.
     *
     * @var Request
     */
    protected $request;

    /**
     * Create a new instance of api resource.
     */
    public function __construct()
    {
        $this->request = new Request;
    }

    /**
     * Retrieve resource.
     *
     * @param int    $limit
     * @param string $searchTerms
     * @param string $status
     *
     * @return object
     */
    public function retrieve($limit = 10, $searchTerms = '', $status = '')
    {
        return $this->request->get(
            "{$this->getResourceName()}?limit={$limit}&searchTeams={$searchTerms}&status={$status}&api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Add new resource.
     *
     * @param array $data
     *
     * @return object
     */
    public function add($data = [])
    {
        return $this->request->post(
            "{$this->getResourceName()}?api_token={$this->request->getApiKey()}",
            $data
        );
    }

    /**
     * Update an existing resource.
     *
     * @param int   $id
     * @param array $data
     *
     * @return object
     */
    public function update($id, $data = [])
    {
        return $this->request->put(
            "{$this->getResourceName()}/{$id}?api_token={$this->request->getApiKey()}",
            $data
        );
    }

    /**
     * Get a resource by the given resource id.
     *
     * @param int $id
     *
     * @return object
     */
    public function get($id)
    {
        return $this->request->get(
            "{$this->getResourceName()}/{$id}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Find a resource by the given resource id.
     *
     * @param int $id
     *
     * @return object
     */
    public function find($id)
    {
        return $this->get($id);
    }

    /**
     * Remove existing resource.
     *
     * @param array $ids
     *
     * @return object
     */
    public function remove($ids = [])
    {
        return $this->request->delete(
            "{$this->getResourceName()}/bulk?api_token={$this->request->getApiKey()}",
            ['ids' => $ids]
        );
    }

    /**
     * Call any resource by the given http method and url.
     *
     * @param string $method
     * @param string $url
     * @param array $data
     *
     * @return mixed
     */
    protected function call($method, $url, $data = [])
    {
        return $this->request->call(
            $method,
            $this->request->getApiBaseUrl() . $url,
            $data
        );
    }

    /**
     * Get resource name.
     *
     * @return string
     */
    protected function getResourceName()
    {
        return $this->resource;
    }
}