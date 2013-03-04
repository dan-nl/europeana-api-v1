<?php
/**
 * @version 0.0.1
 * @created 2013-03-02 04:19 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana;
use Exception,
		ReflectionClass,
		ReflectionProperty;


/**
 * is a list of facet object (available in case of facets and portal profile applications). Each facet object contains the following fields
 */
class FacetField {


	/**
	 * @var int
	 * the number of records this value is available given the query and filter parameters
	 */
	public $count;


	/**
	 * @var string
	 * the actual value of the facet instance
	 */
	public $label;


}