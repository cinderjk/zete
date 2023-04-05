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
     *
     *
     * @param bool $isGroup
     * @return string
     */
    public function formatType(bool $isGroup = false)
    {
        return $isGroup ? 'group' : 'number';
    }

    public function sessionStatus($id)
    {
        $response = $this->http->get("sessions/$id/status");

        return $response->object();
    }

    public function addSession($id, $isLegacy)
    {
        // new post
        $data = array(
            'sessionId' => $id,
            'isLegacy' => $isLegacy
        );

        $response = $this->http->asJson()->post('sessions/add', $data);

        return $response->object();
    }

    public function removeSession($id)
    {
        $response = $this->http->asJson()->delete('sessions/delete/' .$id);

        return $response->object();
    }

    public function sendMessages($id, $receiver, $message)
    {
        $receiver = $this->formatJid($receiver);
        $type = $this->formatType();

        // new post
        $data = array(
            'jid' => $receiver,
            'type' => $type,
            'message' => [
                'text' => $message
            ]
        );

        $response = $this->http->asJson()->post($id . '/messages/send', $data);

        $result = [
            'receiver' => $receiver,
            'message' => $message,
            'result' => $response->object()
        ];

        return $result;
    }

    public function chatSend($device_id, $phone, $message)
    {
        $phone = $this->formatJid($phone);
        $type = $this->formatType();

        // new post
        $data = array(
            'jid' => $phone,
            'type' => $type,
            'message' => [
                'text' => $message
            ]
        );

        $response = $this->http->asJson()->post( $device_id . '/messages/send', $data);

        return $response->object();
    }
}
