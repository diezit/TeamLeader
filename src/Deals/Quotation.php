<?php

namespace MadeITBelgium\TeamLeader\Deals;

/**
 * TeamLeader Laravel PHP SDK.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2018 Made I.T. (https://www.madeit.be)
 * @author     Tjebbe Lievens <tjebbe.lievens@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class Quotation
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
     */
    public function getTeamleader()
    {
        return $this->teamleader;
    }

    /**
     * Get details for a single quotation.
     */
    public function info($id)
    {
        return $this->teamleader->getCall('quotations.info?'.http_build_query(['id' => $id]));
    }

    /**
     * Downloads a deal.
     */
    public function download($id, $format = 'pdf')
    {
        return $this->teamleader->postCall('quotations.download?'.http_build_query(['id' => $id, 'format' => $format]));
    }

    /**
     * Create a new quotation for a deal.
     */
    public function create($deal_id, $data)
    {
        $data['deal_id'] = $deal_id;

        return $this->teamleader->postCall('quotations.create', [
            'body' => json_encode($data),
        ]);
    }

    /**
     * Update a quotation.
     */
    public function update($id, $data)
    {
        $data['id'] = $id;

        return $this->teamleader->postCall('quotations.update', [
            'body' => json_encode($data),
        ]);
    }
}
