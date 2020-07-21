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
     * Store the quotations for the deal in teamleader
     *
     * @param  int  $deal_id V1 id of the deal to be updated
     * @param  array  $items containing quotations
     * @param  bool  $append should the order lines be appended to the existing order lines or overwritten?
     */
    public function storeV1(int $deal_id, array $items, bool $append = true)
    {
        $postData = ['deal_id' => $deal_id];
        $itemCount = 0;

        if ($append) {
            // fetch existing quotations for this deal and append this to the post data
            $info = $this->teamleader->postV1Call('getDeal.php', $postData);
            foreach ($info->items as $existing) {
                $itemCount++;
                $postData['description_'.$itemCount] = $existing->text;
                $postData['price_'.$itemCount] = $existing->price_per_unit;
                $postData['amount_'.$itemCount] = $existing->amount;
                $postData['vat_'.$itemCount] = $existing->vat_rate;
            }
        }

        // Now add our new quotation items to the post data
        foreach ($items as $key => $item) {
            $itemCount++;
            $postData['description_'.$itemCount] = $item['description'];
            $postData['price_'.$itemCount] = $item['price'];
            $postData['amount_'.$itemCount] = $item['amount'];
            $postData['vat_'.$itemCount] = $item['vat'];
        }

        // Send all quotations to the api so the deal is updated.
        $this->teamleader->postV1Call('updateDealItems.php', $postData);
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
