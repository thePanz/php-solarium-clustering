<?php

declare(strict_types=1);

namespace Pnz\SolariumClustering\QueryType;

use Solarium\Core\Client\Request;
use Solarium\QueryType\Select\RequestBuilder as BaseRequestBuilder;
use Solarium\Core\Query\QueryInterface;

class RequestBuilder extends BaseRequestBuilder
{
    public function build(QueryInterface $query): Request
    {
        $request = parent::build($query);

        if ($query instanceof Query) {
            $request
                ->addParam('clustering.engine', $query->getClusteringEngine())
                ->addParam('df', $query->getFields())
            ;
        }

        return $request;
    }
}
