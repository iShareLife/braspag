<?php
class BraspagSoapClient extends SoapClient{

	const NAMESPACE_TRANSACTION = "https://www.pagador.com.br/webservice/pagador";

	const NAMESPACE_JUSTCLICK = "http://www.cartaoprotegido.com.br/WebService/";

	private $namespace;

	public function __construct($urlWsdl, $namespace = self::NAMESPACE_TRANSACTION){
		ini_set("soap.wsdl_cache_enabled", "0");
		$this->namespace = $namespace;
		parent::__construct($urlWsdl);
	}

	public function getNamespace() {
		return $this->namespace;
	}

	public function setNamespace($namespace) {
		$this->namespace = $namespace;
	}

	public function __doRequest($request, $location, $action, $version){
		$_action = join('', array_slice(explode('/', $action), -1));
		$request = str_replace('<ns1:' . $_action . '>', '<ns1:' . $_action . ' xmlns="'.$this->namespace.'">', $request);

		return parent::__doRequest($request, $location, $action, $version, 0);
	}
}
