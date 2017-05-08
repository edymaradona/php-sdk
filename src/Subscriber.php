<?php

namespace Mailscout;

class Subscriber extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'subscribers';

    /**
     * Subscriber id.
     *
     * @var int
     */
    public $id;

    /**
     * Get a resource by the given resource id.
     *
     * @param int|string $param
     *
     * @return mixed
     */
    public function get($param = null)
    {
        if(is_null($param)) {
            return $this->request->get(
                "{$this->getResourceName()}?api_token={$this->request->getApiKey()}"
            );
        }

        if(is_int($param)) {
            $this->resourceId = $param;

            $this->resourceData = $this->request->get(
                "{$this->getResourceName()}/{$param}?api_token={$this->request->getApiKey()}"
            );

            return $this;
        }

        $response = $this->lists(1, $param);

        if(empty($response->data[0])) {
            $this->id = 0;

            $this->resourceId = 0;

            $this->resourceData = [
                "subscriber" => null,
                "tags" => []
            ];

            return $this;
        }

        $this->resourceId = $response->data[0]->id;

        $this->id = $response->data[0]->id;

        $tags = $response->data[0]->tags;

        unset($response->data[0]->tags);

        $subscriber = $response->data[0];

        $this->resourceData = [
            "subscriber" => $subscriber,
            "tags" => $tags
        ];

        return $this;
    }

    /**
     * Subscriber subscribe.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function subscribe($data = [])
    {
        return $this->add($data);
    }

    /**
     * Subscriber unsubscribe.
     *
     * @param string $token
     * @param string $broadcastId
     * @return mixed
     */
    public function unsubscribe($token, $broadcastId)
    {
        return $this->request->get(
            "unsubscription/{$token}/{$broadcastId}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Import subscribers from csv file.
     *
     * @param array $csv
     *
     * @return mixed
     */
    public function import($csv)
    {
        return $this->request->post(
            "{$this->getResourceName()}/csv/import?api_token={$this->request->getApiKey()}",
            ['csv' => $csv]
        );
    }

    /**
     * Get subscribers growth.
     *
     * @return mixed
     */
    public function growth()
    {
        return $this->request->get(
            "subscribers-growth?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Get subscribers population.
     *
     * @param null $hook
     * @return mixed
     */
    public function population($hook = null)
    {
        if(is_null($hook)) {
            return $this->request->get(
                "subscribers-population?api_token={$this->request->getApiKey()}"
            );
        }

        return $this->request->get(
            "subscribers-population/{$hook}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Attach tags with the current subscriber.
     *
     * @param array $names
     * @return $this
     */
    public function addTags(array $names)
    {
        $this->resourceData = $this->request->post(
            "subscribers/{$this->id}/tags?api_token={$this->request->getApiKey()}",
            ["tags" => $names]
        );

        return $this;
    }

    /**
     * Detach tags from the current subscriber.
     *
     * @param array $names
     * @return $this
     */
    public function removeTags(array $names)
    {
        $this->resourceData = $this->request->delete(
            "subscribers/{$this->id}/tags?api_token={$this->request->getApiKey()}",
            ["tags" => $names]
        );

        return $this;
    }
}
