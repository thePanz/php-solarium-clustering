<?php

declare(strict_types=1);

namespace Pnz\SolariumClustering\QueryType\Result;

use Solarium\QueryType\Select\Result\Result as BaseResult;

/**
 * Suggester query result.
 */
class Result extends BaseResult implements \IteratorAggregate, \Countable
{
    /**
     * Suggester flat results.
     *
     * @var Cluster[]
     */
    protected $clusters;

    /**
     * @return Cluster[]
     */
    public function getClusters(): array
    {
        $this->parseResponse();

        return $this->clusters;
    }
}
