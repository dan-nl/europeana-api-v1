<?php
/**
 * @version 0.0.1
 * @created 2013-03-01 07:29 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response;
use DOMDocument;


abstract class XmlAbstract extends ResponseAbstract {

	
	public function getResponseAsXml() {

		$result = null;

			$dom = new DOMDocument();
			$dom->loadXML( $this->_response_raw );
			$dom->formatOutput = true;
			$result = $dom->saveXML();
			$result = str_replace( array('<'), array('&lt;' ), $result );

		return $result;

	}


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->_response_raw = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL . '<document></document>';

	}


	public function __construct( array $response, $obfuscate_apikey = true ) {

		if ( empty( $response ) ) { throw new Exception( 'no response provided' ); }

		$this->reset();
		$this->_response_raw = $response['response'];
		$this->_response_info = $response['info'];

		if ( $obfuscate_apikey ) { $this->obfuscateApiKey(); }
		if ( 200 != $this->_response_info['http_code'] ) { $this->throwRequestError(); }

	}


}