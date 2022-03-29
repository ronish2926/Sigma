<?php

require_once(CONTROLLER.'/AbstractFactory.php');
require_once(OBJECT.'/DataObject.php');
require_once(PANEL.'/General.php');
require_once(PANEL.'/AllCountries.php');
require_once(PANEL.'/AllPaymentMethod.php');
require_once(PANEL.'/AllCities.php');
require_once(PANEL.'/RideCategory.php');
require_once(PANEL.'/AllReports.php');
require_once(PANEL.'/AllRideTypes.php');
require_once(PANEL.'/AllCaptains.php');
require_once(PANEL.'/SpecificCaptainDetail.php');
require_once(PANEL.'/AllRides.php');
require_once(PANEL.'/OverView.php');
require_once(PANEL.'/Request.php');
require_once(PANEL.'/AllCoupon.php');
require_once(PANEL.'/AllUser.php');
require_once(DRIVER.'/DriverDetail.php');
require_once(DRIVER.'/DriverRides.php');
require_once(DRIVER.'/DriverProfile.php');




class PanelActionFactory extends AbstractFactory
{


    function __construct(DataObject $dtObject)
    {
        parent::__construct($dtObject);

    }



    /**
     * <p>Used to get specific functionality model for performing function</p>
     * @return AllCities|AllCountries|AllPaymentMethod|AllRideTypes|RideCategory|SpecificCountryPaymentMethod|string
     */
    public function getFactoryObject()
    {

        $queryAction = "";
        if (parent::getType() == "city") {

            $queryAction = new AllCities(parent::getDtObject());

        } else if (parent::getType() == "country") {

            $queryAction = new AllCountries(parent::getDtObject());

        } else if (parent::getType() == "payment_method") {

            $queryAction = new AllPaymentMethod(parent::getDtObject());

        } else if (parent::getType() == "ride_type") {

            $queryAction = new AllRideTypes(parent::getDtObject());

        } else if (parent::getType() == "ride_category") {

            $queryAction = new RideCategory(parent::getDtObject());

        } else if (parent::getType() == "specific_country_payment_method") {

            $queryAction = new SpecificCountryPaymentMethod(parent::getDtObject());

        } else if (parent::getType() == "captains") {

            $queryAction = new AllCaptains(parent::getDtObject());

        } else if (parent::getType() == "specific_captain") {

            $queryAction = new SpecificCaptainDetail(parent::getDtObject());

        } else if (parent::getType() == "all_rides") {

            $queryAction = new AllRides(parent::getDtObject());

        } else if (parent::getType() == "all_reports") {

            $queryAction = new AllReports(parent::getDtObject());

        }
        else if (parent::getType() == "overview") {

            $queryAction = new OverView(parent::getDtObject());

        }
        else if (parent::getType() == "request") {

            $queryAction = new Request(parent::getDtObject());

        }
        else if (parent::getType() == "driver_detail") {

            $queryAction = new DriverDetail(parent::getDtObject());

        }
        else if (parent::getType() == "driver_rides") {

            $queryAction = new DriverRides(parent::getDtObject());

        }
        else if (parent::getType() == "driver_profile") {

            $queryAction = new DriverProfile(parent::getDtObject());

        }
        else if (parent::getType() == "all_coupon") {

            $queryAction = new AllCoupon(parent::getDtObject());
        
        }
        else if (parent::getType() == "all_user") {

            $queryAction = new AllUser(parent::getDtObject());

        }

        return $queryAction;

    }


}


?>