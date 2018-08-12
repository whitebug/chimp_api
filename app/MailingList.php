<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MailingList
 * @package App
 *
 * @property string name
 * @property string contact
 * @property string permission_reminder
 * @property string notify_on_subscribe
 * @property string campaign_defaults
 * @property string use_archive_bar
 * @property string notify_on_unsubscribe
 * @property string email_type_option
 * @property string visibility
 * @property string double_optin
 * @property string marketing_permissions
 * @property string company
 * @property string address1
 * @property string address2
 * @property string city
 * @property string state
 * @property string zip
 * @property string country
 * @property string phone
 * @property string from_name
 * @property string from_email
 * @property string subject
 * @property string language
 */

class MailingList extends Model
{
    public function addressees()
    {
        return $this->hasMany(Addressee::class,'mailing_list_id','id');
    }
}
