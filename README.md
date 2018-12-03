# Craft SMS plugin for Craft CMS 3.x

Send SMS using Twilio.

## Requirements

* Craft CMS 3.0.0-beta.23 or later.
* A [Twilio](https://twilio.com/) account.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require stianmandarin/craft-sms

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Craft SMS.

## Configuring Craft SMS

* Enter your twilio `SID`, `token` and `number` you're sending from in the plugin settings.
  * Get these from your Twilio account.

## Using Craft SMS

```
{% if craft.app.request.param('sms') == 'sent' %}
    <p>SMS sent successfully.</p>
{% endif %}

<form action="/actions/craft-sms/sms/send-sms" method="post" class="form default">
    {{ csrfInput() }}
    <input type="text" name="recipients" placeholder="Separate numbers with a comma. Include country code.">

    <textarea name="message" placeholder="Type your message here" maxlength="1600"></textarea>

    <input type="submit">
</form>
```

## Craft SMS Roadmap

Some things to do, and ideas for potential features:

* Save a record of sent SMS for later viewing.
* Create a more friendly sendout form, e.g. send to all Craft users, one or more groups etc.
* Bulk send for better performance.

Brought to you by [Mandarin Design](https://mandarindesign.no)
