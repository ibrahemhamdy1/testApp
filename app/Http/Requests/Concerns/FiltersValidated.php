<?php

namespace App\HttP\Requests\Concerns;

trait FiltersValidated
{
    /**
     * The validated data
     *
     * @var \Illuminate\Support\Collection
     */
    protected $validatedData;

    /**
     * Allow validated data to be filtered.
     *
     * @param  mixed  $keys
     *
     * @return array
     */
    public function validated($keys = null)
    {
        $validated = $this->getValidatedData();
        $keys = is_array($keys) ? $keys : func_get_args();

        if ($keys) {
            $validated = $validated->filter(function ($value, $key) use ($keys) {
                return in_array($key, $keys);
            });
        }

        return $validated->all();
    }

    /**
     * Return all the validated data except the keys passed through.
     *
     * @param  mixed  $keys
     *
     * @return array
     */
    public function validatedExcept($keys = null)
    {
        $validated = $this->getValidatedData();
        $keys = is_array($keys) ? $keys : func_get_args();

        if ($keys) {
            $validated = $validated->filter(function ($value, $key) use ($keys) {
                return !in_array($key, $keys);
            });
        }

        return $validated->all();
    }

    /**
     * Return the value of a validated key.
     *
     * @param  string  $key
     *
     * @return mixed
     */
    public function validatedValue($key)
    {
        return count($this->validated($key)) ? head($this->validated($key)) : null;
    }

    /**
     * Return the validated data off the form request.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getValidatedData()
    {
        return $this->validatedData ?? $this->validatedData = collect(parent::validated());
    }
}
