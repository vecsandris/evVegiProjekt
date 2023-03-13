<?php
    class Szures{
        public mysqli $csatlakozas;
        function __construct()
        {
            $this->csatlakozas = new mysqli("localhost","root","","turazas");
        }
        function SzuroRendszer(){
            $adat = $this->query("SELECT * FROM megye WHERE turak_szama = ".$chck."");
        }
    }
?>