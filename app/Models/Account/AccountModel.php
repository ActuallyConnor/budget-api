<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AccountModel
 *
 * @property int $id
 * @property mixed $uuid
 * @property int|null $user_id
 * @property string $date_opened
 * @property string $name
 * @property string $balance
 * @property string $interest
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereDateOpened($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereInterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountModel whereUuid($value)
 * @mixin \Eloquent
 */
class AccountModel extends Model
{
    use HasFactory;
}
