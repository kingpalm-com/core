<?php
namespace KingPalm\Core\Plugin\GroupedProduct\Ui\DataProvider\Product\Form\Modifier;
use Magento\GroupedProduct\Ui\DataProvider\Product\Form\Modifier\Grouped as Sb;
// 2019-06-21
final class Grouped {
	/**
	 * 2019-06-21
	 * "Implement an ability to move a grouped product variation to the list's beginning":
	 * https://github.com/kingpalm-com/core/issues/1
	 * @see \Magento\GroupedProduct\Ui\DataProvider\Product\Form\Modifier\Grouped::modifyMeta()
	 * @param Sb $sb
	 * @param array(string => mixed) $r
	 * @return array(string => mixed)
	 */
	function afterModifyMeta(Sb $sb, $r) {return dfa_deep_set(
		$r, [Sb::GROUP_GROUPED, 'children', Sb::LINK_TYPE, 'arguments/data/config/pageSize'], 200
	);}
}