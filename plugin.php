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
 * Add Blueprint block `InputFlatpicker`
 */
flextype('registry')->set('plugins.blueprints.settings.blocks.InputFlatpicker', 
                          flextype('registry')->get('plugins.flatpicker.settings.blocks.InputFlatpicker'));                

/**
 * Set Flatpicker locale
 */                         
if (flextype('registry')->get('flextype.settings.locale') == 'en_US') {
    $locale = 'en';
    flextype('registry')->set('plugins.flatpicker.settings.blocks.InputFlatpicker.properties.options.locale', $locale);
} else {
    $locale = strings(flextype('registry')->get('flextype.settings.locale'))->lower()->substr(0, 2)->toString();
    flextype('registry')->set('plugins.flatpicker.settings.blocks.InputFlatpicker.properties.options.locale', $locale);
}

/**
 * Add Flatpicker assets
 */ 
$flatpickerCSS[] = 'project/plugins/flatpicker/blocks/InputFlatpicker/dist/css/flatpicker.min.css';
$flatpickerJS[]  = 'project/plugins/flatpicker/blocks/InputFlatpicker/dist/js/flatpicker.min.js';

if ($locale !== 'en') {
    $flatpickerJS[] = 'project/plugins/flatpicker/InputFlatpicker/dist/lang/flatpickr/l10n/' . $locale . '.js';          
} 

if (flextype('registry')->get('plugins.flatpicker.settings.assetsLoadOnAdmin')) {
    flextype('registry')->set('assets.admin.js.flatpicker', $flatpickerJS);
    flextype('registry')->set('assets.admin.css.flatpicker', $flatpickerCSS);
}

if (flextype('registry')->get('plugins.flatpicker.settings.assetsLoadOnSite')) {
    flextype('registry')->set('assets.site.js.flatpicker', $flatpickerJS);
    flextype('registry')->set('assets.site.css.flatpicker', $flatpickerCSS);
}