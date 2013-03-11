<?php
/**
 * @version 0.0.1
 * @created 2013-03-11 10:10 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace	Europeana\Api\Response;
use Exception,
		ReflectionClass,
		ReflectionProperty;


abstract class ResponseObjectAbstract {


	/**
	 * @var array
	 */
	protected $_property_to_class;
	protected $_reflection;
	protected $_public_properties;


	/**
	 * @var string $property_name
	 */
	protected function addObject( array $properties, $property_name = null ) {

		if ( empty( $property_name ) ) { throw new Exception('no property name provided'); }

		if ( is_array( $properties[ $property_name ] ) ) {

			foreach( $properties[ $property_name ] as $key => $value ) {

				if ( is_array( $value ) ) {

					$this->{$property_name}[] = new $this->_property_to_class[ $property_name ]( $value );

				} else {

					$this->{$property_name} = new $this->_property_to_class[ $property_name ]( $properties[ $property_name ] );
					break;

				}
				

			}

		} else {

			$this->{$property_name} = new $this->_property_to_class[ $property_name ]( $properties[ $property_name ] );

		}

	}


	/**
	 * @return void
	 */
	protected function populate( array &$properties ) {

		if ( empty( $properties ) ) { return; }

		foreach( $this->_public_properties as $property ) {

			if ( array_key_exists( $property->name, $properties ) ) {

				if ( is_array( $properties[ $property->name ] )
					&& array_key_exists( $property->name, $this->_property_to_class )
				) {

					$this->addObject( $properties, $property->name );

				} else {

					$this->{$property->name} = $properties[ $property->name ];

				}

			}

		}

	}


	public function reset() {

		$this->_reflection = new ReflectionClass( $this );
		$this->_property_to_class = array();
		$this->_public_properties = $this->_reflection->getProperties( ReflectionProperty::IS_PUBLIC );

	}


}