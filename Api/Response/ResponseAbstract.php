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


abstract class ResponseAbstract implements ResponseInterface {


	/**
	 * @var array
	 */
	protected $_property_to_class;


	/**
	 * @var array
	 */
	protected $_public_properties;


	/**
	 * @var ReflectionClass
	 */
	protected $_reflection;


	/**
	 * @var array
	 */
	protected $_response_array;


	/**
	 * @var string
	 */
	protected $_response_raw;


	abstract protected function addObject( $property_name = null );


	/**
	 * @return void
	 */
	protected function populate() {

		if ( empty( $this->_response_array ) ) { return; }

		foreach( $this->_public_properties as $property ) {

			if ( array_key_exists( $property->name, $this->_response_array ) ) {

				if ( is_array( $this->_response_array[ $property->name ] ) ) {

					$this->addObject( $property->name );

				} else {

					$this->{$property->name} = $this->_response_array[ $property->name ];

				}

			}

		}

	}


	public function reset() {

		$this->_reflection = new ReflectionClass( $this );
		$this->_property_to_class = array();
		$this->_public_properties = $this->_reflection->getProperties( ReflectionProperty::IS_PUBLIC );
		$this->_response_array = array();

	}


	public function __get( $property ) {

		return $this->$property;

	}


	public function __construct( $response_raw ) {

		if ( empty( $response_raw ) ) {

			throw new Exception( 'no raw response provided' );

		}

		$this->reset();
		$this->_response_raw = $response_raw;
		$this->_response_array = json_decode( $this->_response_raw, true );
		$this->populate();

	}


}