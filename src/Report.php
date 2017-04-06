<?php

namespace Mailscout;

class Report extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'reports';

    /**
     * Get reports overview.
     *
     * @param int $broadcastId
     * @return mixed
     */
    public function overview($broadcastId)
    {
        return $this->request->get(
            "{$this->getResourceName()}/overview/{$broadcastId}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Save broadcast opens report.
     *
     * @param int $broadcastId
     * @return mixed
     */
    public function opens($broadcastId)
    {
        return $this->request->get(
            "{$this->getResourceName()}/opens/{$broadcastId}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Save broadcast clicks report.
     *
     * @param int $broadcastId
     * @return mixed
     */
    public function clicks($broadcastId)
    {
        return $this->request->get(
            "{$this->getResourceName()}/clicks/{$broadcastId}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Save broadcast unsubscribed report.
     *
     * @param int $broadcastId
     * @return mixed
     */
    public function unsubscribed($broadcastId)
    {
        return $this->request->get(
            "{$this->getResourceName()}/unsubscribed/{$broadcastId}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Save broadcast bounce report.
     *
     * @param int $broadcastId
     * @return mixed
     */
    public function bounce($broadcastId)
    {
        return $this->request->get(
            "{$this->getResourceName()}/bounce/{$broadcastId}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Save broadcast spam report.
     *
     * @param int $broadcastId
     * @return mixed
     */
    public function spam($broadcastId)
    {
        return $this->request->get(
            "{$this->getResourceName()}/spam/{$broadcastId}?api_token={$this->request->getApiKey()}"
        );
    }
}