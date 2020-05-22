<?php
    // Validates request fields
    function validateFields($instance, $fields) {
        $properties = get_object_vars($instance);

        $validation = array_map(function ($prop) {
            return !empty($prop);
        }, $properties);

        $is_valid = array_reduce($validation, function($prev, $valid) {
            return $prev && $valid;
        }, TRUE);

        return $is_valid;
    }

    // Set class instance properties with request payload
    function parseEntity($request, $instance) {
        
        foreach ($request as $key => $value) {
            if(is_array($value)) {
                $instance->{$key} = $value;
            } else {
                $instance->{$key} = trim($value);
            }
        }

        return $instance;
    }

    function validateDate($day, $month) {
        $date = "{$day}/{$month}/2019";
        $parsed_date = date_parse_from_format("d/m/Y", $date);

        $is_valid = checkdate($parsed_date["month"], $parsed_date["day"], $parsed_date["year"]);

        return $is_valid;
    }

    function create_options($options) {
        $html = "";

        foreach ($options as $index => $option) {
            $i = $index + 1;
            $html = $html."<option value=\"{$i}\">{$option}</option>";
        }

        return $html;
    }

    function parse_options_by_index($options, $array) {
        $with_index = on_array_with_index($array);
        return join(",", array_map(function ($x) {
            return $with_index($x);
        }, $options));
    }
?>