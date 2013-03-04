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
 * is object representing spellcheck suggestions (available in case of spellcheck and portal profile applications). The object contains the following fields:
 */
class Spellcheck {


	/**
	 * @var boolean
	 * boolean value notifies whether the actual query is an existing term in the database
	 */
	public $correctlySpelled;


	/**
	 * @var array
	 * a list of alternative terms available in the database. Each suggestion contains
	 */
	public $suggestions;


}