<?php

namespace MadeITBelgium\TeamLeader\Notes;

/**
 * TeamLeader Laravel PHP SDK.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 diezit. (https://www.diezit.nl)
 * @author     Robin van Schuilenburg <robin@diezit.nl>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class Note
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
     * Get a list of notes for a given object.
     */
    public function list($data = [])
    {
        return $this->teamleader->getCall('notes.list?'.http_build_query($data));
    }

    /**
     * Store a note
     */
    public function create($data)
    {
        return $this->teamleader->postCall('notes.create', [
            'body' => json_encode($data),
        ]);
    }
}
