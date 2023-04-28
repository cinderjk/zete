<?php

namespace App\Services;

use Http;

class Baileys
{
    /**
     * Laravel HTTP Client Facade.
     *
     * @var \Illuminate\Http\Client\PendingRequest|\Illuminate\Support\HigherOrderWhenProxy|mixed
     */
    private $http;

    /**
     * Create a new Service instance.
     *
     * @param string|null $host
     */
    public function __construct(string $host = null)
    {
        $this->http = Http::baseUrl(str($host ?? config('app.wa_api_url'))->finish('/'))
            ->when(app()->environment('local'), function ($http) {
                /** @var Http $http */
                $http->withoutVerifying();
            })
            ->acceptJson();
    }

    /**
     * Create a new Service instance.
     *
     * @param string|null $host
     * @return static
     */
    public static function make(string $host = null)
    {
        return new static($host);
    }

    /**
     *
     *
     * @param string $receiver
     * @param bool $isGroup
     * @return string
     */
    public function formatJid(string $receiver, bool $isGroup = false)
    {
        if (str_contains($receiver, '@')) return $receiver;

        $receiver = (str_starts_with($receiver, '0')) ? ('62' . substr($receiver, 1)) : $receiver;

        return $receiver . ($isGroup ? '@g.us' : '@s.whatsapp.net');
    }

    /**
     * Returns the format type based on the given parameter.
     *
     * @param bool $isGroup A parameter that determines whether the format type is "group" or "number".
     *                     Its default value is `false`.
     * @return string The corresponding format type: "group" if $isGroup is `true`,
     *                and "number" if $isGroup is `false`.
     */
    public function formatType(bool $isGroup = false)
    {
        return $isGroup ? 'group' : 'number';
    }


    // SESSION MANAGEMENT

    /**
     * Retrieves the status of a session based on the given session ID.
     *
     * @param int $id The ID of the session to retrieve the status for.
     * @return mixed The status of the session.
     */
    public function sessionStatus($id)
    {
        $response = $this->http->get("sessions/$id/status");

        return $response->object();
    }


    /**
     * Adds a session with the specified ID and legacy status.
     *
     * @param int  $id        The ID of the session to add.
     * @param bool $isLegacy  The legacy status of the session.
     * @return mixed The response object containing the result of adding the session.
     */
    public function addSession($id, $isLegacy)
    {
        $data = array(
            'sessionId' => $id,
            'isLegacy' => $isLegacy
        );

        $response = $this->http->asJson()->post('sessions/add', $data);

        return $response->object();
    }


    /**
     * Removes a session with the specified ID.
     *
     * @param int $id The ID of the session to remove.
     * @return mixed The response object containing the result of removing the session.
     */
    public function removeSession($id)
    {
        $response = $this->http->asJson()->delete('sessions/' . $id);

        return $response->object();
    }

    // END SESSION MANAGEMENT




    // MESSAGE MANAGEMENT

    /**
     * Sends a message to a receiver using the specified ID.
     *
     * @param int|string $id      The ID used for sending the message.
     * @param string     $receiver The receiver's identifier.
     * @param mixed      $message  The message content to be sent.
     * @return array An array containing the receiver, message, and the result of sending the message.
     */
    public function sendMessage($id, $receiver, $message)
    {
        $receiver = $this->formatJid($receiver);
        $type = $this->formatType();
        $data = [
            'jid' => $receiver,
            'type' => $type,
            'message' => is_array($message) ? $message : ['text' => $message]
        ];

        $response = $this->http->asJson()->post($id . '/messages/send', $data);

        return [
            'receiver' => $receiver,
            'message' => $message,
            'result' => $response->object()
        ];
    }

    /**
     * List messages for a specific ID.
     *
     * @param int|string $id The ID used for sending the message.
     * @param int|null $limit The maximum number of messages to retrieve. Default is 25.
     * @param string|null $cursor A cursor for pagination. Default is null.
     * @return object The response object containing the messages.
     */
    public function listMessage($id, $limit = null, $cursor = null)
    {
        $data = array(
            'limit' => $limit ?? 25,
            'cursor' => $cursor ?? null
        );
        $response = $this->http->asJson()->get($id.'/messages', $data);

        return $response->object();    
    }

    // END MESSAGE MANAGEMENT





    // CONTACT MANAGEMENT
    
    /**
     * Check if a WhatsApp number exists.
     *
     * @param string $id The ID associated with the device.
     * @param string $number The WhatsApp number to check.
     * @return object The response object containing the result of the number check.
     */
    public function checkNumber($id, $number)
    {
        $jid = $this->formatJid($number);
        
        $response = $this->http->asJson()->get($id.'/contacts/'.$jid);

        return $response->object();
    }

    /**
     * Block or unblock a contact.
     *
     * @param string $id The ID associated with the device.
     * @param string $number The WhatsApp number of the contact to block or unblock.
     * @param bool $block Set to true to block the contact, false to unblock. Default is true.
     * @return object The response object containing the result of the block operation.
     */
    public function blockContact($id, $number, $block = true)
    {
        $jid = $this->formatJid($number);
        $data = array(
            'jid' => $jid,
            'action' => $block ? 'block' : 'unblock'
        );
        $response = $this->http->asJson()->post($id.'/contacts/blocklist/update', $data);

        return $response->object();
    }

}
