<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class ExistsArray implements Rule
{
    protected $table;
    protected $id;

    /**
     * Create a new rule instance.
     *
     * @param $table - the lookup table for validating existence of data
     * @param string $id - the primaryKey
     */
    public function __construct($table, $id = 'id')
    {
        $this->table = $table;
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $exists = true;
        foreach ($value as $val) {
            if (!DB::table($this->table)->where($this->id, $val)->exists()) {
                $exists = false;
                break;
            }
        }
        return $exists;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected :attribute is invalid.';
    }
}
