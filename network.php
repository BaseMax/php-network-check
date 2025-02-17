<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$TELEGRAM_BOT_TOKEN = "***********:***********-***********";
$TELEGRAM_CHAT_ID = "-***********";

function sendToTelegram($message) {
    global $TELEGRAM_BOT_TOKEN, $TELEGRAM_CHAT_ID;
    $url = "https://api.telegram.org/bot$TELEGRAM_BOT_TOKEN/sendMessage";
    $data = [
        "chat_id" => $TELEGRAM_CHAT_ID,
        "text" => $message,
        "parse_mode" => "Markdown"
    ];

    $options = [
        "http" => [
            "header" => "Content-Type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];
$requestHeaders = getallheaders();
$requestBody = file_get_contents("php://input");

$uploadedFiles = [];
if (!empty($_FILES)) {
    foreach ($_FILES as $file) {
        $uploadedFiles[] = [
            "name" => $file["name"],
            "type" => $file["type"],
            "size" => $file["size"],
        ];
    }
}

$requestDetails = [
    "time" => date("c"),
    "method" => $requestMethod,
    "url" => $requestUri,
    "headers" => $requestHeaders,
    "body" => !empty($requestBody) ? $requestBody : "N/A",
    "files" => !empty($uploadedFiles) ? $uploadedFiles : "No files uploaded",
];

$logMessage = "📢 *New Request Received* 📢\n" .
    "🕒 *Time:* `{$requestDetails['time']}`\n" .
    "🔗 *URL:* `{$requestDetails['url']}`\n" .
    "🔵 *Method:* `{$requestDetails['method']}`\n" .
    "🛠 *Headers:* ```json\n" . json_encode($requestDetails['headers'], JSON_PRETTY_PRINT) . "\n```\n" .
    "📦 *Body:* ```json\n" . json_encode($requestDetails['body'], JSON_PRETTY_PRINT) . "\n```\n" .
    "📂 *Files:* ```json\n" . json_encode($requestDetails['files'], JSON_PRETTY_PRINT) . "\n```";

error_log($logMessage);
sendToTelegram($logMessage);

header("Content-Type: application/json");
echo json_encode([
    "status" => "success",
    "message" => "Request logged successfully",
    "requestDetails" => $requestDetails,
]);
