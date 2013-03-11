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
class Suggestions extends RequestAbstract {


	/**
	 * @var string
	 * a name of callback function. If you set a funtion the JSON response will be wrapped by this function call.
	 */
	public $callback;


	/**
	 * @var string
	 * [default = false] true or false, give phrase suggestions instead of spelling suggestions.
	 */
	public $phrases;


	/**
	 * @var string
	 * [required] the term to find search suggestions for. Minimum length is 3 characters. For spelling suggestions this term is used as “start with”, for phrase search it is matched on contains. In both cases it is case-insensitive.
	 *
	 * @see https://lucene.apache.org/core/old_versioned_docs/versions/3_0_0/queryparsersyntax.html
	 */
	public $query;


	/**
	 * @var int
	 * [default = 10] change the maximum number of results.
	 */
	public $rows;


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->callback = null;
		$this->phrases = 'false';
		$this->query = null;
		$this->rows = 10;

		$this->_endpoint = 'http://preview.europeana.eu/api/v2/suggestions.json';

	}


}