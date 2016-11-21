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
     * @return mixed
     */
    public function all()
    {
        return $this->request->get(
            "{$this->getResourceName()}/all?api_token={$this->request->getApiKey()}"
        );
    }
}