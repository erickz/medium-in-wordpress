<?php
require_once(MEDIUM_IN_WP_PLUGIN_DIR . 'lib/interfaces/curlBuilderInterface.php');
require_once(MEDIUM_IN_WP_PLUGIN_DIR . 'lib/helper.php');

class CurlBuilder implements CurlBuilderInterface
{
    /** @var curlBuilderData  */
    private $curlBuilderData = null;

    public function __construct($curlBuilderData)
    {
        $this->curlBuilderData = $curlBuilderData;
    }

    public function init()
    {
        return curl_init($this->curlBuilderData->getUrl() . $this->curlBuilderData->getParams());
    }

    public function setAllCurlParams($curl = null)
    {
        switch($this->curlBuilderData->getMethodType())
        {
            case 'post':
            default:
            {
                $this->setCurlParam($curl, CURLOPT_POST, 1);
            }
        }

        if ($this->curlBuilderData->getFormData()){
            $this->setCurlParam($curl, CURLOPT_POSTFIELDS, $this->curlBuilderData->getFormData());
        }

        if ($this->curlBuilderData->getAccessToken()){
            $auth = 'Authorization: Bearer ' . $this->curlBuilderData->getAccessToken();
            $this->setCurlParam($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , 'Content-Length: ' . $this->curlBuilderData->getFormDataSize(), $auth ));
        }

        $this->setCurlParam($curl, CURLOPT_RETURNTRANSFER, true);
    }

    public function setCurlParam($curl = null, $curlOption = null, $data = null)
    {
        curl_setopt($curl, $curlOption, $data);
    }

    public function close($curl = null)
    {
        curl_close($curl);
    }

    public function getCurlInfo($curl = null, $info = null)
    {
        return curl_getinfo($curl, $info);
    }

    public function build()
    {
        $curl = $this->init();

        $this->setAllCurlParams($curl);

        return $curl;
    }

    public function execute()
    {
        $curl = $this->build();

        $output = curl_exec($curl);

        $this->curlBuilderData->setHttpCodeResponse($this->getCurlInfo($curl, CURLINFO_HTTP_CODE));

        $this->close($curl);

        return $this->response($output);
    }

    public function response($output = '')
    {
        if (! Helper::is_json($output)){
            return ['response' => null, 'error' => true, 'http_code_response' => $this->curlBuilderData->getHttpCodeResponse()];
        }

        return ['response' => json_decode($output), 'error' => false, 'http_code_response' => $this->curlBuilderData->getHttpCodeResponse()];
    }
}