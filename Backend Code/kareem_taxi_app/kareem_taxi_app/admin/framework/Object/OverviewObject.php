<?php


class OverviewObject
{

    public $yearlyEarningStats = [];
    public $yearlyPaymentMethodStats = [];
    public $yearlyRideCategoriesStats = [];
    public $yearlyMonthlyEarningStats = [];
    public $yearlyWeeklyEarningStats = [];
    public $yearlyCountryEarningStats = [];
    public $yearTopRegionEarningStats = [];
    public $yearCompleteEarningStats = [];
    public $yearCancelEarningStats = [];
    public $yearRidesEarningstats = [];
    public $yearEarning = [];
    public $yearEarningpast = [];
    public $yearnoRides = [];
    public $yearNoOfCaptain = [];
    public $yearNoOfUsers = [];

    /**
     * @return array
     */
    public function getYearNoOfUsers()
    {
        return $this->yearNoOfUsers;
    }

    /**
     * @param array $yearNoOfUsers
     */
    public function setYearNoOfUsers($yearNoOfUsers)
    {
        $this->yearNoOfUsers = $yearNoOfUsers;
    }

    /**
     * @return array
     */
    public function getYearNoOfUserspast()
    {
        return $this->yearNoOfUserspast;
    }

    /**
     * @param array $yearNoOfUserspast
     */
    public function setYearNoOfUserspast($yearNoOfUserspast)
    {
        $this->yearNoOfUserspast = $yearNoOfUserspast;
    }
    public $yearNoOfUserspast = [];

    /**
     * @return array
     */
    public function getYearNoOfCaptain()
    {
        return $this->yearNoOfCaptain;
    }

    /**
     * @param array $yearNoOfCaptain
     */
    public function setYearNoOfCaptain($yearNoOfCaptain)
    {
        $this->yearNoOfCaptain = $yearNoOfCaptain;
    }

    /**
     * @return array
     */
    public function getYearNoOfCaptainpast()
    {
        return $this->yearNoOfCaptainpast;
    }

    /**
     * @param array $yearNoOfCaptainpast
     */
    public function setYearNoOfCaptainpast($yearNoOfCaptainpast)
    {
        $this->yearNoOfCaptainpast = $yearNoOfCaptainpast;
    }
    public $yearNoOfCaptainpast = [];

    /**
     * @return array
     */
    public function getYearnoRides()
    {
        return $this->yearnoRides;
    }

    /**
     * @param array $yearnoRides
     */
    public function setYearnoRides($yearnoRides)
    {
        $this->yearnoRides = $yearnoRides;
    }

    /**
     * @return array
     */
    public function getYearnoRidespast()
    {
        return $this->yearnoRidespast;
    }

    /**
     * @param array $yearnoRidespast
     */
    public function setYearnoRidespast($yearnoRidespast)
    {
        $this->yearnoRidespast = $yearnoRidespast;
    }
    public $yearnoRidespast = [];

    /**
     * @return array
     */
    public function getYearEarning()
    {
        return $this->yearEarning;
    }

    /**
     * @param array $yearEarning
     */
    public function setYearEarning($yearEarning)
    {
        $this->yearEarning = $yearEarning;
    }

    /**
     * @return array
     */
    public function getYearEarningpast()
    {
        return $this->yearEarningpast;
    }

    /**
     * @param array $yearEarningpast
     */
    public function setYearEarningpast($yearEarningpast)
    {
        $this->yearEarningpast = $yearEarningpast;
    }

    /**
     * @return array
     */
    public function getYearRidesEarningstats()
    {
        return $this->yearRidesEarningstats;
    }

    /**
     * @param array $yearRidesEarningstats
     */
    public function setYearRidesEarningstats($yearRidesEarningstats)
    {
        $this->yearRidesEarningstats = $yearRidesEarningstats;
    }



    /**
     * @return array
     */
    public function getYearCancelEarningStats()
    {
        return $this->yearCancelEarningStats;
    }

    /**
     * @param array $yearCancelEarningStats
     */
    public function setYearCancelEarningStats($yearCancelEarningStats)
    {
        $this->yearCancelEarningStats = $yearCancelEarningStats;
    }

    /**
     * @return array
     */
    public function getYearCompleteEarningStats()
    {
        return $this->yearCompleteEarningStats;
    }

    /**
     * @param array $yearCompleteEarningStats
     */
    public function setYearCompleteEarningStats($yearCompleteEarningStats)
    {
        $this->yearCompleteEarningStats = $yearCompleteEarningStats;
    }
    /**
     * @return array
     */
    public function getYearlyEarningStats()
    {
        return $this->yearlyEarningStats;
    }

    /**
     * @param array $yearlyEarningStats
     */
    public function setYearlyEarningStats($yearlyEarningStats)
    {
        $this->yearlyEarningStats = $yearlyEarningStats;
    }

    /**
     * @return array
     */
    public function getYearlyPaymentMethodStats()
    {
        return $this->yearlyPaymentMethodStats;
    }

    /**
     * @param array $yearlyPaymentMethodStats
     */
    public function setYearlyPaymentMethodStats($yearlyPaymentMethodStats)
    {
        $this->yearlyPaymentMethodStats = $yearlyPaymentMethodStats;
    }

    /**
     * @return array
     */
    public function getYearlyRideCategoriesStats()
    {
        return $this->yearlyRideCategoriesStats;
    }

    /**
     * @param array $yearlyRideCategoriesStats
     */
    public function setYearlyRideCategoriesStats($yearlyRideCategoriesStats)
    {
        $this->yearlyRideCategoriesStats = $yearlyRideCategoriesStats;
    }

    /**
     * @return array
     */
    public function getYearlyMonthlyEarningStats()
    {
        return $this->yearlyMonthlyEarningStats;
    }

    /**
     * @param array $yearlyMonthlyEarningStats
     */
    public function setYearlyMonthlyEarningStats($yearlyMonthlyEarningStats)
    {
        $this->yearlyMonthlyEarningStats = $yearlyMonthlyEarningStats;
    }

    /**
     * @return array
     */
    public function getYearlyWeeklyEarningStats()
    {
        return $this->yearlyWeeklyEarningStats;
    }

    /**
     * @param array $yearlyWeeklyEarningStats
     */
    public function setYearlyWeeklyEarningStats($yearlyWeeklyEarningStats)
    {
        $this->yearlyWeeklyEarningStats = $yearlyWeeklyEarningStats;
    }

    /**
     * @return array
     */
    public function getYearlyCountryEarningStats()
    {
        return $this->yearlyCountryEarningStats;
    }

    /**
     * @param array $yearlyCountryEarningStats
     */
    public function setYearlyCountryEarningStats($yearlyCountryEarningStats)
    {
        $this->yearlyCountryEarningStats = $yearlyCountryEarningStats;
    }

    /**
     * @return array
     */
    public function getYearTopRegionEarningStats()
    {
        return $this->yearTopRegionEarningStats;
    }

    /**
     * @param array $yearTopRegionEarningStats
     */
    public function setYearTopRegionEarningStats($yearTopRegionEarningStats)
    {
        $this->yearTopRegionEarningStats = $yearTopRegionEarningStats;
    }














}