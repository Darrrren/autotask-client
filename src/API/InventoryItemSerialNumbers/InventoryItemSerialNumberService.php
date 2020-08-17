<?php

namespace Anteris\Autotask\API\InventoryItemSerialNumbers;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask InventoryItemSerialNumbers.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/InventoryItemSerialNumbersEntity.htm Autotask documentation.
 */
class InventoryItemSerialNumberService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new inventoryitemserialnumber.
     *
     * @param  InventoryItemSerialNumberEntity  $resource  The inventoryitemserialnumber entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(InventoryItemSerialNumberEntity $resource)
    {
        $this->client->post("InventoryItemSerialNumbers", $resource->toArray());
    }


    /**
     * Finds the InventoryItemSerialNumber based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): InventoryItemSerialNumberEntity
    {
        return InventoryItemSerialNumberEntity::fromResponse(
            $this->client->get("InventoryItemSerialNumbers/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see InventoryItemSerialNumberQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): InventoryItemSerialNumberQueryBuilder
    {
        return new InventoryItemSerialNumberQueryBuilder($this->client);
    }

    /**
     * Updates the inventoryitemserialnumber.
     *
     * @param  InventoryItemSerialNumberEntity  $resource  The inventoryitemserialnumber entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(InventoryItemSerialNumberEntity $resource): void
    {
        $this->client->put("InventoryItemSerialNumbers/$resource->id", $resource->toArray());
    }
}