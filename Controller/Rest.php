<?php

abstract class Rest
{
    /**
     * @param array $content
     * @param int $statusCode
     *
     * @return string
     */
    protected function jsonResponse(array $content, $statusCode = 200)
    {
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json', null, $statusCode);

        return json_encode($content);
    }

    /**
     * @method GET
     */
    abstract public function getAction();

    /**
     * @method POST
     */
    abstract public function postAction();

    /**
     * @method PUT
     */
    abstract public function putAction();

    /**
     * @method DELETE
     */
    abstract public function deleteAction();
}
