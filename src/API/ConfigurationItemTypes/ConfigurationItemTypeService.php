<?php

namespace Anteris\Autotask\API\ConfigurationItemTypes;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ConfigurationItemTypes.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ConfigurationItemTypesEntity.htm Autotask documentation.
 */
class ConfigurationItemTypeService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new configurationitemtype.
     *
     * @param  ConfigurationItemTypeEntity  $resource  The configurationitemtype entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ConfigurationItemTypeEntity $resource)
    {
        $this->client->post("ConfigurationItemTypes", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ConfigurationItemType to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ConfigurationItemTypes/$id");
    }

    /**
     * Finds the ConfigurationItemType based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ConfigurationItemTypeEntity
    {
        return ConfigurationItemTypeEntity::fromResponse(
            $this->client->get("ConfigurationItemTypes/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ConfigurationItemTypeQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ConfigurationItemTypeQueryBuilder
    {
        return new ConfigurationItemTypeQueryBuilder($this->client);
    }

    /**
     * Updates the configurationitemtype.
     *
     * @param  ConfigurationItemTypeEntity  $resource  The configurationitemtype entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ConfigurationItemTypeEntity $resource): void
    {
        $this->client->put("ConfigurationItemTypes/$resource->id", $resource->toArray());
    }
}