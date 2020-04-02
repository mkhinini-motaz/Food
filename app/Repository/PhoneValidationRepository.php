<?php

namespace App\Repositories;

class PhoneValidationRepository
{
    const TABLE_NAME = 'phone_validations';

    /**
     * @param string $phone
     * @param string $validationCode
     *
     * @return bool
     */
    public static function create($phone, $validationCode)
    {
        \DB::table(self::TABLE_NAME)->where('phone', '=',$phone)->delete();

        return \DB::table(self::TABLE_NAME)->insert([
            'phone' => $phone,
            'validation_code' => $validationCode,
            'expire_at' => strtotime('+5 minutes'),
            'created_at' => time(),
        ]);
    }

    /**
     * @param string $phone
     * @param string $validationCode
     *
     * @return bool
     */
    public static function isValid($phone, $validationCode)
    {
        return 1 === \DB::table(self::TABLE_NAME)
            ->where('phone', '=',$phone)
            ->where('validation_code', '=', $validationCode)
            ->where('expire_at', '>=', time())
            ->count();
    }

    /**
     * @param string $phone
     * @param string $validationCode
     *
     * @return bool
     */
    public static function isNotValid($phone, $validationCode)
    {
        return !self::isValid($phone, $validationCode);
    }


}