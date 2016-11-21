<?php

namespace Mailscout;

class Template extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'templates';

    /**
     * Get all templates.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->request->get(
            "{$this->getResourceName()}/all?api_token={$this->request->getApiKey()}"
        );
    }
}