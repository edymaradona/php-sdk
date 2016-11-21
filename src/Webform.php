<?php

namespace Mailscout;

class Webform extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'webforms';

    /**
     * Get embeded webform by the given webform id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getEmbedWebform($id)
    {
        return $this->request->get(
            "{$this->getResourceName()}/embed/{$id}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Add subscriber from webform.
     *
     * @param int     $id webform id
     * @param string  $email subscriber email address
     *
     * @return mixed
     */
    public function addSubscriber($id, $email)
    {
        return $this->request->post(
            "{$this->getResourceName()}/subscriber/add?api_token={$this->request->getApiKey()}",
            [
                'id' => $id,
                'email' => $email
            ]
        );
    }

    /**
     * Get embed webform by the given id.
     *
     * @param int $id webform id
     *
     * @return mixed
     */
    public function getWebformJS($id)
    {
        return $this->request->get(
            "{$this->getResourceName()}/assets/js/{$id}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Get webform links by the given webform id.
     *
     * @param int  $id
     *
     * @return mixed
     */
    public function links($id)
    {
        return $this->request->get(
            "{$this->getResourceName()}/{$id}/copy-links?api_token={$this->request->getApiKey()}"
        );
    }
}