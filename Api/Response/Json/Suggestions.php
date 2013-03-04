<?php
/**
 * @version 0.0.1
 * @created 2013-03-02 05:42 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response\Json;
use Europeana\Api\Response\Json;


class Suggestions extends Json {


	/**
	 * @var array
	 * a list of suggestion objects. Each suggestion has the following fields:
	 */
	public $items;


	/**
	 * @var string $property_name
	 */
	protected function addObject( $property_name = null ) {

		if ( empty( $property_name ) ) { throw new Exception('no property name provided'); }

		foreach( $this->_response_array[ $property_name ] as $item ) {

			$this->{$property_name}[] = new $this->_property_to_class[ $property_name ]( $item );

		}

	}


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->items = array();
		$this->_property_to_class['items'] = 'Europeana\Suggestion';

	}


}