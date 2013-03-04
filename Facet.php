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
class Facet {


	/**
	 * @var array
	 * list of field objects inside the given facet. Each field object represent a given value, and the number of occurences. The object contains the following fields:
	 */
	public $fields;


	/**
	 * @var string
	 * the name of the facet field. It should always one of Europeana's defined facet (which are COMPLETENESS, COUNTRY, DATA_PROVIDER, LANGUAGE, LOCATION, PROVIDER, RIGHTS, TYPE, UGC, and YEAR).
	 */
	public $name;


}