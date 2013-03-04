<?php
/**
 * @version 0.0.1
 * @created 2013-03-01 07:29 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response;


abstract class Json extends ResponseAbstract {
	
	
	/**
	 * @var string
	 * the client's API key (same as URL's wskey parameter)
	 */
	public $apikey;


	/**
	 * @var string
	 * API call such as "search.json", "suggestions.json" or "record.json"
	 */
	public $action;


	/**
	 * @var boolean
	 * is true or false depending on the success of the given action
	 */
	public $success;


	/**
	 * @var int
	 * is a positive number denotes the number of request by this API key within the last 24 hours
	 */
	public $requestNumber;


	/**
	 * @var string
	 * is a text message explaining the nature of problem if there is. If success is false, there should be an error message.
	 */
	public $error;


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->action = null;
		$this->apikey = null;
		$this->error = null;
		$this->requestNumber = 0;
		$this->success = false;

	}


}