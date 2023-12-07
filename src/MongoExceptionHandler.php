<?php

namespace MongoExceptionHandler;

use MongoDB\Driver\Exception\BulkWriteException;

class MongoExceptionHandler
{
    public static function getMessage(BulkWriteException $e)
    {
        $writeErrors = $e->getWriteResult()->getWriteErrors();
        $errorLog = $writeErrors[0]->getInfo();
        if ($errorLog && property_exists($errorLog, 'details')) {
            $formattedError = json_encode($errorLog->details, JSON_PRETTY_PRINT);
            $errorMsgs  = "Exception:\n\n{$formattedError}";
        } else {
            $errorMsgs ="Exception occurred, but 'details' property not found in error log.";
        }
        return $errorMsgs;
    }
}