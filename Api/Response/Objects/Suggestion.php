<?php
/**
 * @version 0.0.1
 * @created 2013-03-02 05:42 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ResponseObjectAbstract;


class Suggestion extends ResponseObjectAbstract {


	/**
	 * @var string
	 * is the suggested term to use instead of the searched one
	 */
	public $term;


	/**
	 * @var int
	 * is the number of records it contains the term
	 */
	public $frequency;


	/**
	 * @var string
	 * is the label of the field which contains the actual term. The same term may take place in several fields. The fields we use here are the Title, Who, What, Where, and When. Here is the table which pairs the actual fields and the labels: 
	 */
	public $field;


	public function reset() {

		parent::reset();

		$this->term = null;
		$this->frequency = 0;
		$this->field = null;

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

	}


}