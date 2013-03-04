<?php
/**
 * @version 0.0.1
 * @created 2013-03-02 05:42 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana;
use Exception,
		ReflectionClass,
		ReflectionProperty;


class Suggestion {


	/**
	 * @var string
	 * is the suggested term to use instead of the searched one
	 */
	public $term;


	/**
	 * @var int
	 * is the number of records it contains the term
	 */
	public $frequency;


	/**
	 * @var string
	 * is the label of the field which contains the actual term. The same term may take place in several fields. The fields we use here are the Title, Who, What, Where, and When. Here is the table which pairs the actual fields and the labels: 
	 */
	public $field;


	/**
	 * @access protected
	 */
	protected $_reflection;


	/**
	 * @access protected
	 */
	protected $_public_properties;


	/**
	 * @var array
	 */
	protected $_response_array;


	/**
	 * @return void
	 */
	protected function populate() {

		if ( empty( $this->_response_array ) ) { return; }

		foreach( $this->_public_properties as $property ) {

			if ( array_key_exists( $property->name, $this->_response_array ) ) {

				$this->{$property->name} = $this->_response_array[ $property->name ];

			}

		}

	}


	public function __construct( $response_array ) {

		$this->_response_array = $response_array;
		$this->_reflection = new ReflectionClass( $this );
		$this->_public_properties = $this->_reflection->getProperties( ReflectionProperty::IS_PUBLIC );
		$this->populate();

	}


}