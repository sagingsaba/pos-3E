<?php
session_start();
$datajs = file_get_contents("php://input");
var_dump($datajs);

$data = json_decode($datajs, true);


if (isset($data)) {
    $amount = $data['amount']; // Store the amount in a variable
    $desc = "Payment Option BananaCart";
    $remarks = "on the receipt";
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.paymongo.com/v1/links",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'data' => [
                'attributes' => [
                    'amount' => $amount,  // Use the variable here
                    'description' => $desc, // Description for the payment
                    'remarks' => $remarks, // Remarks or additional information
                ]
            ]
        ]),
        CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "authorization: Basic c2tfdGVzdF85U2tHWVIyTlVuSlQ4cUg4cURBYVZySkw6",
            "content-type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $responseData = json_decode($response, true);

        if (isset($responseData['data']['attributes']['checkout_url'])) {
            echo $responseData['data']['attributes']['checkout_url'];
            $_SESSION['link'] = $responseData;
        } else {
            echo "Error: Unable to retrieve checkout URL from response.";
        }
    }
} else {
    echo "No data received.";
}

