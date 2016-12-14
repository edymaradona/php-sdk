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
     * Sequence status value as Drafted.
     *
     * @var string
     */
    public static $DRAFTED = 'Drafted';


    /**
     * Sequence status value as Published.
     *
     * @var string
     */
    public static $PUBLISHED = 'Published';

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

    /**
     * Create dummy sequence.
     *
     * @return mixed
     */
    public function dummy()
    {
        return $this->request->post(
            "{$this->getResourceName()}/create-dummy?api_token={$this->request->getApiKey()}"
        );
    }
}