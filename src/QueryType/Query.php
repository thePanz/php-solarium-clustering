<?php

declare(strict_types=1);

namespace Pnz\SolariumClustering\QueryType;

use Pnz\SolariumClustering\QueryType\Result\Result;
use Solarium\QueryType\Select\Query\Query as BaseQuery;

class Query extends BaseQuery
{
    private const CLUSTERING_ENGINE_OPTION = 'clustering.engine';
    private const ROWS_OPTION = 'rows';

    /**
     * Default options.
     */
    protected $options = [
        'handler' => 'clustering',
        'resultclass' => Result::class,
        'documentclass' => 'Solarium\QueryType\Select\Result\Document',
        'query' => '*:*',
        'start' => 0,
        'rows' => 10,
        'fields' => '*,score',
        'omitheader' => true,
        'build' => false,
        'reload' => false,
    ];

    public function getType(): string
    {
        return 'clustering';
    }

    public function getRequestBuilder(): RequestBuilder
    {
        return new RequestBuilder();
    }

    public function getResponseParser(): ResponseParser
    {
        return new ResponseParser();
    }

    public function setClusteringEngine(string $value): void
    {
        $this->setOption(self::CLUSTERING_ENGINE_OPTION, $value);
    }

    public function getRows(): int
    {
        return (int) $this->getOption(self::ROWS_OPTION);
    }

    public function getClusteringEngine(): string
    {
        return $this->getOption(self::CLUSTERING_ENGINE_OPTION) ?? '';
    }
}
