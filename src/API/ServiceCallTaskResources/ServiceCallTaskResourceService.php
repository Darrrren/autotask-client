<?php

namespace Anteris\Autotask\API\ServiceCallTaskResources;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask ServiceCallTaskResources.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ServiceCallTaskResourcesEntity.htm Autotask documentation.
 */
class ServiceCallTaskResourceService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new servicecalltaskresource.
     *
     * @param  ServiceCallTaskResourceEntity  $resource  The servicecalltaskresource entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ServiceCallTaskResourceEntity $resource)
    {
        $this->client->post("ServiceCallTaskResources", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the ServiceCallTaskResource to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("ServiceCallTaskResources/$id");
    }

    /**
     * Finds the ServiceCallTaskResource based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ServiceCallTaskResourceEntity
    {
        return ServiceCallTaskResourceEntity::fromResponse(
            $this->client->get("ServiceCallTaskResources/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ServiceCallTaskResourceQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ServiceCallTaskResourceQueryBuilder
    {
        return new ServiceCallTaskResourceQueryBuilder($this->client);
    }

}