<?php
    class Contact
    {
      private $fullName;
      private $phone_number;
      private $fullAddress;

      function __construct($fullName, $phone_number, $fullAddress)
     {
          $this->fullName = $fullName;
          $this->phone_number = $phone_number;
          $this->fullAddress = $fullAddress;
      }

      // function getSummary()
      // {
      //     return $this->fullName, $this->$phone_number, $this->$fullAddress;
      // }
      function saveContact()
      {
        array_push($_SESSION['list_of_contacts'], $this);
      }
      static function getContact()
      {
          return $_SESSION['list_of_contacts'];
      }
      static function deleteContact()
      {
          $_SESSION['list_of_contacts'];
      }
   }
 ?>
