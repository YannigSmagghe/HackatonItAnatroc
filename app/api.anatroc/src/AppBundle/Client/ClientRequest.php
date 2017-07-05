<?php

namespace AppBundle\Client;


class ClientRequest
{
    /**
     * @var null|array
     */
    private $localisation = null;

    /**
     * @var array
     */
    private $parameters = [];

    /**
     * @return array|null
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @param array|null $localisation
     * @return ClientRequest
     */
    public function setLocalisation(array $localisation)
    {
        $this->localisation = $localisation;
        return $this;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     * @return ClientRequest
     */
    public function setParameters(array $parameters): ClientRequest
    {
        $this->parameters = $parameters;
        return $this;
    }
}