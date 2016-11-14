<?php

namespace Mailscout;

class Segment extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'segments';

    /**
     * Get all segmented subscribers by the given segment id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getSegmentedSubscribers($id)
    {
        return $this->request->get(
            "{$this->getResourceName()}/{$id}/subscribers?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Get subscriber  preview based on segment data.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function subscribersPreview($data)
    {
        return $this->request->post(
            "{$this->getResourceName()}/subscribers/preview?api_token={$this->request->getApiKey()}",
            $data
        );
    }
}