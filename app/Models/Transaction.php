<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property mixed $uuid
 * @property int|null $user_id
 * @property string $date
 * @property int $account_id
 * @property int|null $category_id
 * @property int|null $bill_id
 * @property string $payee
 * @property string $amount
 * @property int $inflow
 * @property int $cleared
 * @property string|null $flair
 * @property string|null $note
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCleared($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereFlair($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereInflow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePayee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUuid($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use HasFactory;
}
