<?php

declare(strict_types=1);

/**
 * @link https://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\Flatpicker;

/**
 * Add Blueprint block `Flatpickr`
 */
registry()->set('plugins.blueprints.settings.blocks.Flatpickr', 
                          registry()->get('plugins.flatpickr.settings.blocks.Flatpickr'));                

/**
 * Set Flatpicker locale
 */                         
if (registry()->get('flextype.settings.locale') == 'en_US') {
    $locale = 'en';
    registry()->set('plugins.flatpickr.settings.blocks.Flatpickr.properties.options.locale', $locale);
} else {
    $locale = strings(registry()->get('flextype.settings.locale'))->lower()->substr(0, 2)->toString();
    registry()->set('plugins.flatpickr.settings.blocks.Flatpickr.properties.options.locale', $locale);
}

/**
 * Add Flatpicker assets
 */ 
$flatpickrCSS[] = 'project/plugins/flatpickr/blocks/Flatpickr/dist/css/flatpickr.min.css';
$flatpickrJS[]  = 'project/plugins/flatpickr/blocks/Flatpickr/dist/js/flatpickr.min.js';

if ($locale !== 'en') {
    $flatpickrJS[] = 'project/plugins/flatpickr/Flatpickr/dist/lang/flatpickr/l10n/' . $locale . '.js';          
} 

if (registry()->get('plugins.flatpickr.settings.assetsLoadOnAdmin')) {
    registry()->set('assets.admin.js.flatpickr', $flatpickrJS);
    registry()->set('assets.admin.css.flatpickr', $flatpickrCSS);
}

if (registry()->get('plugins.flatpickr.settings.assetsLoadOnSite')) {
    registry()->set('assets.site.js.flatpickr', $flatpickrJS);
    registry()->set('assets.site.css.flatpickr', $flatpickrCSS);
}