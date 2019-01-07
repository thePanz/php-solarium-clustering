# Solr Clustering Query

TBD


## Install 
```bash
composer require pnz/solarium-clustering-query
```

Usage:
```php
    use Pnz\SolariumClustering\QueryType\Query;
    use Pnz\SolariumClustering\QueryType\Result\Result;

    $clusteringQuery = new Query();
    $clusteringQuery->setRows(200);
    $clusteringQuery->setClusteringEngine('lingo');

    /** @var Result $res */
    $result = $solrClient->execute($clusteringQuery);

    foreach ($result->getClusters() as $cluster) {
        var_dump($cluster);
    }
```