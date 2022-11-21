<?php

class Date
{
    private int $day;
    private int $month;
    private int $year;

    public function __construct($day, $month, $year)
    {
        if (checkdate($month, $day, $year)) {
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
        } else {
            throw new Exception("Неправильный формат даты.");
        }
    }

    public function diffDay(Date $secondDate) : string
    {
        $firstDate = date_create("{$this->year}-{$this->month}-{$this->day}");
        $secondDate = date_create("{$secondDate->getYear()}-{$secondDate->getMonth()}-{$secondDate->getDay()}");
        $difference = date_diff($firstDate, $secondDate)->format('%a');

        return $difference;
    }

    public function minusDay(int $daysToSubtract) : string
    {
        $date = new DateTime("{$this->year}-{$this->month}-{$this->day}");
        $intervalToSubtract = new DateInterval("P{$daysToSubtract}D");

        return $date->sub($intervalToSubtract)->format('d-m-Y');
    }

    public function getDateOfWeek() : string
    {
        $date = new DateTime("{$this->year}-{$this->month}-{$this->day}");
        $week = ['Воскресенье', 'Понедельник ', 'Вторник ', 'Среда ', 'Четверг ', 'Пятница ', 'Суббота '];
        return $week[intval($date->format('w'))];
    }

    public function format(string $format) : string
    {
        if ($format === "en") {
            return "{$this->year}-{$this->month}-{$this->day}";
        }
        elseif ($format === "ru") {
            return "{$this->day}-{$this->month}-{$this->year}";
        }
        else {
            throw new Exception("Неправильный формат даты.");
        }
    }

    public function getDay() : int
    {
        return $this->day;
    }

    public function getMonth() : int
    {
        return $this->month;
    }

    public function getYear() : int
    {
        return $this->year;
    }
}

$date1 = new Date(10, 11, 2020);
$date2 = new Date(15, 11, 2020);

    print("{$date1->diffDay($date2)} \n");
    print("{$date1->minusDay(4)} \n");
    print("{$date1->getDateOfWeek()} \n");
    print("{$date1->format('ru')} \n");
    print("{$date1->format('en')} \n");
