<?php

use App\Services\Baileys;

/**
 * Retrieves the status of a session based on the given session ID.
 *
 * @param int $id The ID of the session to retrieve the status for.
 * @return mixed The status of the session.
 */
if(! function_exists('sessionStatus')){
    function sessionStatus($id){
        return Baileys::make()->sessionStatus($id);
    }
}

/**
 * Adds a session with the specified ID and legacy status.
 *
 * @param int  $id        The ID of the session to add.
 * @param bool $isLegacy  The legacy status of the session.
 * @return mixed The response object containing the result of adding the session.
 */
if(! function_exists('addSession')){
    function addSession($id, $isLegacy){
        return Baileys::make()->addSession($id, $isLegacy);
    }
}

/**
 * Removes a session with the specified ID.
 *
 * @param int $id The ID of the session to remove.
 * @return mixed The response object containing the result of removing the session.
 */
if(! function_exists('removeSession')){
    function removeSession($id){
        return Baileys::make()->removeSession($id);
    }
}

/**
 * Sends a message to a receiver using the specified ID.
 *
 * @param int|string $id      The ID used for sending the message.
 * @param string     $receiver The receiver's identifier.
 * @param mixed      $message  The message content to be sent.
 * @return array An array containing the receiver, message, and the result of sending the message.
 */
if(! function_exists('sendMessage')){
    function sendMessage($id, $receiver, $message){
        return Baileys::make()->sendMessage($id, $receiver, $message);
    }
}

if(!function_exists('listMessage')){
    function listMessage($id, $limit = null, $cursor = null){
        return Baileys::make()->listMessage($id, $limit, $cursor);
    }
}