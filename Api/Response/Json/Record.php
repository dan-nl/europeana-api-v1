<?php
/**
 * @version 0.0.1
 * @created 2013-03-02 04:42 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response\Json;
use Europeana\Api\Response\JsonAbstract;


class Record extends JsonAbstract {


	/**
	 * @var Europeana\Api\Response\Json\Api
	 */
	public $api_response;


	/**
	 * @var Europeana\Object
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
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->object = array();
		$this->similarItems = array();
		$this->statsDuration = 0;

		$this->_property_to_class['api_response'] = 'Europeana\Api\Response\Objects\ApiResponse';
		$this->_property_to_class['object'] = 'Europeana\Api\Response\Objects\Object';

	}


}