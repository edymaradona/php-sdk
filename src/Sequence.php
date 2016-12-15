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
     * @param int    $subscriberId
     * @param array  $templateData
     * @param int    $currentSequenceNO
     * @param string $nextSequenceDate
     *
     * @return mixed
     */
    public function subscribe($subscriberId, array $templateData = [], $currentSequenceNO = 0, $nextSequenceDate = '')
    {
        return $this->request->post(
            "{$this->getResourceName()}/{$this->resourceId}/subscriber/{$subscriberId}/subscribe?api_token={$this->request->getApiKey()}", [
                'template_data' => $templateData,
                'current_sequence_no' => $currentSequenceNO,
                'next_sequence_date' => $nextSequenceDate
        ]);
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

    /**
     * Add new broadcast with an existing sequence.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function addBroadcast(array $data)
    {
        return $this->request->post(
            "{$this->getResourceName()}/{$this->resourceId}/broadcasts?api_token={$this->request->getApiKey()}",
            $data
        );
    }

    /**
     * Remove new broadcast from an existing sequence.
     *
     * @param int $broadcastId
     *
     * @return mixed
     */
    public function removeBroadcast($broadcastId)
    {
        return $this->request->delete(
            "{$this->getResourceName()}/{$this->resourceId}/broadcasts/{$broadcastId}?api_token={$this->request->getApiKey()}"
        );
    }
}