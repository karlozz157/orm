<?php

class Annotation
{
    /**
     * @param string $className
     *
     * @return array
     */
    public function getAnnotationsByClass($className)
    {
        $reflectionClass = new ReflectionClass($className);

        return $this->getAnnotations($reflectionClass);
    }

    /**
     * @param string $methodName
     * @param string $className
     *
     * @return array
     */
    public function getAnnotationsByMethod($methodName, $className)
    {
        $reflectionMethod = new ReflectionMethod($className, $methodName);

        return $this->getAnnotations($reflectionMethod);
    }

    /**
     * @param string $className
     *
     * @return array
     */
    public function getAnnotationsPropertiesByClass($className)
    {
        $reflectionClass = new ReflectionClass($className);
        $properties = $reflectionClass->getProperties(ReflectionProperty::IS_PRIVATE);
        $annotationsProperties = array();

        foreach ($properties as $property) {
            $annotations = $this->getAnnotationsByProperty($property->name, $className);

            $data = array(
                'property'    => $property,
                'annotations' => $annotations,
            );

            $annotationsProperties[] = $data;
        }

        return $annotationsProperties;
    }

    public function getAnnotationsByProperty($property, $className)
    {
        $reflectionProperty = new ReflectionProperty($className, $property);

        return $this->getAnnotations($reflectionProperty);
    }

    /**
     * @param Reflector $reflector
     *
     * @return array
     */
    private function getAnnotations(Reflector $reflector)
    {
        $annotations = explode(PHP_EOL, $reflector->getDocComment());
        $annotations = array_map(array($this, 'cleanMultipleComment'), $annotations);

        return array_filter($annotations);
    }

    /**
     * @param string $string
     *
     * @return string
     */
    private function cleanMultipleComment($string)
    {
        return trim(str_replace(array('/*','*/', '*'), '', ($string)));
    }
}
