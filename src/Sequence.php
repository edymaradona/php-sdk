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
     * @param int $sequenceId
     * @param int $subscriberId
     *
     * @return mixed
     */
    public function subscription($sequenceId, $subscriberId)
    {
        return $this->request->post(
            "{$this->getResourceName()}/{$sequenceId}/subscriber/{$subscriberId}/subscription?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Sequence unsubscription by the given subscriber id.
     *
     * @param int $sequenceId
     * @param int $subscriberId
     *
     * @return mixed
     */
    public function unsubscription($sequenceId, $subscriberId)
    {
        return $this->request->delete(
            "{$this->getResourceName()}/{$sequenceId}/subscriber/{$subscriberId}/unsubscription?api_token={$this->request->getApiKey()}"
        );
    }
}