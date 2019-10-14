<?php
namespace KingPalm\Core\Plugin\Aitoc\OrdersExportImport\Model\Processor\EntityType;
use Aitoc\OrdersExportImport\Model\Processor\EntityType\AbstractEntity as Sb;
use Magento\Framework\Data\Collection\AbstractDb;
// 2019-10-14
final class AbstractEntity {
	/**
	 * 2019-10-14
	 * «Call to a member function getResource() on array
	 * at app/code/Aitoc/OrdersExportImport/Model/Processor/EntityType/AbstractEntity.php:179»:
	 * https://github.com/kingpalm-com/core/issues/38
	 * @see \Aitoc\OrdersExportImport\Model\Processor\EntityType\AbstractEntity::getEntityFields()
	 * @param Sb $sb
	 * @param \Closure $f
     * @param AbstractDb|object[]|null $m [optional]
	 * @return mixed[]
	 */
	function aroundGetEntityFields(Sb $sb, \Closure $f, $m = null) {
		$m = $m ?: $sb->getEntity();
		/**
		 * 2019-10-14
		 * @see \Magento\Sales\Model\Order\Shipment::getItemsCollection()
		 * returns an array, not a collection.
		 */
		return is_array($m) ? [] : $f($m);
	}
}