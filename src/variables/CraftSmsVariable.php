<?php
/**
 * Craft SMS plugin for Craft CMS 3.x
 *
 * Send SMS using Twilio.
 *
 * @link      https://mandarindesign.no
 * @copyright Copyright (c) 2018 Mandarin Design
 */

namespace mandarindesign\craftsms\variables;

use mandarindesign\craftsms\CraftSms;

use Craft;

/**
 * Craft SMS Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.craftSms }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Mandarin Design
 * @package   CraftSms
 * @since     1.0.0
 */
class CraftSmsVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.craftSms.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.craftSms.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }
}
