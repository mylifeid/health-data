<?php

namespace mylifeid\HealthData;

class DataExchange
{

    private $baseurl = 'http://localhost/mylifeid/api/';

    public function authorize($request)
    {
        $data = Helper::constructXml($request);
        $header = ['Content-Type: text/xml'];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->baseurl . "authorize_user");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

        return $server_output;

    }

    public function defineRecordProperties($request)
    {
        $data = Helper::constructXml($request);
        $header = [
            'Content-Type: text/xml',
            'Authorization: Bearer ' . $request['token'],
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->baseurl . "define_record_properties");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);
        return $server_output;

    }

    public function getRecords($request)
    {
        $data = Helper::constructXml($request);
        $header = [
            'Content-Type: text/xml',
            'Authorization: Bearer ' . $request['token'],
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->baseurl . "get_records");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);
        return $server_output;

    }

    public function putRecords($request)
    {
        $data = Helper::constructXml($request);
        $header = [
            'Content-Type: text/xml',
            'Authorization: Bearer ' . $request['token'],
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->baseurl . "put_records");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);
        return $server_output;

    }
}
