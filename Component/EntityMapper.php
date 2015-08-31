<?php

class EntityMapper
{
    /**
     * @var array $errors
     */
    private $errors;

    public function __construct()
    {
        $this->errors = array();
    }

    /**
     * @param Entity $entity
     * @param array $data
     *
     * @return Object
     */
    public function mapper(Entity $entity, array $data)
    {
        if (empty($data)) {
            $this->errors[] = 'The data to set the values to the entity is empty.';
        }

        foreach ($data as $field => $value) {
            $method = $this->buildMethodNameByField($field);

            if (!$this->existsMethod($method, $entity)) {
                $this->errors[] = sprintf('The property "%s" is not valid on the entity', $field);

                continue;
            }

            $entity->$method($value);
        }
    }

    /**
     * @return bool
     */
    public function hasErrors()
    {
        return !empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param string $method
     * @param object $entity
     *
     * @return bool
     */
    private function existsMethod($method, $entity)
    {
        return in_array($method, get_class_methods($entity));
    }

    /**
     * @param string $field
     *
     * @return string
     */
    private function buildMethodNameByField($field)
    {
        $field = str_replace('_', ' ', $field);
        $field = ucwords($field);
        $field = str_replace(' ', '', $field);

        return 'set' . $field;
    }
}
