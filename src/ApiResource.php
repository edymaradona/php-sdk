<?php

namespace Mailscout;

use Mailscout\Http\Request;

abstract class ApiResource
{
    /**
     * Instance of http request.
     *
     * @var Request
     */
    protected $request;

    /**
     * Resource ID.
     *
     * @var int
     */
    protected $resourceId;

    /**
     * Store resource data.
     *
     * @var string
     */
    protected $resourceData;

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
     * @return mixed
     */
    public function lists($limit = 10, $searchTerms = '', $status = '')
    {
        return $this->request->get(
            "{$this->getResourceName()}?limit={$limit}&searchTerms={$searchTerms}&status={$status}&api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Add new resource.
     *
     * @param array $data
     *
     * @return mixed
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
     * @return mixed
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
     * @return mixed
     */
    public function get($id = null)
    {
        if(is_nan($id)) {
            return $this->request->get(
                "{$this->getResourceName()}?api_token={$this->request->getApiKey()}"
            );
        }

        $this->resourceId = $id;

        return $this->request->get(
            "{$this->getResourceName()}/{$id}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Find a resource by the given resource id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function find($id)
    {
        $this->get($id);

        return $this;
    }

    /**
     * Remove existing resource.
     *
     * @param array $ids
     *
     * @return mixed
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

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->resourceData;
    }
}