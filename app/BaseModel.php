<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    /**
     * The validation rules for this model
     *
     * @var array
     */
    protected static $rules = [];

    /**
     * Return model validation rules
     *
     * @return array
     */
    public static function getRules()
    {
        return static::$rules;
    }

    /**
     * Return model validation rules for an update
     * Add exception to :unique validations where necessary
     * That means: enforce unique if a unique field changed.
     * But relax unique if a unique field did not change
     *
     * @return array;
     */
    public function getUpdateRules()
    {
        $updateRules = [];
        foreach (self::getRules() as $field => $rule)
        {
            $newRule = [];
            // Split rule up into parts
            $ruleParts = explode('|', $rule);
            // Check each part for unique
            foreach ($ruleParts as $part)
            {
                if (strpos($part, 'unique:') === 0)
                {
                    // Check if field was unchanged
                    if (!$this->isDirty($field))
                    {
                        // Field did not change, make exception for this model
                        // Following line of code does not appear to work.
                        $part = $part . ',' . $field . ',' . $this->getAttribute($field) . ',' . $field;
                        
                        // leave this segment out (replaces above line of code)
                       // continue;
                    }
                }
                // All other go directly back to the newRule Array
                $newRule[] = $part;
            }
            // Add newRule to updateRules
            $updateRules[$field] = join('|', $newRule);
        }
        return $updateRules;
    }

}
