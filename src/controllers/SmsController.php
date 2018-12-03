<?php
/**
 * Craft SMS plugin for Craft CMS 3.x
 *
 * Send SMS using Twilio.
 *
 * @link      https://mandarindesign.no
 * @copyright Copyright (c) 2018 Mandarin Design
 */

namespace mandarindesign\craftsms\controllers;

use mandarindesign\craftsms\CraftSms;

use Craft;
use craft\web\Controller;
use Twilio\Rest\Client;

/**
 * Sms Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Mandarin Design
 * @package   CraftSms
 * @since     1.0.0
 */
class SmsController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/craft-sms/sms
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the SmsController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/craft-sms/sms/send-sms
     *
     * @return mixed
     */
    public function actionSendSms()
    {
        // Cache
        $request = Craft::$app->request;
        $recipients = explode(',', $request->post('recipients'));
        $message = $request->post('message');
        $settings = CraftSms::getInstance()->getSettings();


        // Prepare Twilio
        $client = new Client($settings->twilioSid, $settings->twilioToken);

        // Send the SMS
        foreach ($recipients as $recipient) {
            $client->messages->create(
                $recipient,
                [
                    'from' => $settings->twilioNumber,
                    'body' => $request->post('message')
                ]
            );
        }

        // Finally store the SMS in the archives to it's possible to later to back and see all SMS messages that have been sent
        // goes here

        // Redirect to referrer and display success message
        $referrer = preg_replace('/\?.*/', '', Craft::$app->request->getReferrer());
        return $this->redirect($referrer.'?sms=sent');
    }
}
