/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */


document.addEventListener(pimcore.events.pimcoreReady, (e) => {
    const user = pimcore.globalmanager.get("user");
    const perspectiveCfg = pimcore.globalmanager.get("perspective");


    if (user.isAllowed("web2print_web2print_favourite_output_channels") && perspectiveCfg.inToolbar("settings.favorite_outputdefinitions")) {
        let menu = pimcore.globalmanager.get("layout_toolbar").settingsMenu;
        menu.add({
            text: t("web2print_favorite_outputdefinitions"),
            iconCls: "bundle_outputdataconfig_nav_icon",
            handler: function () {
                try {
                    pimcore.globalmanager.get("web2print.favorite_outputdefinitions").activate();
                }
                catch (e) {
                    pimcore.globalmanager.add("web2print.favorite_outputdefinitions", new pimcore.bundle.web2print.favoriteOutputDefinitionsTable());
                }
            }
        });
    }
});
