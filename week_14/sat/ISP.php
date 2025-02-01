<?php

/*interface PaymentMethod
{
    public function Credit();

    public function Fawry();

    public function PayPal();
}*/

interface Credit{
    public function Credit();
}
interface Fawry{
    public function Fawry();
}
interface PayPal{
    public function PayPal();
}

class SystemTech implements PaymentMethod
{
    public function Credit()
    {
        return "Credit";
    }

    public function Fawry()
    {
        return "Fawry";
    }

    public function PayPal()
    {
        return "PayPal";
    }
}

class Tech implements PaymentMethod
{
    public function Credit()
    {
        return "Credit";
    }

  

    public function PayPal()
    {
        return "PayPal";
    }
}

class Test implements PaymentMethod
{
    public function Credit()
    {
        return "Credit";
    }
   
}