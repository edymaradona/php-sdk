<?php

namespace Mailscout;

class Sequence  extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'sequences';

    /**
     * Get all sequences.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->request->get(
            "{$this->getResourceName()}/all?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Sequence subscription by the given subscriber id.
     *
     * @param int $subscriberId
     *
     * @return mixed
     */
    public function subscribe($subscriberId)
    {
        return $this->request->post(
            "{$this->getResourceName()}/{$this->resourceId}/subscriber/{$subscriberId}/subscribe?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Sequence unsubscription by the given subscriber id.
     *
     * @param int $subscriberId
     *
     * @return mixed
     */
    public function unsubscribe($subscriberId)
    {
        return $this->request->delete(
            "{$this->getResourceName()}/{$this->resourceId}/subscriber/{$subscriberId}/unsubscribe?api_token={$this->request->getApiKey()}"
        );
    }
}