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


class Proxy extends ResponseObjectAbstract {


	/**
	 * @var string
	 */
	public $about;


	/**
	 * @var array
	 * a collection of dcCoverage objects
	 */
	public $dcCoverage;


	/**
	 * @var string
	 * a collection of dcIdentifier objects
	 */
	public $dcIdentifier;


	/**
	 * @var string
	 * a collection of dcTitle objects
	 */
	public $dcTitle;


	/**
	 * @var string
	 */
	public $proxyFor;


	/**
	 * @var string
	 */
	public $edmType;


	/**
	 * @var string
	 */
	public $europeanaProxy;


	public function reset() {

		parent::reset();

		$this->about = null;
		$this->dcCoverage = array();
		$this->dcCreator = array();
		$this->dcIdentifier = array();
		$this->dcTitle = array();
		$this->proxyFor = null;
		$this->edmType = null;
		$this->europeanaProxy = null;

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

		$this->_property_to_class['dcCoverage'] = 'Europeana\Api\Response\Objects\DcCoverage';
		$this->_property_to_class['dcCreator'] = 'Europeana\Api\Response\Objects\DcCreator';
		$this->_property_to_class['dcIdentifier'] = 'Europeana\Api\Response\Objects\DcIdentifier';
		$this->_property_to_class['dcTitle'] = 'Europeana\Api\Response\Objects\DcTitle';

	}


}