<?php

namespace MadeITBelgium\TeamLeader\CustomFields;

/**
 * TeamLeader Laravel PHP SDK.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 diezit. (https://www.diezit.nl)
 * @author     Robin van Schuilenburg <robin@diezit.nl>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class CustomField
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
     * Get a list of custom fields.
     */
    public function list($data = [])
    {
        return $this->teamleader->postV1Call('getCustomFields.php', $data);
    }

    /**
     * Get details for a single custom field.
     */
    public function info($id)
    {
        return $this->teamleader->postV1Call('getCustomFieldInfo.php', ['custom_field_id' => $id]);
    }

}
