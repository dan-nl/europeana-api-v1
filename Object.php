<?php
/**
 * @version 0.0.1
 * @created 2013-03-02 04:19 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana;
use Exception,
		ReflectionClass,
		ReflectionProperty;


/**
 * an object represents the EDM metadata record. The object has the following parts:
 */
class Object {


	/**
	 * @var string
	 * is the record ID string such as "/9200143/41CCA52E2986E491BBA631D4899768A5002C455A". You can find it as part of URL of record call or of the full object page at Europeana portal.
	 */
	public $about;


	/**
	 * @var array
	 * a list of EDM Agents objects
	 */
	public $agents;


	/**
	 * @var array
	 * a list of EDM Aggregations objects
	 */
	public $aggregations;


	/**
	 * @var string
	 * an EDM Europeana Aggregation object
	 */
	public $europeanaAggregation;


	/**
	 * @var array
	 * a list of identifiers of the collection this record belongs to.
	 */
	public $europeanaCollectionName;


	/**
	 * @var int
	 * a number (in range of 0-10) representing the metadata quality of the record. Note: the base of calculation will change in the future, so the numbers will change.
	 */
	public $europeanaCompleteness;


	/**
	 * @var array
	 * a list of EDM Place objects
	 */
	public $places;


	/**
	 * @var array
	 * a list EDM ProvidedCHO objects
	 */
	public $providedCHOs;


	/**
	 * @var array
	 * a list of Proxy objects for EDM ProvidedCHO objects. This is the most important part, because this contains the data provider's metadata.
	 */
	public $proxies;


	/**
	 * @var array
	 * a list of titles for the object
	 */
	public $title;


	/**
	 * @var string
	 * the object type (same as the TYPE facet, see there)
	 */
	public $type;


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


	public function reset() {

		$this->about = null;
		$this->agents = array();
		$this->aggregations = array();
		$this->europeanaAggregation = array();
		$this->europeanaCollectionName = array();
		$this->europeanaCompleteness = 0;
		$this->places = array();
		$this->providedCHOs = array();
		$this->proxies = array();
		$this->title = array();
		$this->type = null;

	}


	public function __construct( array $response_array ) {

		$this->reset();
		$this->_response_array = $response_array;
		$this->_reflection = new ReflectionClass( $this );
		$this->_public_properties = $this->_reflection->getProperties( ReflectionProperty::IS_PUBLIC );
		$this->populate();

	}


}