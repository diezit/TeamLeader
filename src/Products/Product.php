<?php

namespace MadeITBelgium\TeamLeader\Products;

/**
 * TeamLeader Laravel PHP SDK.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 diezit. (https://www.diezit.nl)
 * @author     Robin van Schuilenburg <robin@diezit.nl>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class Product
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
     * Get a list of products.
     */
    public function list($data = [])
    {
        if (!empty($data)) {
            return $this->teamleader->postCall('products.list', [
                'body' => json_encode($data),
            ]);
        }
        return $this->teamleader->getCall('products.list');
    }

    /**
     * Get details for a single product.
     */
    public function info($id)
    {
        return $this->teamleader->getCall('products.info?'.http_build_query(['id' => $id]));
    }

    /**
     * Add a new product.
     */
    public function add($data)
    {
        return $this->teamleader->postCall('products.add', [
            'body' => json_encode($data),
        ]);
    }

}
