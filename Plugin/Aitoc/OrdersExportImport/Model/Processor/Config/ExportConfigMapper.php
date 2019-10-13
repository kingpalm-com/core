<?php
namespace KingPalm\Core\Plugin\Aitoc\OrdersExportImport\Model\Processor\Config;
use Aitoc\OrdersExportImport\Model\Export;
use Aitoc\OrdersExportImport\Model\Processor\Config;
use Aitoc\OrdersExportImport\Model\Processor\Config\ExportConfigMapper as Sb;
use Magento\Framework\DataObject as _DO;
// 2019-10-14
final class ExportConfigMapper {
	/**
	 * 2019-10-14
	 * @see \Aitoc\OrdersExportImport\Model\Processor\Config\ExportConfigMapper::toConfig()
	 * @param Sb $sb
	 * @param \Closure $f
     * @param Export $export
	 * @return Config
	 */
	function aroundToConfig(Sb $sb, \Closure $f, Export $export) {
		$r = $f($export); /** @var Config $r */
		$c = $export->getProfile()->getConfig(); /** @var _DO $c */
		/**
		 * 2019-10-14
		 * «Cron Job export_stack has an error:
		 * Warning: array_key_exists() expects parameter 2 to be array, null given
		 * in app/code/Aitoc/OrdersExportImport/Model/Processor/EntityType/AbstractEntity.php on line 219»:
		 * https://github.com/kingpalm-com/core/issues/33
		 */
		$c['allowed_fields'] = df_eta($c['allowed_fields']);
		$p = $c['path_local']; /** @var string $p */
		/** @var string $file */
		df_file()->mkdir(dirname($file = df_path_n(df_cc_path(BP, $p, df_last(explode($p, $r['filename']))))));
		// 2019-10-14
		// «File "/chroot/home/a0ea0e45/kingpalm.com/admin/order_export_120190508091706.csv"
		// cannot be opened»: https://github.com/kingpalm-com/core/issues/37
		return $r->addData(['filename' => $file]);
	}
}