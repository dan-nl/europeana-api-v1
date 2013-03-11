<?php
/**
 * @version 0.0.1
 * @created 2013-03-01 07:29 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace	Europeana\Api\Request;
use	Exception;


/**
 * @see https://sites.google.com/site/projecteuropeana/documents/new-ingestion-process-and-portal-planning/api-1/api
 */
class Record extends RequestAbstract {


	/**
	 * @var string
	 * a name of callback function. If you set a funtion the JSON response will be wrapped by this function call.
	 */
	public $callback;


	/**
	 * @var string
	 * [default = full] the search profile describing the required result (what the API returns back). Default is full. Other possible value: similar (see below).
	 */
	public $profile;


	/**
	 * @var string
	 * [required] the id of the record being requested
	 */
	public $recordID;


	/**
	 * @var string
	 * [required] the API key you get when you register (do not confuse with the other key, called Private key).
	 */
	public $wskey;


	public function call() {

		//return( $this->_HttpRequest->get( $this->buildUrl( $this->recordID ) ) );
		return parent::call( $this->recordID );

	}


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->callback = null;
		$this->profile = 'full';
		$this->recordID = null;
		$this->wskey = null;

		$this->_endpoint = 'http://preview.europeana.eu/api/v2/record%s.json';

	}


}