<?php

abstract class UnitOfWork
{
    /**
     * @const string
     */
    const QUOTE = '"';

    /**
     * @const string
     */
    const PROPERTY_ANNOTATION = '@column(name="';

    /**
     * @const string
     */
    const TABLE_ANNOTATION = '@table(name="';

    /**
     * @var Annotation $annotation
     */
    private $annotation;

    /**
     * @var PDOAdapter $pdoAdapter
     */
    private $pdoAdapter;

    public function __construct()
    {
        $this->annotation = new Annotation();
        $this->pdoAdapter = new PDOAdapter();
    }

    /**
     * @param Entity $entity
     *
     * @return PDOStatement
     */
    protected function saveEntity(Entity $entity)
    {
        $table = $this->getTable($entity);
        $keyValueData = $this->getKeyValuePropertiesByEntity($entity);

        return $this->pdoAdapter->insert($table, $keyValueData);
    }

    /**
     * @param Entity $entity
     *
     * @return PDOStatement
     */
    protected function updateEntity(Entity $entity)
    {
        $table = $this->getTable($entity);
        $keyValueData = $this->getKeyValuePropertiesByEntity($entity);
        $where = null;

        return $this->pdoAdapter->update($table, $keyValueData, $where);
    }

    /**
     * @param Entity $entity
     *
     * @return string
     */
    public function getTable(Entity $entity)
    {
        $annotations = $this->annotation->getAnnotationsByClass($entity);
        $tableName = $this->getValueOfAnnotation($annotations, self::TABLE_ANNOTATION);

        return $tableName;
    }

    /**
     * This functions builds an array (key\value) with entity data, to later insert on the db
     *
     * @param Entity $entity
     *
     * @return array
     */
    private function getKeyValuePropertiesByEntity(Entity $entity)
    {
        $properties = array_keys($entity->getProperties());
        $keyValueProperties = array();

        foreach ($properties as $property) {
            $method = $this->getterMethodToGetPropertyValue($property);
            $propertyValue = $entity->$method();

            if (is_null($propertyValue)) {
                continue;
            }

            $annotations = $this->annotation->getAnnotationsByProperty($property, $entity);
            $propertyKey = $this->getValueOfAnnotation($annotations, self::PROPERTY_ANNOTATION);
            $keyValueProperties[$propertyKey] = $propertyValue;
        }

        return $keyValueProperties;
    }

    /**
     * @param array $annotations
     * @param string $annotationName
     *
     * @return null|string
     */
    private function getValueOfAnnotation(array $annotations, $annotationName)
    {
        $annotationValue = null;

        foreach ($annotations as $annotation) {
            if (false === strpos($annotation, $annotationName)) {
                continue;
            }

            $startPos = strpos($annotation, self::QUOTE);
            $endPos   = strrpos($annotation, self::QUOTE);
            $annotationValue = substr($annotation,  ($startPos + 1), (($endPos - $startPos) - 1));
            break;
        }

        return $annotationValue;
    }

    /**
     * @param string $field
     *
     * @return string
     */
    private function getterMethodToGetPropertyValue($field)
    {
        $field = str_replace('_', ' ', $field);
        $field = ucwords($field);
        $field = str_replace(' ', '', $field);

        return 'get' . $field;
    }
}
