<?php

class Manager extends UnitOfWork
{
    /**
     * @param Entity $entity
     *
     * @return PDOStatement
     */
    public function save(Entity $entity)
    {
        return $this->saveEntity($entity);
    }

    /**
     * @param Entity $entity
     *
     * @return PDOStatement
     */
    public function update($entity)
    {
        return $this->updateEntity($entity);
    }

    /**
     * @param Object $entity
     */
    public function remove($entity)
    {

    }
}
