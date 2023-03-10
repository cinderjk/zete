<div>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td>Method</td>
                <td>POST</td>
            </tr>
            <tr>
                <td>URL</td>
                <td>{{ config('app.url') }}/api/v1/chats</td>
            </tr>
            <tr>
                <td>Format Data</td>
                <td>JSON</td>
            </tr>
            <tr>
                <td>Header</td>
                <td>
                    Authorization: Bearer [api_key]
                </td>
            </tr>
            <tr>
                <td>Body</td>
                <td>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "device_id": "xx",</pre>
                    <pre class="mb-0">  "limit" : 25,</pre>
                    <pre class="mb-3">}</pre>
                </td>
            </tr>
            <tr>
                <td>Response</td>
                <td>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "success": true,</pre>
                    <pre class="mb-0">  "message" : "",</pre>
                    <pre class="mb-0">  "data": []</pre>
                    <pre class="mb-3">}</pre>
                </td>
            </tr>
            <tr>
                <td>Example PHP</td>
                <td>
                    <pre class="mb-0">$url = '{{ config('app.url') }}/api/chats';</pre>
                    <pre
                        class="mb-0">$data = '{"device_id": "xx"}';</pre>
                    <pre class="mb-3">$authorization = "Authorization: Bearer [api_key]";</pre>

                    <pre class="mb-0">$ch = curl_init($url);</pre>
                    <pre class="mb-0">curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);</pre>
                    <pre class="mb-0">curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);</pre>
                    <pre class="mb-0">curl_setopt($ch, CURLOPT_POST, 1);</pre>
                    <pre class="mb-0">curl_setopt($ch, CURLOPT_POSTFIELDS, $data);</pre>
                    <pre
                        class="mb-0">curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization));</pre>
                    <pre class="mb-0">curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);</pre>
                    <pre class="mb-0">curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);</pre>
                    <pre class="mb-0">$result = curl_exec($ch);</pre>
                    <pre class="mb-3">curl_close($ch);</pre>
                    <pre class="mb-0">print_r ($result);</pre>
                </td>
            </tr>
        </tbody>
    </table>
</div>