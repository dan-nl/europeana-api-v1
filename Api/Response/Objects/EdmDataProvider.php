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


class EdmDataProvider extends ResponseObjectAbstract {


	/**
	 * @var array
	 * A collection of definitions for the referring object
	 */
	public $def;


	public function reset() {

		parent::reset();
		$this->def = array();

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

	}


}