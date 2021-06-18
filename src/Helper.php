<?php
namespace mylifeid\HealthData;

class Helper
{

    public static function constructXml($request)
    {

        $data = '<root>' . Helper::to_xml($data, $request) . '</root>';

        return $data;
    }

    private static function to_xml($str, array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $str .= '<' . $key . '>';
                foreach ($value as $val) {
                    $str .= '<set>';
                    if (is_array($val)) {
                        $str = Helper::to_xml($str, $val);
                    }
                    $str .= '</set>';
                }
                $str .= '</' . $key . '>';
            } else {
                $str .= '<' . $key . '>' . $value . '</' . $key . '>';

            }
        }
        return $str;
    }
}
