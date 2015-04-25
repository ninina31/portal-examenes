<?php

namespace MySQL\Infrastructure\Symfony;

use MySQL\Infrastructure\Symfony\DependencyInjection\MySQLExtension;
use SimpleBus\SymfonyBridge\DependencyInjection\Compiler\RegisterHandlers;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MySQLBundle extends Bundle
{
    private $configurationAlias;
    public function __construct($alias = 'mysql')
    {
        $this->configurationAlias = $alias;
    }
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(
            new RegisterHandlers(
                'mysql.query_handler_map',
                'query_handler',
                'handles'
            )
        );
    }
    public function getContainerExtension()
    {
        return new MySQLExtension($this->configurationAlias);
    }
}
