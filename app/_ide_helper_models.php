<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Guest
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Guest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $second_name
 * @property string $email
 * @property string $phone_number
 * @property string $country
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereSecondName($value)
 */
	class Guest extends \Eloquent {}
}

