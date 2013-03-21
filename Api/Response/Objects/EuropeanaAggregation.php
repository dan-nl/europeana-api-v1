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


/**
 * is object representing spellcheck suggestions (available in case of spellcheck and portal profile applications). The object contains the following fields:
 */
class EuropeanaAggregation extends ResponseObjectAbstract {


	/**
	 * @var string
	 */
	public $about;


	/**
	 * @var string
	 */
	public $aggregatedCHO;


	/**
	 * @var array
	 * a collection of dcCreator definitions
	 */
	public $dcCreator;


	/**
	 * @var string
	 * a collection of edmCountry definitions
	 */
	public $edmCountry;


	/**
	 * @var string
	 */
	public $edmLandingPage;


	/**
	 * @var string
	 * a collection of edmLanguage definitions
	 */
	public $edmLanguage;


	/**
	 * @var string
	 */
	public $edmPreview;


	public function reset() {

		parent::reset();

		$this->about = null;
		$this->aggregatedCHO = null;
		$this->dcCreator = array();
		$this->edmCountry = array();
		$this->edmLandingPage = null;
		$this->edmLanguage = array();
		$this->edmPreview = array();

		$this->_property_to_class['dcCreator'] = 'Europeana\Api\Response\Objects\DcCreator';
		$this->_property_to_class['edmCountry'] = 'Europeana\Api\Response\Objects\EdmCountry';
		$this->_property_to_class['edmLanguage'] = 'Europeana\Api\Response\Objects\EdmLanguage';

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

	}


}