<?php

namespace Mailscout;

class Broadcast extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'broadcasts';

    /**
     * Broadcast status value as Drafted.
     *
     * @var string
     */
    public static $DRAFTED = 'Drafted';

    /**
     * Broadcast status value as Delivered.
     *
     * @var string
     */
    public static $DELIVERED = 'Delivered';

    /**
     * Broadcast status value as Queued.
     *
     * @var string
     */
    public static $PENDING = 'Queued';

    /**
     * Broadcast status value as Processing.
     *
     * @var string
     */
    public static $PROCESSING = 'Processing';

    /**
     * Send broadcast email.
     *
     * @param int   $id
     * @param array $data
     *
     * @return mixed
     */
    public function send($id, $data = [])
    {
        return $this->request->post(
            "{$this->getResourceName()}/{$id}/send?api_token={$this->request->getApiKey()}",
            $data
        );
    }

    /**
     * Get filtered broadcasts by the given broadcast status.
     *
     * @param string $status
     *
     * @return mixed
     */
    public function status($status)
    {
        return $this->request->get(
            "{$this->getResourceName()}/{$status}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Get broadcasts current status.
     *
     * @return mixed
     */
    public function currentStatus()
    {
        return $this->request->get(
            "{$this->getResourceName()}/status?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Unschedule broadcast.
     *
     * @param int $id
     * @return mixed
     */
    public function unschedule($id)
    {
        return $this->request->delete(
            "{$this->getResourceName()}/unschedule/{$id}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Create a duplicate broadcast by the given broadcast id.
     *
     * @param int $id
     * @return mixed
     */
    public function duplicate($id)
    {
        return $this->request->post(
            "{$this->getResourceName()}/{$id}/duplicate?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Get public broadcast by the given broadcast unique id.
     *
     * @param string $uniqueId
     * @return mixed
     */
    public function getPublicBroadcast($uniqueId)
    {
        return $this->request->get(
            "{$this->getResourceName()}/public/{$uniqueId}?api_token={$this->request->getApiKey()}"
        );
    }
}
