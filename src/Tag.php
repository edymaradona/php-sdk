<?php

namespace Mailscout;

class Tag extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'tags';

    /**
     * Get all tags.
     *
     * @return string
     */
    public function getAll()
    {
        return $this->request->get(
            "{$this->getResourceName()}/all?api_token={$this->request->getApiKey()}"
        );
    }
}