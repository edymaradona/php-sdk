<?php

namespace Mailscout;

class Event extends ApiResource
{
    /**
     * Push event.
     *
     * @param string $eventName
     * @param array  $data
     * @return mixed
     */
    public function push($eventName, array $data)
    {
        return $this->request->post(
            "events/push?api_token={$this->request->getApiKey()}",
            [
                "event_name" => $eventName,
                "data" => $data
            ]
        );
    }
}