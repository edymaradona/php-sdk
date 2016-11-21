<?php

namespace Mailscout;

class App extends ApiResource
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected $resource = 'apps';

    /**
     * Get all installed apps.
     *
     * @return string
     */
    public function getInstalledApps()
    {
        return $this->request->get(
            "{$this->getResourceName()}/installed-apps?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * Install apps for the current logged in team.
     *
     * @param int $id
     *
     * @return string
     */
    public function install($id)
    {
        return $this->request->post(
            "{$this->getResourceName()}/install/{$id}?api_token={$this->request->getApiKey()}"
        );
    }

    /**
     * UnInstall apps from the current logged in team.
     *
     * @param int $id
     *
     * @return string
     */
    public function uninstall($id)
    {
        return $this->request->delete(
            "{$this->getResourceName()}/uninstall/{$id}?api_token={$this->request->getApiKey()}"
        );
    }
}