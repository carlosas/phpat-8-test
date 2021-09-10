<?php

namespace Tests\architecture;

use PhpAT\Rule\Rule;
use PhpAT\Selector\Selector;
use PhpAT\Test\ArchitectureTest;

class LayeredArchitectureTest extends ArchitectureTest
{
    public function testDomainDoesNotDependOnApplicationOrInfrastructure(): Rule
    {
        return $this->newRule
            ->classesThat(Selector::haveClassName('Domain\*'))
            ->canOnlyDependOn()
            ->classesThat(Selector::havePath('Domain/*'))
            ->andClassesThat(Selector::haveClassName('Psr\*'))
            ->build();
    }
}
