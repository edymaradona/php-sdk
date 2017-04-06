<?php

namespace Mailscout;

class Service extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'services';

    /**
     * Get products.
     *
     * @param string $name
     * @return mixed
     */
    public function products($name)
    {
        return $this->request->get(
            "{$this->getResourceName()}/{$name}/products?api_token={$this->request->getApiKey()}"
        );
    }

}