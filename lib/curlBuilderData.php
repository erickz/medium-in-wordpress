<?php

class curlBuilderData
{
    protected $url = null;
    protected $params = null;
    protected $token = null;
    protected $methodType = null;
    protected $formData = null;
    protected $httpCodeResponse = null;

    public function __construct($url = '', $params = '', $token = false, $methodType = 'post', $formData = null, $httpCodeResponse = 201)
    {
        $this->setUrl($url);
        $this->setParams($params);
        $this->setToken($token);
        $this->setMethodType($methodType);
        $this->setFormData($formData);
        $this->setHttpCodeResponse($httpCodeResponse);
    }

    /**
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string|null
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param string|null $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return bool|null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param bool|null $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string|null
     */
    public function getMethodType()
    {
        return $this->methodType;
    }

    /**
     * @param string|null $methodType
     */
    public function setMethodType($methodType)
    {
        $this->methodType = strtolower($methodType);
    }

    /**
     * @return null
     */
    public function getFormData()
    {
        return $this->formData;
    }

    /**
     * @param null $formData
     */
    public function setFormData($formData)
    {
        $this->formData = count($formData) ? json_encode($formData) : array();
    }

    /**
     * @return string
     */
    public function getFormDataSize()
    {
        return $this->getFormData() ? strlen($this->getFormData()) : 0;
    }

    /**
     * @return null
     */
    public function getHttpCodeResponse()
    {
        return $this->httpCodeResponse;
    }

    /**
     * @param null $httpCodeResponse
     */
    public function setHttpCodeResponse($httpCodeResponse = 201)
    {
        $this->httpCodeResponse = $httpCodeResponse;
    }
}