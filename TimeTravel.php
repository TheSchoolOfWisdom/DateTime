<?php


class TimeTravel
{
    /**
     * @var
     */
    public $start;
    public $end;

    /**
     * TimeTravel constructor.
     * @param $start
     * @param $end
     * @throws Exception
     */
    public function __construct($start, $end)
    {
        $this->start = new DateTimeImmutable($start);
        $this->end = new DateInterval("PT" . $end . "S");
    }

    /**
     * @return mixed
     */
    public function getCurrentDate()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getInterval()
    {
        return $this->end;
    }

    /**
     * @return DateTimeImmutable
     * @throws Exception
     */
    public function getDestinationDate()
    {
        $directionTime = (($this->start)->sub($this->end))->format('Y-m-d H:i:s');
        return new DateTimeImmutable($directionTime);
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getDateInterval()
    {
        return (($this->start)->diff($this->getDestinationDate()));
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getTravelInfo()
    {
        return $this->getDateInterval()->format('Il y a %Y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates.');
    }

    /**
     * @param DateInterval $interval
     * @return string
     */
    public function findDate(DateInterval $interval)
    {
        return "Date d'arrivée: " . (($this->start)->sub($interval))->format('dS M Y');
    }

    /**
     * @param DatePeriod $step
     * @return array
     */
    public function backToFutureStepByStep(DatePeriod $step)
    {
        $stopDates = [];
        foreach($step as $date){
            array_push($stopDates, $date->format('M d Y A h:i'));
        }
        return $stopDates;
    }

}
