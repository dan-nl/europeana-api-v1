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


class Search extends Json {


	/**
	 * @var array
	 * the list of search elements (query and qf parameters) (available in case of breadrumb and portal profile applications). It is an array, and each breadcrumb contains the following fields:
	 */
	public $breadCrumbs;


	/**
	 * @var array
	 * is a list of facet object (available in case of facets and portal profile applications). Each facet object contains the following fields
	 */
	public $facets;


	/**
	 * @var array
	 * if the search has results, the hits take place in the "items" array. Each item is an object, and represents a summary of metadata record. The actual content is depending of the profile parameter. The mandatory field are:
	 */
	public $items;


	/**
	 * @var int
	 * the number of retrieved hits (you can set the number per request with the rows parameter, but it can not be greater than 100)
	 */
	public $itemsCount;


	/**
	 * @var array
	 * is object representing spellcheck suggestions (available in case of spellcheck and portal profile applications). The object contains the following fields:
	 */
	public $spellcheck;


	/**
	 * @var int
	 * the total number of results
	 */
	public $totalResults;


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

		$this->breadCrumbs = array();
		$this->facets = array();
		$this->items = array();
		$this->itemsCount = 0;
		$this->spellcheck = array();
		$this->totalResults = 0;

		$this->_property_to_class['breadCrumbs'] = 'Europeana\Breadcrumb';
		$this->_property_to_class['facets'] = 'Europeana\Facet';
		$this->_property_to_class['items'] = 'Europeana\Item';
		$this->_property_to_class['spellcheck'] = 'Europeana\Spellcheck';

	}


}