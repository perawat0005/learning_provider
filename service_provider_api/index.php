<?php

$code = $_GET['code']; // code ที่ได้จากการกด Link
$state = $_GET['state']; // state ที่ได้จากการกด Link เป็นข้อมูลที่ใช้สำหรับการ Redirect กลับไปที่ website ไหน


$params = [
    "grant_type" => "authorization_code",
    "code" => $code, // Code ที่ได้จากการกด Link
    "redirect_uri" => "XXX", // url ที่ลงทะเบียนขอใช้ API Provider ID
    "client_id" => "XXX", // Client ID ของ Health ID
    "client_secret" => "XXX" // Secret ID ของ Health ID
];

$params_urlencode = http_build_query($params); // แปลงข้อมูล Array ให้อยู่ในรูปแบบ urlencode



// Config การขอ API โดยในภาษา PHP ใช้ cURL
// ส่วนของการขอ Access Token Health ID

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://moph.id.th/api/v1/token', // URL Endpoint ที่ได้ตามคู่มือ
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST', //ประเภทการส่ง โดยปกติจะใช้เป็น GET คือขอข้อมูล , POST คือส่งข้อมูล
    CURLOPT_POSTFIELDS => $params_urlencode, //ข้อมูลที่จะส่งไป นี่คือส่วนของ Body
    CURLOPT_HTTPHEADER => array( // ส่วนของ Header ใช้ในการกำหนดเงื่อนไขเพิ่มเติมตามที่คู่มือกำหนด
        'Content-Type: application/x-www-form-urlencoded' // ตามคู่มือส่วนนี้ให้ใส่ประเภทของข้อมูลเป็นรูปแบบ urlencode
    ),
));


$response = curl_exec($curl); // ส่วนของประมวลผล cURL
curl_close($curl); // หยุดการทำงานของ cURL


$result = json_decode($response, true); // แปลงจากรูปแบบ JSON String เป็น php Array หรือ Object


if ($result['status_code'] == 200) { // เงื่อนไขเช็คว่าข้อมูลถูกส่งมาสำเร็จหรือไม่ ปกติจะเป็น Success หรือ 200 ถ้าสำเร็จ
    $data = $result['data']; // เก็บข้อมูล data ไว้ในตัวแปร


    foreach ($data as $key => $value) { // Loop เพื่อเก็บ Access Token Health ID ไว้ในตัวแปร
        if ($key == "access_token") {
            $access_token = $value;
        }
    }






    // Config การขอ API โดยในภาษา PHP ใช้ cURL
    // ส่วนของการขอ Access Token Provider ID

    $params_provider = [
        "client_id" => "XXX", // Client ID ของ Provider ID
        "secret_key" => "XXX", // Secret ID ของ Provider ID
        "token_by" => "Health ID",
        "token" => $access_token // Access Token ของ Health ID
    ];


    $params_provider_json = json_encode($params_provider); // แปลงข้อมูล Array ให้อยู่ในรูปแบบของ JSON

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://provider.id.th/api/v1/services/token', // URL Endpoint ที่ได้ตามคู่มือ
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST', //ประเภทการส่ง โดยปกติจะใช้เป็น GET คือขอข้อมูล , POST คือส่งข้อมูล
        CURLOPT_POSTFIELDS => $params_provider_json, //ข้อมูลที่จะส่งไป นี่คือส่วนของ Body
        CURLOPT_HTTPHEADER => array( // ส่วนของ Header ใช้ในการกำหนดเงื่อนไขเพิ่มเติมตามที่คู่มือกำหนด
            'Content-Type: application/json' // ตามคู่มือส่วนนี้ให้ใส่ประเภทของข้อมูลเป็นรูปแบบ JSON
        ),

    ));


    $response1 = curl_exec($curl); // ส่วนของประมวลผล cURL
    curl_close($curl); // หยุดการทำงานของ cURL



    $result1 = json_decode($response1, true); // แปลงจากรูปแบบ JSON String เป็น php Array หรือ Object


    if ($result1['status'] == 200) { // เงื่อนไขเช็คว่าข้อมูลถูกส่งมาสำเร็จหรือไม่ ปกติจะเป็น Success หรือ 200 ถ้าสำเร็จ
        $data = $result1['data']; // เก็บข้อมูล data ไว้ในตัวแปร


        foreach ($data as $key => $value) { // Loop เพื่อเก็บ Access Token Provider ID ไว้ในตัวแปร
            if ($key == "access_token") {
                $access_token = $value;
            }
        }



        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://provider.id.th/api/v1/services/profile', // URL Endpoint ที่ได้ตามคู่มือ
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET', //ประเภทการส่ง โดยปกติจะใช้เป็น GET คือขอข้อมูล , POST คือส่งข้อมูล
            CURLOPT_POSTFIELDS => '', //ข้อมูลที่จะส่งไป นี่คือส่วนของ Body
            CURLOPT_HTTPHEADER => array( // ส่วนของ Header ใช้ในการกำหนดเงื่อนไขเพิ่มเติมตามที่คู่มือกำหนด
                'Authorization: Bearer ' . $access_token, // กำหนด Authorization โดยใช้ Access Token Provider ID
                'Content-Type: application/json', // กำหนดให้ข้อมูลอยู่ในรูปแบบของ JSON
                'client-id: XXX', // Client ID ของ Provider ID
                'secret-key: XXX' // Secret ID ของ Provider ID
            ),

        ));


        $response2 = curl_exec($curl); // ส่วนของประมวลผล cURL
        curl_close($curl); // หยุดการทำงานของ cURL


        $result2 = json_decode($response2, true); // แปลงจากรูปแบบ JSON String เป็น php Array หรือ Object

        $redirect_web = $state; // เก็บค่า State ที่ใช้ Redirect ไปยังเว็บไซต์

        if ($result2 && $result2['status'] == 200) {  // เงื่อนไขเช็คว่าข้อมูลถูกส่งมาสำเร็จหรือไม่ ปกติจะเป็น Success หรือ 200 ถ้าสำเร็จ
            $data2 = json_encode($result2['data']); // เก็บข้อมูล data ไว้ในตัวแปร


            header("Location: {$redirect_web}?data={$data2}"); // set ให้ Redirect ไปที่เว็บไซต์ พร้อมส่ง Data Personal ไปด้วย
        }
    }
}
