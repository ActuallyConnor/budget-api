<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Goal
 *
 * @property int $id
 * @property mixed $uuid
 * @property int|null $user_id
 * @property string $label
 * @property string $start_date
 * @property string $goal_date
 * @property string $balance
 * @property string $amount
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Goal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Goal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Goal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereGoalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Goal whereUuid($value)
 * @mixin \Eloquent
 */
class Goal extends Model
{
    use HasFactory;
}
