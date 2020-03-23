<?php

namespace MadeITBelgium\TeamLeader\Departments;

/**
 * TeamLeader Laravel PHP SDK.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 diezit. (https://www.diezit.nl)
 * @author     Robin van Schuilenburg <robin@diezit.nl>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class Department
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
     * Get a list of departments.
     */
    public function list($data = [])
    {
        return $this->teamleader->postCall('departments.list', [
            'body' => json_encode($data),
        ]);
    }

    /**
     * Get details for a single department.
     */
    public function info($id)
    {
        return $this->teamleader->getCall('departments.info?'.http_build_query(['id' => $id]));
    }
}