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
}