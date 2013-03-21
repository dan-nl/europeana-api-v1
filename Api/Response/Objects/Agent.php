<?php
/**
 * @version 0.0.1
 * @created 2013-03-02 04:19 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ResponseObjectAbstract;


class Agent extends ResponseObjectAbstract {


	/**
	 * @var string
	 * A collection of definitions for the referring object
	 */
	public $agent;


	public function reset() {

		parent::reset();
		$this->agent = null;

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

	}


}