<?php

namespace Mailscout;

class Automation extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'automations';

    /**
     * Change automation status by the given ids.
     *
     * @param array $ids
     * @return mixed
     */
    public function changeStatus($ids)
    {
        return $this->request->post(
            "{$this->getResourceName()}/status?api_token={$this->request->getApiKey()}",
            ["ids" => $ids]
        );
    }
}