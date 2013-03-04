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
 * a list of alternative terms available in the database. Each suggestion contains
 */
class SpellcheckSuggestion {


	/**
	 * @var int
	 * the number of records the term exists in
	 */
	public $count;


	/**
	 * @var array
	 * the suggested term
	 */
	public $label;


}