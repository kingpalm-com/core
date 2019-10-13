<?php
namespace KingPalm\Core\Plugin\Aitoc\OrdersExportImport\Model\Processor\Config;
use Aitoc\OrdersExportImport\Model\Export;
use Aitoc\OrdersExportImport\Model\Processor\Config;
use Aitoc\OrdersExportImport\Model\Processor\Config\ExportConfigMapper as Sb;
// 2019-10-14
final class ExportConfigMapper {
	/**
	 * 2019-10-14
	 * «File "/chroot/home/a0ea0e45/kingpalm.com/admin/order_export_120190508091706.csv" cannot be opened»:
	 * https://github.com/kingpalm-com/core/issues/37
	 * @see \Aitoc\OrdersExportImport\Model\Processor\Config\ExportConfigMapper::toConfig()
	 * @param Sb $sb
	 * @param \Closure $f
     * @param Export $export
	 * @return Config
	 */
	function aroundToConfig(Sb $sb, \Closure $f, Export $export) {
		$r = $f($export); /** @var Config $r */
		$p = $export->getProfile()->getConfig()['path_local']; /** @var string $p */
		$r['filename'] = df_path_n(df_cc_path(BP, $p, df_last(explode($p, $r['filename']))));
		df_file()->mkdir(dirname($r['filename']));
		return $r;
	}
}