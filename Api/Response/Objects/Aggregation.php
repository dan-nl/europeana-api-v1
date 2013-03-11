<?php
/**
 * @version 0.0.1
 * @created 2013-03-11 17:34 gmt +1
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
	 * @var array
	 * a collection of edmDataProvider definitions
	 */
	public $edmDataProvider;


	public function reset() {

		parent::reset();

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

	}


}