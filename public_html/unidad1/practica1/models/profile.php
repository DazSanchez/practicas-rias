<?php
    $field_names = array(
        "name",
        "firstSurname",
        "secondSurname",
        "day",
        "month",
        "favoriteColor",
        "picture",
        "interestArea",
        "hobbies",
        "email",
        "password",
        "webpage",
        "joinDate"
      );

    $interest_areas = array("Humanidades", "Ciencias exactas");

    $months = array(
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
    );

    $hobbies = array(
        "Realizar deporte",
        "Jugar videojuegos",
        "Escuchar musica",
        "Otro"
    );

    class ProfileForm {
        public $name;
        public $firstSurname;
        public $secondSurname;
        public $day;
        public $month;
        public $favoriteColor;
        public $picture;
        public $interestArea;
        public $hobbies;
        public $email;
        public $password;
        public $webpage;
        public $joinDate;
    }

?>