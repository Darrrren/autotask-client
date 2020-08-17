<?php

namespace Anteris\Autotask\API\ContractServiceBundleAdjustments;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of ContractServiceBundleAdjustment entities.
 * @see ContractServiceBundleAdjustmentEntity
 */
class ContractServiceBundleAdjustmentCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ContractServiceBundleAdjustmentEntity
    {
        return parent::current();
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): ContractServiceBundleAdjustmentCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ContractServiceBundleAdjustmentEntity::arrayOf($array['items'])
        );
    }
}