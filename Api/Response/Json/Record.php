<?php
/**
 * @version 0.0.1
 * @created 2013-03-02 04:42 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response\Json;
use Europeana\Api\Response\Json;


class Record extends Json {


	/**
	 * @var array
	 * an object represents the EDM metadata record. The object has the following parts:
	 */
	public $object;


	/**
	 * @var array
	 * an array of metadata records similar to the current one. Available only if profile parameter's value is similar. The structure of the elements of the list is the same as the search call's items array, see there.
	 */
	public $similarItems;


	/**
	 * @var int
	 * is number, represents the time taken in milliseconds to serve this request
	 */
	public $statsDuration;


	/**
	 * @var string $property_name
	 */
	protected function addObject( $property_name = null ) {

		if ( empty( $property_name ) ) { throw new Exception('no property name provided'); }
		$this->{$property_name} = new $this->_property_to_class[ $property_name ]( $this->_response_array[ $property_name ] );

	}


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->object = array();
		$this->similarItems = array();
		$this->statsDuration = 0;

		$this->_property_to_class['object'] = 'Europeana\Object';

	}


}