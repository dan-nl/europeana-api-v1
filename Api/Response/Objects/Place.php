<?php
/**
 * @version 0.0.1
 * @created 2013-03-21 23:00 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ResponseObjectAbstract;


class Place extends ResponseObjectAbstract {


	/**
	 * @var string
	 */
	public $about;


	/**
	 * @var array
	 */
	public $prefLabel;


	/**
	 * @var array
	 */
	public $altLabel;


	/**
	 * @var array
	 */
	public $isPartOf;


	/**
	 * @var float
	 */
	public $latitude;


	/**
	 * @var float
	 */
	public $longitude;


	/**
	 * @var int
	 */
	public $altitude;


	public function reset() {

		parent::reset();

		$this->about = null;
		$this->altitude = 0;
		$this->altLabel = array();
		$this->isPartOf = array();
		$this->latitude = 0;
		$this->longitude = 0;
		$this->prefLabel = array();

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

	}


}