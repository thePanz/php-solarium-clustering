<?php

declare(strict_types=1);

namespace Pnz\SolariumClustering\QueryType;

use Pnz\SolariumClustering\QueryType\Result\Result;
use Solarium\Component\ComponentTraits\SuggesterTrait;
use Solarium\Component\QueryInterface;
use Solarium\Component\QueryTrait;
use Solarium\Component\SuggesterInterface;
use Solarium\Core\Query\AbstractQuery as BaseQuery;

class Query extends BaseQuery implements SuggesterInterface, QueryInterface
{
    use SuggesterTrait;
    use QueryTrait;

    private const CLUSTERING_ENGINE_OPTION = 'clustering.engine';
    private const ROWS_OPTION = 'rows';

    /**
     * Default options.
     *
     * @var array
     */
    protected $options = [
        'handler' => 'clustering',
        'resultclass' => Result::class,
        'omitheader' => true,
        'build' => false,
        'reload' => false,
    ];

    /**
     * Get type for this query.
     *
     * @return string
     */
    public function getType()
    {
        return 'clustering';
    }

    /**
     * Get a requestbuilder for this query.
     *
     * @return RequestBuilder
     */
    public function getRequestBuilder()
    {
        return new RequestBuilder();
    }

    /**
     * Get a response parser for this query.
     *
     * @return ResponseParser
     */
    public function getResponseParser()
    {
        return new ResponseParser();
    }

    public function setClusteringEngine(string $value): void
    {
        $this->setOption(self::CLUSTERING_ENGINE_OPTION, $value);
    }

    public function setRows(int $value): void
    {
        $this->setOption(self::ROWS_OPTION, $value);
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
