<?php

class CompanyRest extends Rest
{
    /**
     * @method GET
     */
    public function getAction()
    {
        return $this->jsonResponse(array('message' => 'Ich bin GET'));
    }

    /**
     * @method POST
     */
    public function postAction()
    {
        $this->manager->save(null);

        return $this->jsonResponse($_POST);
    }

    /**
     * @method PUT
     */
    public function putAction()
    {
        $this->manager->update(null);

        return $this->jsonResponse(array('message' => 'Ich bin PUT'));
    }

    /**
     * @method DELETE
     */
    public function deleteAction()
    {
        $this->manager->remove(null);

        return $this->jsonResponse(array('message' => 'Ich bin DELETE'));
    }
}
