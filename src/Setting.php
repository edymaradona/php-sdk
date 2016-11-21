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
     * Get all settings.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->request->get(
            "{$this->getResourceName()}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Update SMTP settings.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function setSMTP($data = [])
    {
        return $this->request->put(
            "{$this->getResourceName()}/smtp?api_token={$this->request->getApiKey()}",
            $data
        );
    }
}