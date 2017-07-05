<?php

namespace AppBundle\Resolver;


use AppBundle\Api\ApiKeywordInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ApiServiceResolver
 * @package AppBundle\Resolver
 *
 * ApiServiceResolver is a service to found related services from user keywords.
 */
class ApiServiceResolver
{
    /**
     * @var array
     */
    private $parameters;

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container, array $parameters)
    {
        $this->container = $container;
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    private function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return ContainerInterface
     */
    private function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * @param array $keywords
     * @return array
     */
    public function resolveByApiKeyWords(array $keywords): array
    {
        $services = [];
        $container = $this->getContainer();
        foreach ($this->getParameters()['classes'] as $fqcn) {
            $service = $container->get($fqcn);
            if (!$service instanceof ApiKeywordInterface) {
                throw new \LogicException('Class "'.$fqcn.'" must implement \AppBundle\Api\ApiKeywordInterface');
            }

            if (count(array_intersect($keywords, $service::getApiKeywords())) > 0) {
                $services[] = $service;
            }
        }

        return $services;
    }
}