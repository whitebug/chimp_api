<?php

namespace App\Transformers;

use App\MailingList;
use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;


class MailingListTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform(MailingList $mailingList)
    {
        return [

            'name' => $mailingList->name,
			'contact' => [
			    'company' => $mailingList->company,
                'address1'=> $mailingList->address1,
                'address2' => $mailingList->address2,
                'city'=> $mailingList->city,
                'state' => $mailingList->state,
                'zip'=> $mailingList->zip,
                'country' => $mailingList->country,
                'phone'=> $mailingList->phone,
            ],
            'permission_reminder' => $mailingList->permission_reminder,
            'use_archive_bar' => $mailingList->use_archive_bar,
            'campaign_defaults' => [
                'from_name' => $mailingList->from_name,
                'from_email'=> $mailingList->from_email,
                'subject' => $mailingList->subject,
                'language'=> $mailingList->language,
            ],
            'notify_on_subscribe' => $mailingList->notify_on_subscribe,
            'notify_on_unsubscribe' => $mailingList->notify_on_unsubscribe,
            'email_type_option' => $mailingList->email_type_option,
            'visibility' => $mailingList->visibility,
            'double_optin' => $mailingList->double_optin,
            'marketing_permissions' => $mailingList->marketing_permissions,
        ];
    }
}