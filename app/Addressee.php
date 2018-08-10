<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Addressee
 * @package App
 *
 * @property int id
 * @property int mailing_list_id
 * @property string name
 * @property string email
 * @property string password
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Addressee extends Model
{
    protected $table = 'addressees';
}
