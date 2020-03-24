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
    public function list($object_type, $object_id, $page_no)
    {
        return $this->teamleader->postV1Call('getNotes.php', [
            'object_type' => $object_type,
            'object_id'   => $object_id,
            'page_no'     => $page_no,
        ]);
    }

    /**
     * Store a note
     */
    public function create($data)
    {
        return $this->teamleader->postV1Call('addNote.php', $data);
    }
}
