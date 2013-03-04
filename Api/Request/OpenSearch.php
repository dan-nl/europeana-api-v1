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
class OpenSearch extends RequestAbstract {


	/**
	 * @var string
	 * [required] the term to find search for. Similar to query parameter in search.json.
	 *
	 * @see https://lucene.apache.org/core/old_versioned_docs/versions/3_0_0/queryparsersyntax.html
	 */
	public $searchTerms;


	/**
	 * @var int
	 * [default = 1] The item in the search results to start (first item = 1)
	 */
	public $startIndex;


	/**
	 * @var int
	 * [default = 12] defines the number of search results, possible values: 12, 24, 48, 100
	 */
	public $count;


	/**
	 * @var string
	 * [default = relevance] Sort order of results, options are relevance, title, publication
	 */
	public $sort;


	/**
	 * @throws Exception
	 * @return void
	 */
	protected function validate() {

		if ( empty( $this->searchTerms ) ) { throw new Exception('no searchTerms provided'); }

	}


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->count = 12;
		$this->searchTerms = null;
		$this->sort = 'relevance';
		$this->startIndex = 1;

		$this->_endpoint = 'http://preview.europeana.eu/api/v2/opensearch.rss';

	}


}