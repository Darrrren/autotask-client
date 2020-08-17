<?php

namespace Anteris\Autotask\API\WebhookEventErrorLogs;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Represents WebhookEventErrorLog entities.
 */
class WebhookEventErrorLogEntity extends DataTransferObject
{
    public ?int $accountWebhookID;
    public ?int $contactWebhookID;
    public ?Carbon $createDateTime;
    public ?string $errorMessage;
    public int $id;
    public ?string $payload;
    public ?int $sequenceNumber;
    public array $userDefinedFields = [];

    public function __construct(array $array)
    {
        $array['createDateTime'] = new Carbon($array['createDateTime']);
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