<?php

namespace App\Clients;

use Laravel\Forge\Forge as BaseForge;

class Forge extends BaseForge
{
    /**
     * Get the server logs.
     *
     * @param  string|int  $serverId
     * @param  string  $type
     * @return object
     */
    public function logs($serverId, $type)
    {
        return (object) $this->get("servers/$serverId/logs?file=$type");
    }

    /**
     * Get the site logs.
     *
     * @param  string|int  $serverId
     * @param  string|int  $siteId
     * @return object
     */
    public function siteLogs($serverId, $siteId)
    {
        return (object) $this->get("servers/$serverId/sites/$siteId/logs");
    }

    /**
     * Get the site deployments.
     *
     * @param  string|int  $serverId
     * @param  string|int  $siteId
     * @return array
     */
    public function siteDeployments($serverId, $siteId)
    {
        return $this->get("servers/$serverId/sites/$siteId/deployment-history")['deployments'];
    }

    /**
     * Get a site deployment.
     *
     * @param  string|int  $serverId
     * @param  string|int  $siteId
     * @param  string|int  $deploymentId
     * @return object
     */
    public function siteDeployment($serverId, $siteId, $deploymentId)
    {
        return (object) $this->get("servers/$serverId/sites/$siteId/deployment-history/$deploymentId")['deployment'];
    }

    /**
     * Get the site deployment output.
     *
     * @param  string|int  $serverId
     * @param  string|int  $siteId
     * @param  string|int  $deploymentId
     * @return string
     */
    public function siteDeploymentOutput($serverId, $siteId, $deploymentId)
    {
        return $this->get("servers/$serverId/sites/$siteId/deployment-history/$deploymentId/output")['output'];
    }
}
