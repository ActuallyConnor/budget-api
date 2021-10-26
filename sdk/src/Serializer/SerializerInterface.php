<?php

namespace Budget\Serializer;

use Illuminate\Database\Eloquent\Model;

interface SerializerInterface
{
    /**
     * @param  array  $data
     *
     * @return Model
     */
    public static function deserialize(array $data): Model;

    /**
     * @param  array  $data
     *
     * @return Model
     */
    public static function deserializeFromDatabase(array $data): Model;

    /**
     * @param  Model  $model
     *
     * @return array
     */
    public static function serialize(Model $model): array;

    /**
     * @param  array  $user
     *
     * @return array
     */
    public static function serializeFromDatabase(array $user): array;
}
