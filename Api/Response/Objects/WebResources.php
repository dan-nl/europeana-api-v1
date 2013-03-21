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


class WebResources extends ResponseObjectAbstract {


	/**
	 * @var string
	 */
	public $about;


	/**
	 * @var array
	 * a collection of webResourceDcRights definitions
	 */
	public $webResourceDcRights;


	/**
	 * @var array
	 * a collection of webResourceDcRights definitions
	 */
	public $webResourceEdmRights;


	public function reset() {

		parent::reset();

		$this->about = null;
		$this->webResourceDcRights = array();
		$this->webResourceEdmRights = array();

		$this->_property_to_class['webResourceDcRights'] = 'Europeana\Api\Response\Objects\WebResourceDcRights';
		$this->_property_to_class['webResourceEdmRights'] = 'Europeana\Api\Response\Objects\WebResourceEdmRights';

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

	}


}