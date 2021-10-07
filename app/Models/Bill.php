<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bill
 *
 * @property int $id
 * @property mixed $uuid
 * @property int|null $user_id
 * @property string $start_date
 * @property int $frequency
 * @property string $label
 * @property string $amount
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Bill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bill whereUuid($value)
 * @mixin \Eloquent
 */
class Bill extends Model
{
    use HasFactory;
}
