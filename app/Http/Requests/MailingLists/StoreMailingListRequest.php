<?php

namespace App\Http\Requests\MailingLists;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailingListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'company' => 'required',
            'address1' => 'required',
            'address2' => '',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'phone' => '',
            'permission_reminder'=>'required',
            'from_name' => 'required',
            'from_email' => 'required',
            'subject' => '',
            'language' => 'required',
            'notify_on_subscribe' => '',
            'notify_on_unsubscribe' => '',
            'email_type_option' => 'required',
            'visibility' => '',
            'double_optin'=>'',
            'marketing_permissions'=>'',
        ];
    }
}