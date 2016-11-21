<?php

namespace Mailscout;

class Setting extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'settings';

    /**
     * Update SMTP settings.
     *
     * @param array $data
     *
     * @return string
     */
    public function setSMTP($data = [])
    {
        return $this->request->put(
            "{$this->getResourceName()}/smtp?api_token={$this->request->getApiKey()}",
            $data
        );
    }
}