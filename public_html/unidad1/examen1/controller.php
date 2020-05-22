<?
    $months = [
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ];

    $days = [
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Mi&eacute;rcoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "S&aacute;bado",
        "Sunday" => "Domingo"
    ];

    function get_payload($request) {
        $body = (object) [
            "date" => $request["date"],
            "num" => $request["num"]
        ];
        return $body;
    }

    $body = get_payload($_REQUEST);

    header("Content-Type:application/json");

    $message = NULL;

    if(!$body->date || !$body->num) {
        $message = (object) [
            "code" => 400,
            "message" => "Faltan campos en la peticion",
            "request" => $body
        ];
    } else {
        $parsed_date = date_parse_from_format("Y-m-d", $body->date);
        $is_even = $body->num % 2 == 0;

        $timestamp = strtotime($body->date);
        $day = $days[date("l", $timestamp)];

        $message = (object) [
            "code" => 200,
            "message" => [
                "name" =>  $is_even ? $day : $months[$parsed_date["month"]],
                "num" => $is_even ? $body->num + $parsed_date["month"] : $body->num + $parsed_date["day"]
            ]
        ];
    }
    
    echo json_encode($message);
    exit();
?>