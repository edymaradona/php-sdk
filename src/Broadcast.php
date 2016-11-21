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
     * @return string
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
     * @return string
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
     * @return string
     */
    public function currentStatus()
    {
        return $this->request->get(
            "{$this->getResourceName()}/status?api_token={$this->request->getApiKey()}"
        );
    }
}