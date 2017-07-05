<?php

namespace AppBundle\Model;


abstract class AbstractApiData
{
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @var array
     */
    protected $data = null;

    /**
     * @var string
     */
    protected $type;

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     * @return AbstractApiData
     */
    public function setErrors(array $errors): AbstractApiData
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @return array|AbstractApiData
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $data
     * @return AbstractApiData
     * @throws \UnexpectedValueException
     */
    public function setData($data): AbstractApiData
    {
        if (is_array($data) || $data instanceof AbstractApiData) {
            $this->data = $data;

            return $this;
        }

        throw new \UnexpectedValueException();
    }

    /**
     * @param $data
     * @return AbstractApiData
     * @throws \UnexpectedValueException
     */
    public function addData($data): AbstractApiData
    {
        if (is_array($data) || $data instanceof AbstractApiData) {
            $this->data = $data;

            return $this;
        }

        throw new \UnexpectedValueException();
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return AbstractApiData
     */
    public function setType(string $type): AbstractApiData
    {
        $this->type = $type;

        return $this;
    }
}