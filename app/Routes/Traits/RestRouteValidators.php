<?php
namespace App\Routes\Traits;

trait RestRouteValidators
{
    /**
     * @param $value
     * @param $request
     * @param $param
     * @return array|\WP_Error
     */
    public function sanitizeCats($value, $request, $param)
    {
        if (!is_array($value)) {
            return new \WP_Error('rest_invalid_param', esc_html__('Must be an array.', 'focus-project-theme'), array('status' => 400));
        }

        $sanitized_items = [];

        foreach ($value as $item) {
            if (!empty($item)) {
                $sanitized_items[] = \sanitize_title($item);
            }
        }

        return $sanitized_items;
    }

    /**
     * @param $value
     * @param $request
     * @param $param
     * @return int|\WP_Error
     */
    public function validatePPPage($value, $request, $param)
    {
        if (!isset($value) && empty(intval($value))) {
            return new \WP_Error('rest_invalid_param', esc_html__('Must be an integer.', 'focus-project-theme'), array('status' => 400));
        }

        return intval($value);
    }

    /**
     * @param $value
     * @param $request
     * @param $param
     * @return mixed|\WP_Error
     */
    public function sanitizeText($value, $request, $param)
    {
        if (!\is_string($value)) {
            return new \WP_Error('rest_invalid_param', esc_html__('Must be a string.', 'focus-project-theme'), array('status' => 400));
        }

        return \filter_var($value, \FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
}
