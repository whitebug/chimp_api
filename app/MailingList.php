<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MailingList
 * @package App
 *
 * @property int id
 * @property string title
 * @property string slug
 * @property string body
 * @property Carbon created_at
 * @property Carbon updated_at
 */

class MailingList extends Model
{
    public function addressees()
    {
        return $this->hasMany(Addressee::class,'mailing_list_id','id');
    }
}
