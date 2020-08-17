<?php

namespace Anteris\Autotask\API\ServiceLevelAgreementResults;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents ServiceLevelAgreementResult entities.
 */
class ServiceLevelAgreementResultEntity extends DataTransferObject
{
    public ?float $firstResponseElapsedHours;
    public ?int $firstResponseInitiatingResourceID;
    public ?int $firstResponseResourceID;
    public int $id;
    public ?bool $isFirstResponseMet;
    public ?bool $isResolutionMet;
    public ?bool $isResolutionPlanMet;
    public ?float $resolutionElapsedHours;
    public ?float $resolutionPlanElapsedHours;
    public ?int $resolutionPlanResourceID;
    public ?int $resolutionResourceID;
    public ?string $serviceLevelAgreementName;
    public ?int $ticketID;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        parent::__construct($array);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response)
    {
        $responseArray = json_decode($response->getBody(), true);

        if (isset($responseArray['item']) === false) {
            throw new \Exception('Missing item key in response.');
        }

        return new self($responseArray['item']);
    }
}