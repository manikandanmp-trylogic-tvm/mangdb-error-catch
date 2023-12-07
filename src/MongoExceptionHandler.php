<?php

namespace MongoExceptionHandler;

use MongoDB\Driver\Exception\BulkWriteException;

class MongoExceptionHandler
{
    public static function getMessage(BulkWriteException $e)
    {
        $writeErrors = $e->getWriteResult()->getWriteErrors();
        $errorLog = $writeErrors[0]->getInfo();
        $errorMsgs = $errorLog->details;
        return $errorMsgs;
    }
}