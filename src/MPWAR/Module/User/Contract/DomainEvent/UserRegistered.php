<?php

namespace MPWAR\Module\User\Contract\DomainEvent;

use DateTimeImmutable;
use SimpleBus\Message\Type\Event;

final class UserRegistered implements Event
{
    private $aggregateId;
    private $occurredOn;
    private $type;
    
    public function __construct(DateTimeImmutable $occurredOn, $type)
    {
        $this->occurredOn  = $occurredOn;
        $this->type        = $type;
    }
    public function aggregateId()
    {
        return $this->aggregateId;
    }
    public function occurredOn()
    {
        return $this->occurredOn;
    }
    public function type()
    {
        return $this->type;
    }
}
