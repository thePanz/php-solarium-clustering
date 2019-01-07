<?php

declare(strict_types=1);

namespace Pnz\SolariumClustering\QueryType\Result;

class Cluster
{
    /**
     * @var string[]
     */
    private $labels;

    /**
     * @var float
     */
    private $score;

    /**
     * @var string[]
     */
    private $ids;

    /**
     * @var bool
     */
    private $otherTopics = false;

    /**
     * @param string[] $labels
     * @param string[] $ids
     */
    public function __construct(array $labels, float $score, array $ids, bool $otherTopics)
    {
        $this->labels = $labels;
        $this->score = $score;
        $this->ids = $ids;
        $this->otherTopics = $otherTopics;
    }

    /**
     * @return string[]
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    public function getScore(): float
    {
        return $this->score;
    }

    /**
     * @return string[]
     */
    public function getIds(): array
    {
        return $this->ids;
    }

    public function isOtherTopics(): bool
    {
        return $this->otherTopics;
    }
}
