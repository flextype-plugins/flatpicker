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
 * Add Blueprint block `InputFlatpickr`
 */
flextype('registry')->set('plugins.blueprints.settings.blocks.InputFlatpickr', 
                          flextype('registry')->get('plugins.flatpickr.settings.blocks.InputFlatpickr'));                

/**
 * Set Flatpicker locale
 */                         
if (flextype('registry')->get('flextype.settings.locale') == 'en_US') {
    $locale = 'en';
    flextype('registry')->set('plugins.flatpickr.settings.blocks.InputFlatpickr.properties.options.locale', $locale);
} else {
    $locale = strings(flextype('registry')->get('flextype.settings.locale'))->lower()->substr(0, 2)->toString();
    flextype('registry')->set('plugins.flatpickr.settings.blocks.InputFlatpickr.properties.options.locale', $locale);
}

/**
 * Add Flatpicker assets
 */ 
$flatpickrCSS[] = 'project/plugins/flatpickr/blocks/InputFlatpickr/dist/css/flatpickr.min.css';
$flatpickrJS[]  = 'project/plugins/flatpickr/blocks/InputFlatpickr/dist/js/flatpickr.min.js';

if ($locale !== 'en') {
    $flatpickrJS[] = 'project/plugins/flatpickr/InputFlatpickr/dist/lang/flatpickr/l10n/' . $locale . '.js';          
} 

if (flextype('registry')->get('plugins.flatpickr.settings.assetsLoadOnAdmin')) {
    flextype('registry')->set('assets.admin.js.flatpickr', $flatpickrJS);
    flextype('registry')->set('assets.admin.css.flatpickr', $flatpickrCSS);
}

if (flextype('registry')->get('plugins.flatpickr.settings.assetsLoadOnSite')) {
    flextype('registry')->set('assets.site.js.flatpickr', $flatpickrJS);
    flextype('registry')->set('assets.site.css.flatpickr', $flatpickrCSS);
}