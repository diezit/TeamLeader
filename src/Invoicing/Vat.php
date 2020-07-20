<?php

namespace MadeITBelgium\TeamLeader\Invoicing;

/**
 * TeamLeader Laravel PHP SDK.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 diezit. (https://www.diezit.nl)
 * @author     Robin van Schuilenburg <robin@diezit.nl>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class Vat
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
     * Get a list of tax rates.
     */
    public function list($data = [])
    {
        return $this->teamleader->getCall('taxRates.list?'.http_build_query($data));
    }

}
