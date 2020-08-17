<?php

namespace Anteris\Autotask\API\Countries;

use Anteris\Autotask\HttpClient;

/**
 * Handles all interaction with Autotask Countries.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CountriesEntity.htm Autotask documentation.
 */
class CountryService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }



    /**
     * Finds the Country based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CountryEntity
    {
        return CountryEntity::fromResponse(
            $this->client->get("Countries/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CountryQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CountryQueryBuilder
    {
        return new CountryQueryBuilder($this->client);
    }

    /**
     * Updates the country.
     *
     * @param  CountryEntity  $resource  The country entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CountryEntity $resource): void
    {
        $this->client->put("Countries/$resource->id", $resource->toArray());
    }
}