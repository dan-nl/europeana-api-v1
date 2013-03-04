<?php
/**
 * @version 0.0.1
 * @created 2013-03-01 07:29 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace	Europeana\Api\Request;
use	W3C\Http\HttpRequestInterface,
		ReflectionClass,
		ReflectionProperty;


abstract class RequestAbstract implements RequestInterface {


	/**
	 * @var W3C\Http\HttpRequestInterface
	 */
	protected $_HttpRequest;


	/**
	 * @access protected
	 */
	protected $_endpoint;


	/**
	 * @access protected
	 */
	protected $_reflection;


	/**
	 * @access protected
	 */
	protected $_public_properties;
	
	protected $_url;


	protected function parseSlash( $property ) {

		$result = null;

			$pieces = explode( '/', $this->{$property->name} );

			foreach( $pieces as $piece ) {

				$result .= urlencode( $piece ) . '/';

			}

			$result = substr( $result, 0, strlen( $result ) - 1 );

		return $result;

	}


	/**
	 * @return string
	 * the url to the api
	 */
	public function buildUrl( $sprintf = null ) {

		$url = sprintf( $this->_endpoint, $sprintf ) . '?';

		foreach( $this->_public_properties as $property ) {

			if ( isset( $this->{$property->name} ) ) {

				if ( is_array( $this->{$property->name} ) ) {

					foreach( $this->{$property->name} as $instance ) {

						$url .= $property->name . '=' . urlencode( $instance ) . '&';

					}

				} else if ( strpos( $this->{$property->name}, '/' ) !== false ) {

					$url .= $property->name . '=' . $this->parseSlash( $property ) . '&';

				} else {

					$url .= $property->name . '=' . urlencode( $this->{$property->name} ) . '&';

				}

			}

		}

		$url = substr( $url, 0, strlen( $url ) - 1 );
		$this->_url = $url;
		return $this->_url;

	}


	public function call() {

		return( $this->_HttpRequest->get( $this->buildUrl() ) );

	}


	abstract protected function validate();


	/**
	 * @return void
	 */
	protected function populate( array &$properties ) {

		if ( empty( $properties ) ) { return; }

		foreach( $this->_public_properties as $property ) {

			if ( isset( $properties[ $property->name ] ) ) {

				$this->{$property->name} = $properties[ $property->name ];

			}

		}

	}


	public function reset() {

		$this->_reflection = new ReflectionClass( $this );
		$this->_public_properties = $this->_reflection->getProperties( ReflectionProperty::IS_PUBLIC );

	}


	public function __get( $property ) {

		return $this->$property;

	}


	/**
	 * @param W3C\Http\HttpRequestInterface $HttpRequest
	 */
	public function __construct( HttpRequestInterface &$HttpRequest, array $properties = array() ) {

		$this->reset();
		$this->_HttpRequest = $HttpRequest;
		$this->populate( $properties );
		$this->validate();

	}


}