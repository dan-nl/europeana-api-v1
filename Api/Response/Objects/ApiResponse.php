<?php
/**
 * @version 0.0.1
 * @created 2013-03-09 12:42 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ResponseObjectAbstract;


class ApiResponse extends ResponseObjectAbstract {


	/**
	 * @var string
	 * the name of the API method that was called; e.g., "search.json", "suggestions.json" or "record.json"
	 */
	public $action;


	/**
	 * @var string
	 * the client's API key (same as URL's wskey parameter)
	 */
	public $apikey;


	/**
	 * @var string
	 * if the call was not successful this fields will contain a detailed text message explaining the nature of problem.
	 */
	public $error;


	/**
	 * @var int
	 * a positive number denotes the number of request by this API key within the last 24 hours
	 */
	public $requestNumber;


	/**
	 * @var boolean
	 * flag denoting the successful execution of the call
	 */
	public $success;


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->action = null;
		$this->apikey = null;
		$this->error = null;
		$this->requestNumber = 0;
		$this->success = null;

	}


	public function __construct( array $properties ) {

		$this->reset();
		$this->populate( $properties );

	}


}