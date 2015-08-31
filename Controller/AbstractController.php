<?php

abstract class AbstractController extends Rest
{
    /**
     * @const string
     */
    const PERSISTED_ERROR = 'an error occurred when saving the data';

    /**
     * @var Entity $entityName
     */
    protected $entityName;

    /**
     * @var EntityMapper $entityMapper
     */
    protected $entityMapper;

    /**
     * @var Manager $manager
     */
    protected $manager;

    public function __construct()
    {
        $this->entityName  = str_replace('Rest', '', get_class($this));
        $this->manager = new Manager();
        $this->entityMapper = new EntityMapper();
    }

    /**
     * @method GET
     */
    public function getAction()
    {
        return $this->jsonResponse(array('Hallo Welt!'));
    }

    /**
     * @method POST
     */
    public function postAction()
    {
        /** @var Entity $entity */
        $entity = new $this->entityName();
        $this->entityMapper->mapper($entity, $_POST);

        if ($this->entityMapper->hasErrors()) {
            return $this->jsonResponse(
                $this->entityMapper->getErrors(),
                400
            );
        }

        $persisted = $this->manager->save($entity);

        if (!$persisted) {
            return $this->jsonResponse(
                array('error' => self::PERSISTED_ERROR),
                400
            );
        }

        return $this->jsonResponse(
            array('success' => 'Alles Gut!')
        );
    }

    /**
     * @method PUT
     */
    public function putAction()
    {
        return $this->jsonResponse($_REQUEST); // It's only temporal
    }

    /**
     * @method DELETE
     */
    public function deleteAction()
    {
        return $this->jsonResponse($_REQUEST); // The same here
    }
}
