<?php

namespace Mailscout;

class Team extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'teams';

    /**
     * Activate team by the given team id.
     *
     * @param int $teamId
     * @return mixed
     */
    public function activate($teamId)
    {
        return $this->request->post(
            "{$this->getResourceName()}/activate?api_token={$this->request->getApiKey()}",
            ["team_id" => $teamId]
        );
    }

    /**
     * Deactivate team by the given team id.
     *
     * @param int $teamId
     * @return mixed
     */
    public function deactivate($teamId)
    {
        return $this->request->post(
            "{$this->getResourceName()}/deactivate?api_token={$this->request->getApiKey()}",
            ["team_id" => $teamId]
        );
    }
}