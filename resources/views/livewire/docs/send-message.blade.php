<div>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td>Method</td>
                <td>POST</td>
            </tr>
            <tr>
                <td>URL</td>
                <td>{{ config('app.url') }}/api/chats/send</td>
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
                    <h6 class="mb-0 font-weight-bold">1. Send text message</h6>
                    <div class="row">
                        <div class="col">
                            <pre class="mb-0">{</pre>
                            <pre class="mb-0">  "device_id": "xx",</pre>
                            <pre class="mb-0">  "phone" : "0822xxxxxxx",</pre>
                            <pre class="mb-0">  "message": {</pre>
                            <pre class="mb-0">    "text": "Hello there!"</pre>
                            <pre class="mb-0">  }</pre>
                            <pre class="mb-3">}</pre>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" onclick="copytext()">Copy</button>
                            <script>
                                function copytext() {
                                var data = {
                                    "device_id": "xx",
                                    "phone" : "0822xxxxxxx",
                                    "message": {
                                    "text": "Hello there!"
                                    }
                                };
                                var dataString = JSON.stringify(data, null, 2);
                                var formattedDataString = dataString.replace(/\t/g, "  ");
                                var dummy = document.createElement("textarea");
                                document.body.appendChild(dummy);
                                dummy.value = formattedDataString;
                                dummy.select();
                                document.execCommand("copy");
                                dummy.parentNode.removeChild(dummy);
                                window.dispatchEvent(new Event('copied'));
                                }
                            </script>
                        </div>
                    </div>
                    <hr>

                    <h6 class="mb-0 font-weight-bold">2. Send image message</h6>
                    <div class="row">
                        <div class="col">
                            <pre class="mb-0">{</pre>
                            <pre class="mb-0">  "device_id": "xx",</pre>
                            <pre class="mb-0">  "phone" : "0822xxxxxxx",</pre>
                            <pre class="mb-0">  "message": {</pre>
                            <pre class="mb-0">    "image": {</pre>
                            <pre class="mb-0">      "url": "https://example.com/logo.png"</pre>
                            <pre class="mb-0">     },</pre>
                            <pre class="mb-0">    "caption": "My logo"</pre>
                            <pre class="mb-0">  }</pre>
                            <pre class="mb-3">}</pre>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" onclick="copyimage()">Copy</button>
                            <script>
                                function copyimage() {
                                var data = {
                                    "device_id": "xx",
                                    "phone" : "0822xxxxxxx",
                                    "message": {
                                        "image": {
                                        "url": "https://example.com/logo.png"
                                        },
                                        "caption": "My logo"
                                    }
                                };
                                var dataString = JSON.stringify(data, null, 2);
                                var formattedDataString = dataString.replace(/\t/g, "  ");
                                var dummy = document.createElement("textarea");
                                document.body.appendChild(dummy);
                                dummy.value = formattedDataString;
                                dummy.select();
                                document.execCommand("copy");
                                dummy.parentNode.removeChild(dummy);
                                window.dispatchEvent(new Event('copied'));
                                }
                            </script>
                        </div>
                    </div>
                    <hr>

                    <h6 class="mb-0 font-weight-bold">3. Send video message</h6>
                    <div class="row">
                        <div class="col">
                            <pre class="mb-0">{</pre>
                            <pre class="mb-0">  "device_id": "xx",</pre>
                            <pre class="mb-0">  "phone" : "0822xxxxxxx",</pre>
                            <pre class="mb-0">  "message": {</pre>
                            <pre class="mb-0">    "video": {</pre>
                            <pre class="mb-0">      "url": "https://example.com/intro.mp4"</pre>
                            <pre class="mb-0">    },</pre>
                            <pre class="mb-0">    "caption": "My intro"</pre>
                            <pre class="mb-0">  }</pre>
                            <pre class="mb-3">}</pre>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" onclick="copyvideo()">Copy</button>
                            <script>
                                function copyvideo() {
                                var data = {
                                    "device_id": "xx",
                                    "phone" : "0822xxxxxxx",
                                    "message": {
                                        "video": {
                                        "url": "https://example.com/intro.mp4"
                                        },
                                        "caption": "My intro"
                                    }
                                };
                                var dataString = JSON.stringify(data, null, 2);
                                var formattedDataString = dataString.replace(/\t/g, "  ");
                                var dummy = document.createElement("textarea");
                                document.body.appendChild(dummy);
                                dummy.value = formattedDataString;
                                dummy.select();
                                document.execCommand("copy");
                                dummy.parentNode.removeChild(dummy);
                                window.dispatchEvent(new Event('copied'));
                                }
                            </script>
                        </div>
                    </div>
                    <hr>

                    <h6 class="mb-0 font-weight-bold">4. Send document message</h6>
                    <div class="row">
                        <div class="col">
                            <pre class="mb-0">{</pre>
                            <pre class="mb-0">  "device_id": "xx",</pre>
                            <pre class="mb-0">  "phone" : "0822xxxxxxx",</pre>
                            <pre class="mb-0">  "message": {</pre>
                            <pre class="mb-0">    "document": {</pre>
                            <pre class="mb-0">      "url": "https://example.com/presentation.pdf"</pre>
                            <pre class="mb-0">    },</pre>
                            <pre class="mb-0">    "mimetype": "application/pdf"</pre>
                            <pre class="mb-0">    "fileName": "presentation-1.pdf"</pre>
                            <pre class="mb-0">  }</pre>
                            <pre class="mb-3">}</pre>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" onclick="copydoc()">Copy</button>
                            <script>
                                function copydoc() {
                                var data = {
                                    "device_id": "xx",
                                    "phone" : "0822xxxxxxx",
                                    "message": {
                                        "document": {
                                        "url": "https://example.com/presentation.pdf"
                                        },
                                        "mimetype": "application/pdf",
                                        "fileName": "presentation-1.pdf"
                                    }
                                };
                                var dataString = JSON.stringify(data, null, 2);
                                var formattedDataString = dataString.replace(/\t/g, "  ");
                                var dummy = document.createElement("textarea");
                                document.body.appendChild(dummy);
                                dummy.value = formattedDataString;
                                dummy.select();
                                document.execCommand("copy");
                                dummy.parentNode.removeChild(dummy);
                                window.dispatchEvent(new Event('copied'));
                                }
                            </script>
                        </div>
                    </div>
                    <hr>

                    <h6 class="mb-0 font-weight-bold">5. Send location message</h6>
                    <div class="row">
                        <div class="col">
                            <pre class="mb-0">{</pre>
                            <pre class="mb-0">  "device_id": "xx",</pre>
                            <pre class="mb-0">  "phone" : "0822xxxxxxx",</pre>
                            <pre class="mb-0">  "message": {</pre>
                            <pre class="mb-0">    "location": {</pre>
                            <pre class="mb-0">      "degreesLatitude": 24.121231,</pre>
                            <pre class="mb-0">      "degreesLongitude": 55.1121221</pre>
                            <pre class="mb-0">    }</pre>
                            <pre class="mb-0">  }</pre>
                            <pre class="mb-3">}</pre>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" onclick="copylocation()">Copy</button>
                            <script>
                                function copylocation() {
                                var data = {
                                    "device_id": "xx",
                                    "phone" : "0822xxxxxxx",
                                    "message": {
                                        "location": {
                                        "degreesLatitude": 24.121231,
                                        "degreesLongitude": 55.1121221
                                        }
                                    }
                                };
                                var dataString = JSON.stringify(data, null, 2);
                                var formattedDataString = dataString.replace(/\t/g, "  ");
                                var dummy = document.createElement("textarea");
                                document.body.appendChild(dummy);
                                dummy.value = formattedDataString;
                                dummy.select();
                                document.execCommand("copy");
                                dummy.parentNode.removeChild(dummy);
                                window.dispatchEvent(new Event('copied'));
                                }
                            </script>
                        </div>
                    </div>
                    <hr>

                    <h6 class="mb-0 font-weight-bold">6. Send a buttons message</h6>
                    <div class="row">
                        <div class="col">
                            <pre class="mb-0">{</pre>
                            <pre class="mb-0">  "device_id": "xx",</pre>
                            <pre class="mb-0">  "phone" : "0822xxxxxxx",</pre>
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
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" onclick="copybutton()">Copy</button>
                            <script>
                                function copybutton() {
                                var data = {
                                    "device_id": "xx",
                                    "phone" : "0822xxxxxxx",
                                    "message": {
                                        "text": "Hi it s button message",
                                        "footer": "Hello World",
                                        "buttons": [
                                            {
                                                "buttonId": "id1",
                                                "buttonText": {
                                                "displayText": "Button 1"
                                                },
                                                "type": 1
                                            },
                                            {
                                                "buttonId": "id2",
                                                "buttonText": {
                                                "displayText": "Button 2"
                                                },
                                                "type": 1
                                            },
                                            {
                                                "buttonId": "id3",
                                                "buttonText": {
                                                "displayText": "Button 3"
                                                },
                                                "type": 1
                                            }
                                        ],
                                    "headerType" : 1
                                    }
                                };
                                var dataString = JSON.stringify(data, null, 2);
                                var formattedDataString = dataString.replace(/\t/g, "  ");
                                var dummy = document.createElement("textarea");
                                document.body.appendChild(dummy);
                                dummy.value = formattedDataString;
                                dummy.select();
                                document.execCommand("copy");
                                dummy.parentNode.removeChild(dummy);
                                window.dispatchEvent(new Event('copied'));
                                }
                            </script>
                        </div>
                    </div>
                    <hr>

                    <h6 class="mb-0 font-weight-bold">7. Send a list message</h6>
                    <div class="row">
                        <div class="col">
                            <pre class="mb-0">{</pre>
                            <pre class="mb-0">  "device_id": "xx",</pre>
                            <pre class="mb-0">  "phone" : "0822xxxxxxx",</pre>
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
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" onclick="copylist()">Copy</button>
                            <script>
                                function copylist() {
                                var data = {
                                    "device_id": "xx",
                                    "phone" : "0822xxxxxxx",
                                    "message": {
                                        "text": "Hi it is a list message",
                                        "footer": "Hello World",
                                        "title": "Amazing boldfaced list title",
                                        "buttonText": "Required, text on the button to view the list",
                                        "sections": [
                                            {
                                                "title": "Section 1",
                                                "rows": [
                                                {
                                                    "title": "Option 1",
                                                    "rowId": "option1"
                                                },
                                                {
                                                    "title": "Option 2",
                                                    "rowId": "option2",
                                                    "description": "This is a description"
                                                }
                                                ]
                                            },
                                            {
                                                "title": "Section 2",
                                                "rows": [
                                                {
                                                    "title": "Option 3",
                                                    "rowId": "option3"
                                                },
                                                {
                                                    "title": "Option 4",
                                                    "rowId": "option4",
                                                    "description": "This is a description V2"
                                                }
                                                ]
                                            }
                                        ]
                                    }
                                };
                                var dataString = JSON.stringify(data, null, 2);
                                var formattedDataString = dataString.replace(/\t/g, "  ");
                                var dummy = document.createElement("textarea");
                                document.body.appendChild(dummy);
                                dummy.value = formattedDataString;
                                dummy.select();
                                document.execCommand("copy");
                                dummy.parentNode.removeChild(dummy);
                                window.dispatchEvent(new Event('copied'));
                                }
                            </script>
                        </div>
                    </div>
                    <hr>

                    <h6 class="mb-0 font-weight-bold">8. Send a template message</h6>
                    <div class="row">
                        <div class="col">
                            <pre class="mb-0">{</pre>
                            <pre class="mb-0">  "device_id": "xx",</pre>
                            <pre class="mb-0">  "phone" : "0822xxxxxxx",</pre>
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
                            <pre class="mb-0">          "phoneNumber": "01234567890"</pre>
                            <pre class="mb-0">        }</pre>
                            <pre class="mb-0">      },</pre>
                            <pre class="mb-0">      {</pre>
                            <pre class="mb-0">        "index": 3,</pre>
                            <pre class="mb-0">        "quickReplyButton": {</pre>
                            <pre
                                class="mb-0">          "displayText": "This is a reply, just like normal buttons!",</pre>
                            <pre class="mb-0">          "id": "id-like-buttons-message"</pre>
                            <pre class="mb-0">        }</pre>
                            <pre class="mb-0">      }</pre>
                            <pre class="mb-0">    ]</pre>
                            <pre class="mb-0">  }</pre>
                            <pre class="mb-3">}</pre>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" onclick="copytemplate()">Copy</button>
                            <script>
                                function copytemplate() {
                                var data = {
                                    "device_id": "xx",
                                    "phone" : "0822xxxxxxx",
                                    "message": {
                                        "text": "Hi it is a template message",
                                        "footer": "Hello World",
                                        "templateButtons": [
                                        {
                                            "index": 1,
                                            "urlButton": {
                                            "displayText": "Zete",
                                            "url": "http://zete.my"
                                            }
                                        },
                                        {
                                            "index": 2,
                                            "callButton": {
                                            "displayText": "Call Me!",
                                            "phoneNumber": "01234567890"
                                            }
                                        },
                                        {
                                            "index": 3,
                                            "quickReplyButton": {
                                            "displayText": "This is a reply, just like normal buttons!",
                                            "id": "id-like-buttons-message"
                                            }
                                        }
                                        ]
                                    }
                                };
                                var dataString = JSON.stringify(data, null, 2);
                                var formattedDataString = dataString.replace(/\t/g, "  ");
                                var dummy = document.createElement("textarea");
                                document.body.appendChild(dummy);
                                dummy.value = formattedDataString;
                                dummy.select();
                                document.execCommand("copy");
                                dummy.parentNode.removeChild(dummy);
                                window.dispatchEvent(new Event('copied'));
                                }
                            </script>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Example PHP</td>
                <td>
                    <pre class="mb-0">$url = '{{ config('app.url') }}/api/chats/send';</pre>
                    <pre
                        class="mb-0">$data = '{"device_id": "xx","phone" : "0822xxxxxxx","message": { text: "Hello there!" }}';</pre>
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

    @push('scripts')
    <script>
        window.addEventListener('copied', function(e){
            $.notify({message: 'Text Copied'},{type: 'success'});
            e.preventDefault();
        });
    </script>
    @endpush
</div>