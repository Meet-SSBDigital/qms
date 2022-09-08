<?php
namespace App\Services;

use Collective\Html\FormBuilder;

class Macros extends FormBuilder
{
    /**
     * Generate Bank drop down list
     *
     * @param $name
     * @param null $selected
     * @param array $options
     * @return \Illuminate\Support\HtmlString
     */

    public function selectBank($name, $selected = null, $options = array())
    {
        $list = [
            "" => "Select State...",
            
            "Andhra Pradesh" => "Andhra Pradesh",
            "Arunachal Pradesh" => "Arunachal Pradesh",
            "Assam" => "Assam",
            "Bihar" => "Bihar",
            "Goa" => "Goa",
            "Gujarat" => "Gujarat",
            "Haryana" => "Haryana",
            "Himachal Pradesh" => "Himachal Pradesh",
            "Jharkhand	" => "Jharkhand	",
            "Karnataka" => "Karnataka",
            "Kerala" => "Kerala",
            "Madhya Pradesh" => "Madhya Pradesh",
            "Manipur" => "Manipur",
            "Maharashtra" => "Maharashtra",
            "Mizoram" => "Mizoram",
            "Nagaland" => "Nagaland",
            "Odisha" => "Odisha",
            "Punjab" => "Punjab",
            "Rajasthan" => "Rajasthan",
            "Sikkim" => "Sikkim",
            "Tamil Nadu" => "Tamil Nadu",
            "Telangana" => "Telangana",
            "Tripura	" => "Tripura	",
            "Uttar Pradesh" => "Uttar Pradesh",
            "Uttarakhand" => "Uttarakhand",
            "West Bengal" => "West Bengal",
          
        ];

        return $this->select($name, $list, $selected, $options);
    }
}