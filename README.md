# php-network-check

## Setup

```
git clone https://github.com/BaseMax/php-network-check
cd php-network-check
```

## Using

```sh
$ php -S 0.0.0.0:9094
```

![php-network-check](demo.jpg)

### Network Report

```
📢 New Request Received 📢
🕒 Time: 2025-02-15T17:55:14.127Z
🔗 URL: /one/two/custm-json
🔵 Method: POST
🛠 Headers: {
  "host": "test.cooffice.ir",
  "accept-encoding": "gzip, deflate, br, zstd",
  "connection": "close",
  "x-real-ip": "3.9.114.155",
  "true-client-ip": "3.9.114.155",
  "x-forwarded-proto": "https",
  "x-forwarded-port": "443",
  "x-forwarded-for": "3.9.114.155",
  "x-request-id": "bc98570ec84e75d3fc2df981bdc73257",
  "x-served-by": "LAX-APT-1",
  "content-length": "25",
  "sec-ch-ua-platform": "\"Windows\"",
  "user-agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36",
  "sec-ch-ua": "\"Not(A:Brand\";v=\"99\", \"Google Chrome\";v=\"133\", \"Chromium\";v=\"133\"",
  "content-type": "application/json",
  "sec-ch-ua-mobile": "?0",
  "accept": "*/*",
  "origin": "chrome-extension://ihgpcfpkpmdcghlnaofdmjkoemnlijdi",
  "sec-fetch-site": "none",
  "sec-fetch-mode": "cors",
  "sec-fetch-dest": "empty",
  "sec-fetch-storage-access": "active",
  "accept-language": "en-US,en;q=0.9,fa;q=0.8,it;q=0.7",
  "priority": "u=1, i",
  "cdn-loop": "xaas; count=1"
}

📦 Body: {
  "age": 77,
  "pi": 3.14
}

📂 Files: "No files uploaded"
```

Copyright 2025, Max Base
