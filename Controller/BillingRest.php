<?php

class BillingRest extends Rest
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
        return $this->jsonResponse($_POST);
    }

    /**
     * @method PUT
     */
    public function putAction()
    {
        return $this->jsonResponse(array('message' => 'Ich bin PUT'));
    }

    /**
     * @method DELETE
     */
    public function deleteAction()
    {
        return $this->jsonResponse(array('message' => 'Ich bin DELETE'));
    }
}
