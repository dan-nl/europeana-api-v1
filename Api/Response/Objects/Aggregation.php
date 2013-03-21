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
class Aggregation extends ResponseObjectAbstract {


	/**
	 * @var string
	 * boolean value notifies whether the actual query is an existing term in the database
	 */
	public $about;


	/**
	 * @var string
	 */
	public $aggregatedCHO;


	/**
	 * @var array
	 * a collection of edmDataProvider definitions
	 */
	public $edmDataProvider;


	/**
	 * @var string
	 */
	public $edmIsShownAt;


	/**
	 * @var string
	 */
	public $edmIsShownBy;


	/**
	 * @var string
	 */
	public $edmObject;


	/**
	 * @var string
	 * a collection of edmProvider definitions
	 */
	public $edmProvider;


	/**
	 * @var string
	 * a collection of edmRights definitions
	 */
	public $edmRights;


	/**
	 * @var string
	 */
	public $hasView;


	/**
	 * @var string
	 * a collection of webResource definitions
	 */
	public $webResources;


	public function reset() {

		parent::reset();

		$this->about = null;
		$this->aggregatedCHO = null;
		$this->edmDataProvider = array();
		$this->edmIsShownAt = null;
		$this->edmIsShownBy = null;
		$this->edmObject = null;
		$this->edmProvider = array();
		$this->edmRights = array();
		$this->hasView = array();
		$this->webResources = array();

		$this->_property_to_class['edmDataProvider'] = 'Europeana\Api\Response\Objects\EdmDataProvider';
		$this->_property_to_class['edmProvider'] = 'Europeana\Api\Response\Objects\EdmProvider';
		$this->_property_to_class['edmRights'] = 'Europeana\Api\Response\Objects\EdmRights';
		$this->_property_to_class['webResources'] = 'Europeana\Api\Response\Objects\WebResources';

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

	}


}