<?php
    class Job
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

      function getSummary()
      {
          return $this->fullName, $this->$phone_number, $this->$fullAddress;
      }
      function saveAddress()
      {
        array_push($_SESSION)['list_of_addresses'], $this);
      }
      static function getAddress()
      {
          return $_SESSION['list_of_jobs'];
      }
      static function deleteAddresses()
      {
          $_SESSION['list_of_jobs'];
      }
   }
 ?>
