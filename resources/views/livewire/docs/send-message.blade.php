<div>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td>Method</td>
                <td>POST</td>
            </tr>
            <tr>
                <td>URL</td>
                <td>{{ config('app.url') }}/api/v1/chats/send</td>
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
                    <h6 class="mb-0 font-weight-bold">// Send text message</h6>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "device_id": "xx",</pre>
                    <pre class="mb-0">  "phone" : "62822xxxxxxx",</pre>
                    <pre class="mb-0">  "message": {</pre>
                    <pre class="mb-0">    "text": "Hello there!"</pre>
                    <pre class="mb-0">  }</pre>
                    <pre class="mb-3">}</pre>

                    <h6 class="mb-0 font-weight-bold">// Send image message</h6>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "device_id": "xx",</pre>
                    <pre class="mb-0">  "phone" : "62822xxxxxxx",</pre>
                    <pre class="mb-0">  "message": {</pre>
                    <pre class="mb-0">    "image": {</pre>
                    <pre class="mb-0">      "url": "https://example.com/logo.png"</pre>
                    <pre class="mb-0">     },</pre>
                    <pre class="mb-0">    "caption": "My logo"</pre>
                    <pre class="mb-0">  }</pre>
                    <pre class="mb-3">}</pre>

                    <h6 class="mb-0 font-weight-bold">// Send video message</h6>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "device_id": "xx",</pre>
                    <pre class="mb-0">  "phone" : "62822xxxxxxx",</pre>
                    <pre class="mb-0">  "message": {</pre>
                    <pre class="mb-0">    "video": {</pre>
                    <pre class="mb-0">      "url": "https://example.com/intro.mp4"</pre>
                    <pre class="mb-0">    },</pre>
                    <pre class="mb-0">    "caption": "My intro"</pre>
                    <pre class="mb-0">  }</pre>
                    <pre class="mb-3">}</pre>

                    <h6 class="mb-0 font-weight-bold">// Send document message</h6>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "device_id": "xx",</pre>
                    <pre class="mb-0">  "phone" : "62822xxxxxxx",</pre>
                    <pre class="mb-0">  "message": {</pre>
                    <pre class="mb-0">    "document": {</pre>
                    <pre class="mb-0">      "url": "https://example.com/presentation.pdf"</pre>
                    <pre class="mb-0">    },</pre>
                    <pre class="mb-0">    "mimetype": "application/pdf"</pre>
                    <pre class="mb-0">    "fileName": "presentation-1.pdf"</pre>
                    <pre class="mb-0">  }</pre>
                    <pre class="mb-3">}</pre>

                    <h6 class="mb-0 font-weight-bold">// Send location message</h6>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "device_id": "xx",</pre>
                    <pre class="mb-0">  "phone" : "62822xxxxxxx",</pre>
                    <pre class="mb-0">  "message": {</pre>
                    <pre class="mb-0">    "location": {</pre>
                    <pre class="mb-0">      "degreesLatitude": 24.121231,</pre>
                    <pre class="mb-0">      "degreesLongitude": 55.1121221</pre>
                    <pre class="mb-0">    }</pre>
                    <pre class="mb-0">  }</pre>
                    <pre class="mb-3">}</pre>

                    <h6 class="mb-0 font-weight-bold">// Send a buttons message</h6>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "device_id": "xx",</pre>
                    <pre class="mb-0">  "phone" : "62822xxxxxxx",</pre>
                    <pre class="mb-0">  "message": {</pre>
                    <pre class="mb-0">    "text": "Hi it s button message",</pre>
                    <pre class="mb-0">    "footer": "Hello World",</pre>
                    <pre class="mb-0">    "buttons": [</pre>
                    <pre class="mb-0">      {</pre>
                    <pre class="mb-0">        "buttonId": "id1",</pre>
                    <pre class="mb-0">        "buttonText": {</pre>
                    <pre class="mb-0">          "displayText": "Button 1"</pre>
                    <pre class="mb-0">        },</pre>
                    <pre class="mb-0">        "type": 1</pre>
                    <pre class="mb-0">      },</pre>
                    <pre class="mb-0">      {</pre>
                    <pre class="mb-0">        "buttonId": "id2",</pre>
                    <pre class="mb-0">        "buttonText": {</pre>
                    <pre class="mb-0">          "displayText": "Button 2"</pre>
                    <pre class="mb-0">        },</pre>
                    <pre class="mb-0">        "type": 1</pre>
                    <pre class="mb-0">      },</pre>
                    <pre class="mb-0">      {</pre>
                    <pre class="mb-0">        "buttonId": "id3",</pre>
                    <pre class="mb-0">        "buttonText": {</pre>
                    <pre class="mb-0">          "displayText": "Button 3"</pre>
                    <pre class="mb-0">        },</pre>
                    <pre class="mb-0">        "type": 1</pre>
                    <pre class="mb-0">      }</pre>
                    <pre class="mb-0">    ],</pre>
                    <pre class="mb-0">  "headerType" : 1</pre>
                    <pre class="mb-0">  }</pre>
                    <pre class="mb-3">}</pre>

                    <h6 class="mb-0 font-weight-bold">// Send a list message</h6>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "device_id": "xx",</pre>
                    <pre class="mb-0">  "phone" : "62822xxxxxxx",</pre>
                    <pre class="mb-0">  "message": {</pre>
                    <pre class="mb-0">    "text": "Hi it s button message",</pre>
                    <pre class="mb-0">    "footer": "Hello World",</pre>
                    <pre class="mb-0">    "title": "Amazing boldfaced list title",</pre>
                    <pre class="mb-0">    "buttonText": "Required, text on the button to view the list",</pre>
                    <pre class="mb-0">    "sections": [</pre>
                    <pre class="mb-0">      {</pre>
                    <pre class="mb-0">        "title": "Section 1",</pre>
                    <pre class="mb-0">        "rows": [</pre>
                    <pre class="mb-0">          {</pre>
                    <pre class="mb-0">            "title": "Option 1",</pre>
                    <pre class="mb-0">            "rowId": "option1"</pre>
                    <pre class="mb-0">          },</pre>
                    <pre class="mb-0">          {</pre>
                    <pre class="mb-0">            "title": "Option 2",</pre>
                    <pre class="mb-0">            "rowId": "option2",</pre>
                    <pre class="mb-0">            "description": "This is a description"</pre>
                    <pre class="mb-0">          }</pre>
                    <pre class="mb-0">        ]</pre>
                    <pre class="mb-0">      },</pre>
                    <pre class="mb-0">      {</pre>
                    <pre class="mb-0">        "title": "Section 2",</pre>
                    <pre class="mb-0">        "rows": [</pre>
                    <pre class="mb-0">          {</pre>
                    <pre class="mb-0">            "title": "Option 3",</pre>
                    <pre class="mb-0">            "rowId": "option3"</pre>
                    <pre class="mb-0">          },</pre>
                    <pre class="mb-0">          {</pre>
                    <pre class="mb-0">            "title": "Option 4",</pre>
                    <pre class="mb-0">            "rowId": "option4",</pre>
                    <pre class="mb-0">            "description": "This is a description V2"</pre>
                    <pre class="mb-0">          }</pre>
                    <pre class="mb-0">        ]</pre>
                    <pre class="mb-0">      }</pre>
                    <pre class="mb-0">    ]</pre>
                    <pre class="mb-0">  }</pre>
                    <pre class="mb-3">}</pre>

                    <h6 class="mb-0 font-weight-bold">// Send a template message</h6>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "device_id": "xx",</pre>
                    <pre class="mb-0">  "phone" : "62822xxxxxxx",</pre>
                    <pre class="mb-0">  "message": {</pre>
                    <pre class="mb-0">    "text": "Hi it s button message",</pre>
                    <pre class="mb-0">    "footer": "Hello World",</pre>
                    <pre class="mb-0">    "templateButtons": [</pre>
                    <pre class="mb-0">      {</pre>
                    <pre class="mb-0">        "index": 1,</pre>
                    <pre class="mb-0">        "urlButton": {</pre>
                    <pre class="mb-0">          "displayText": "{{ config('app.name') }}",</pre>
                    <pre class="mb-0">          "url": "{{ config('app.url') }}"</pre>
                    <pre class="mb-0">        }</pre>
                    <pre class="mb-0">      },</pre>
                    <pre class="mb-0">      {</pre>
                    <pre class="mb-0">        "index": 2,</pre>
                    <pre class="mb-0">        "callButton": {</pre>
                    <pre class="mb-0">          "displayText": "Call Me!",</pre>
                    <pre class="mb-0">          "phoneNumber": "621234567890"</pre>
                    <pre class="mb-0">        }</pre>
                    <pre class="mb-0">      },</pre>
                    <pre class="mb-0">      {</pre>
                    <pre class="mb-0">        "index": 3,</pre>
                    <pre class="mb-0">        "quickReplyButton": {</pre>
                    <pre class="mb-0">          "displayText": "This is a reply, just like normal buttons!",</pre>
                    <pre class="mb-0">          "id": "id-like-buttons-message"</pre>
                    <pre class="mb-0">        }</pre>
                    <pre class="mb-0">      }</pre>
                    <pre class="mb-0">    ]</pre>
                    <pre class="mb-0">  }</pre>
                    <pre class="mb-3">}</pre>
                </td>
            </tr>
            <tr>
                <td>Response</td>
                <td>
                    <pre class="mb-0">{</pre>
                    <pre class="mb-0">  "success": true,</pre>
                    <pre class="mb-0">  "message" : "The message has been successfully sent.",</pre>
                    <pre class="mb-0">  "data": {}</pre>
                    <pre class="mb-3">}</pre>
                </td>
            </tr>
            <tr>
                <td>Example PHP</td>
                <td>
                    <pre class="mb-0">$url = '{{ config('app.url') }}/api/chats/send';</pre>
                    <pre
                        class="mb-0">$data = '{"device_id": "xx","phone" : "62822xxxxxxx","message": { text: 'Hello there!' }}';</pre>
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