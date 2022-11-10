<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ZadarmaController extends Controller {

    public function webhook(Request $request) {
        $phone = $request->data_field_comp_k0f12clt;
        $email = $request->data_contact_email_0_;
        $name = $request->data_contact_name_first?$request->data_contact_name_first.($request->data_contact_name_last?" $request->data_contact_name_last":''):null;
        $comment = $request->data_contact_id;
        Customer::updateOrCreate([
            'phone' => $phone,
            'email' => $email,
        ],[
            'name' => $name,
            'comment' => $comment,
        ]);
        $postData = [
            'name' => $name,
            'comment' => $comment,
            'phones' => [[
                'phone' => $phone,
                'type' => 'work',
            ]],
            'contacts' => [[
                'value' => $email,
                'type' => 'email_work',
            ]],

        ];

        $params = ['customer' => $postData];
        $leadData = $this->makePostRequest('/v1/zcrm/customers', $params);
        if (isset($leadData['status'], $leadData['data'], $leadData['data']['id'])
            && $leadData['status'] === 'success'
            && (isset($postData['comment']) && !empty($postData['comment']))
        ) {
            //If a client is created, then add a text note to the timeline
            $addFeedMethod = sprintf('/v1/zcrm/customers/%s/feed', $leadData['data']['id']);
            $messageData = ['content' => $postData['comment']];
            $this->makePostRequest($addFeedMethod, $messageData);
        }
    }
    private function makePostRequest($method, $params) {
        //Change userKey and secret to the ones from your personal account
        $userKey = '5983362f2f3ab4fda588';
        $secret = 'c3b072569765511bcbc2';
        $apiUrl = 'https://api.zadarma.com';

        ksort($params);

        $paramsStr = $this->makeParamsStr($params);
        $sign = $this->makeSign($paramsStr, $method, $secret);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl . $method);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $paramsStr);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: ' . $userKey . ':' . $sign
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return null;
        } else {
            return json_decode($response, true);
        }
    }

    /**
     * @param array $params
     * @return string
     */
    private function makeParamsStr($params) {
        return http_build_query($params, null, '&', PHP_QUERY_RFC1738);
    }

    /**
     * @param string $paramsStr
     * @param string $method
     * @param string $secret
     *
     * @return string
     */
    private function makeSign($paramsStr, $method, $secret) {
        return base64_encode(
            hash_hmac(
                'sha1',
                $method . $paramsStr . md5($paramsStr),
                $secret
            )
        );
    }
}
