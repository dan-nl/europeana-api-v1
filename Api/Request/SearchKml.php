<?php
/**
 * @version 0.0.1
 * @created 2013-03-01 07:29 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace	Europeana\Api\Request;
use Exception,
		ReflectionClass,
		ReflectionProperty;


/**
 * @see https://sites.google.com/site/projecteuropeana/documents/new-ingestion-process-and-portal-planning/api-1/api
 */
class SearchKml extends RequestAbstract {


	/**
	 * @var string
	 * [required] the term to find search for. All query grammar of Solr is supported
	 *
	 * @see https://lucene.apache.org/core/old_versioned_docs/versions/3_0_0/queryparsersyntax.html
	 */
	public $query;


	/**
	 * @var string
	 * [required] the API key you get when you register (do not confuse with the other key, called Private key). Mandatory parameter.
	 */
	public $wskey;


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->query = null;
		$this->wskey = null;

		$this->_endpoint = 'http://preview.europeana.eu/api/v2/search.kml';

	}


}