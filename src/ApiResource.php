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
     * Update an existing resource.
     *
     * @param array $data
     * @param int   $id
     *
     * @return mixed
     */
    public function update($data = [], $id = null)
    {
        if(!is_int($this->resourceId)) {
            $this->resourceId = $id;
        }

        $this->resourceData = $this->request->put(
            "{$this->getResourceName()}/{$this->resourceId}?api_token={$this->request->getApiKey()}",
            $data
        );

        return $this;
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
     * Get a resource by the given resource id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function get($id = null)
    {
        if(is_null($id)) {
            $this->resourceData = $this->request->get(
                "{$this->getResourceName()}?api_token={$this->request->getApiKey()}"
            );
        }

        $this->resourceId = $id;

        $this->resourceData = $this->request->get(
            "{$this->getResourceName()}/{$id}?api_token={$this->request->getApiKey()}"
        );

        return $this;
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
        if(empty($ids) and is_int($this->resourceId)) {
            $ids[] = $this->resourceId;
        }

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
     * Get resource data in array.
     *
     * @return mixed
     */
    public function toArray()
    {
        return json_decode(json_encode($this->resourceData), true);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->resourceData);
    }
}