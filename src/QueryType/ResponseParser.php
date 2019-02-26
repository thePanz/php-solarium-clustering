<?php

declare(strict_types=1);

namespace Pnz\SolariumClustering\QueryType;

use Pnz\SolariumClustering\QueryType\Result\Cluster;
use Solarium\QueryType\Select\ResponseParser as BaseResponseParser;
use Solarium\Core\Query\ResponseParserInterface as ResponseParserInterface;
use Solarium\QueryType\Suggester\Result\Result;

/**
 * Parse Suggester response data.
 */
class ResponseParser extends BaseResponseParser
{
    /**
     * Get result data for the response.
     *
     * @param Result $result
     *
     * @return array
     */
    public function parse($result)
    {
        $parsed = parent::parse($result);

        $data = $result->getData();
        $clusters = [];

        if (array_key_exists('clusters', $data)) {
            foreach ($data['clusters'] as $cluster) {
                $clusters[] = new Cluster($cluster['labels'], $cluster['score'] ?? 0, $cluster['docs'], $cluster['other-topics'] ?? false);
            }
        }

        $a =  array_merge($parsed, [
            'clusters' => $clusters,
        ]);

        return $a;
    }
}
