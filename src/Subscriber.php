<?php

namespace Mailscout;

class Subscriber extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'subscribers';

    /**
     * Subscriber subscribe.
     *
     * @param array $data
     *
     * @return string
     */
    public function subscribe($data = [])
    {
        return $this->add($data);
    }

    /**
     * Subscriber unsubscribe.
     *
     * @param string $token
     *
     * @return string
     */
    public function unsubscribe($token)
    {
        return $this->request->get(
            "unsubscription/{$token}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Import subscribers from csv file.
     *
     * @param array $csv
     *
     * @return string
     */
    public function import($csv)
    {
        return $this->request->post(
            "{$this->getResourceName()}/csv/import?api_token={$this->request->getApiKey()}",
            ['csv' => $csv]
        );
    }
}
