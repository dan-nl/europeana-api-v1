<?php
/**
 * @version 0.0.1
 * @created 2013-03-01 07:29 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace	Europeana\Api\Response;
use Exception,
		ReflectionClass,
		ReflectionProperty;


abstract class ResponseAbstract extends ResponseObjectAbstract implements ResponseInterface {


	/**
	 * @var array
	 */
	protected $_http_status_code_to_error;


	/**
	 * @var array
	 */
	protected $_response_array;


	/**
	 * @var array
	 */
	protected $_response_info;


	/**
	 * @var string
	 */
	protected $_response_raw;


	protected function obfuscateApiKey() {

		if ( isset( $this->_response_info['url'] ) ) {

			$url = parse_url( $this->_response_info['url'] );
			parse_str( $url['query'] );

			if ( !empty( $wskey ) ) {

				$this->_response_info['url'] = str_replace( $wskey, 'xxxxxxxxx', $this->_response_info['url'] );
				$this->_response_raw = str_replace( $wskey, 'xxxxxxxxx', $this->_response_raw );

			}

		}

	}


	protected function throwRequestError() {

		$msg = 'api call error : ';

			if ( array_key_exists( $this->_response_info['http_code'], $this->_http_status_code_to_error ) ) {

				$msg .= $this->_http_status_code_to_error[ $this->_response_info['http_code'] ];

			}

			$msg .= '<pre class="prettyprint">' . print_r( $this->_response_info, true ) . '<pre>';

		throw new Exception( $msg );

	}


	public function getRequestUrl() {

		$result = null;

			if ( isset( $this->_response_info['url'] ) ) {

				$result = $this->_response_info['url'];

			}

		return $result;

	}


	public function reset() {

		parent::reset();

		$this->_response_array = array();
		$this->_response_info = array();
		$this->_response_raw = null;

		$this->_http_status_code_to_error = array(
			200 => 'The request was executed successfully',
			400 => 'The request sent by the client was syntactically incorrect',
			401 => 'Service is called with invalid argument(s)',
			404 => 'The requested resource is not available',
			429 => 'The request could be served because the application has reached its usage limit',
			500 => 'Internal Server Error. Something has gone wrong, please report to us'
		);

	}


	public function __get( $property ) {

		return $this->$property;

	}


}