<?php
class MyCurrency{
    public $course;

    public function getValue($cur)
    {
        switch ($cur){
            case "UAH":
                $this->course = json_decode(file_get_contents('https://free.currencyconverterapi.com/api/v5/convert?q=USD_UAH&compact=ultra'))->USD_UAH;
                break;
            case "EUR":
                $this->course = json_decode(file_get_contents('https://free.currencyconverterapi.com/api/v5/convert?q=USD_EUR&compact=ultra'))->USD_EUR;
                break;
            case "GBP":
                $this->course = json_decode(file_get_contents('https://free.currencyconverterapi.com/api/v5/convert?q=USD_GBP&compact=ultra'))->USD_GBP;
                break;
        }
    }
    public function convert($usd, $cur)
    {
        $this->getValue($cur);
        return $usd*$this->course;
    }
}
$numUSD = $_POST['fromUSD'];
$currency = $_POST['convertto'];
$MC = new MyCurrency;
echo $MC->convert($numUSD,$currency);
?>
