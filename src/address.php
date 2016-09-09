<?php
    class Contact
    {
        private $fullName;
        private $phoneNumber;
        private $fullStreet;
        private $fullState;

        function __construct($fullName, $phoneNumber, $fullStreet, $fullState)
        {
            $this->fullName = $fullName;
            $this->phoneNumber = $phoneNumber;
            $this->fullStreet = $fullStreet;
            $this->fullState = $fullState;
        }
        function getName()
        {
            return $this->fullName;
        }
        function setName($full_name)
        {
            $this->fullName = $full_name;
        }
        function getPhone()
        {
            return $this->phoneNumber;
        }
        function setPhone($phone_number)
        {
            $this->phoneNumber = $phone_number;
        }
        function getAddress()
        {
            return $this->fullStreet . " " . $this->fullState;
        }
        function setAddress($full_address)
        {
            $this->fullStreet . " " . $this->fullState = $full_address;
        }

        function saveContact()
        {
            array_push($_SESSION['list_of_contacts'], $this);
        }
        static function getContacts()
        {
            return $_SESSION['list_of_contacts'];
        }
        static function deleteContacts()
        {
            $_SESSION['list_of_contacts'] = array();
        }
   }
 ?>
