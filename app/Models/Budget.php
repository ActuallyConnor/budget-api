<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Budget
 *
 * @property int $id
 * @property mixed $uuid
 * @property int $year
 * @property int $month
 * @property int|null $category_id
 * @property int|null $user_id
 * @property string $budgeted
 * @property string $spent
 * @property string $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Budget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Budget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Budget query()
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereBudgeted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereSpent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Budget whereYear($value)
 * @mixin \Eloquent
 */
class Budget extends Model
{
    use HasFactory;
}
