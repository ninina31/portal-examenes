<?php

namespace MPWAR\Module\Question\Contract\DomainEvent;

use DateTimeImmutable;
use SimpleBus\Message\Type\Event;

final class QuestionRegistered implements Event
{
    private $aggregateId;
    private $occurredOn;
    private $name;
    public function __construct($aggregateId, DateTimeImmutable $occurredOn, $name)
    {
        $this->aggregateId = $aggregateId;
        $this->occurredOn  = $occurredOn;
        $this->name        = $name;
    }
    public function aggregateId()
    {
        return $this->aggregateId;
    }
    public function occurredOn()
    {
        return $this->occurredOn;
    }
    public function name()
    {
        return $this->name;
    }
}
