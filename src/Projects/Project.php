<?php

namespace MadeITBelgium\TeamLeader\Projects;

/**
 * TeamLeader Laravel PHP SDK.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 diezit. (https://www.diezit.nl)
 * @author     Robin van Schuilenburg <robin@diezit.nl>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class Project
{
    private $teamleader;

    public function __construct($teamleader)
    {
        $this->setTeamleader($teamleader);
    }

    /**
     * set Teamleader.
     *
     * @param $teamleader
     */
    public function setTeamleader($teamleader)
    {
        $this->teamleader = $teamleader;
    }

    /**
     * get Teamleader.
     *
     * @param $teamleader
     */
    public function getTeamleader()
    {
        return $this->teamleader;
    }

    /**
     * Get a list of projects.
     */
    public function list($data = [])
    {
        return $this->teamleader->postCall('projects.list', [
            'body' => json_encode($data),
        ]);
    }

    /**
     * Get details for a single projects.
     */
    public function info($id)
    {
        return $this->teamleader->getCall('projects.info?'.http_build_query(['id' => $id]));
    }

    /**
     * Update a project.
     */
    public function update($id, $data)
    {
        $data['id'] = $id;

        return $this->teamleader->postCall('projects.update', [
            'body' => json_encode($data),
        ]);
    }

    /**
     * Get a list of projects
     */
    public function listV1($amount, $pageno, $searchby = null, $show_active_only = null, $selected_customfields = null)
    {
        $params = [
            'amount' => $amount,
            'pageno'   => $pageno
        ];
        if ($searchby) {
            $params['searchby'] = $searchby;
        }
        if ($show_active_only) {
            $params['show_active_only'] = $show_active_only;
        }
        if ($selected_customfields) {
            $params['selected_customfields'] = $selected_customfields;
        }

        return $this->teamleader->postV1Call('getProjects.php', $params);
    }

    public function getV1($id)
    {
        return $this->teamleader->postV1Call('getProject.php', ['project_id' => $id]);
    }
}
