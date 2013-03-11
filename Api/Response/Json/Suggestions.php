<?php
/**
 * @version 0.0.1
 * @created 2013-03-02 05:42 gmt +1
 * @author dan entous <contact@gmtplusone.com>
 * @copyright © 2013 dan entous
 * @license GNU General Public Licence 3.0 http://www.gnu.org/licenses/gpl.html
 */
namespace Europeana\Api\Response\Json;
use Europeana\Api\Response\JsonAbstract;


class Suggestions extends JsonAbstract {


	/**
	 * @var array
	 * a list of suggestion objects. Each suggestion has the following fields:
	 */
	public $items;


	/**
	 * @return void
	 */
	public function reset() {

		parent::reset();

		$this->items = array();
		$this->_property_to_class['items'] = 'Europeana\Api\Response\Objects\Suggestion';

	}


}