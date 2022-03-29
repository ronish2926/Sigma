<?php


class Constant
{
    protected $success_code = "202";
    protected $unknown_code = "204";
    protected $error_code = "206";
    protected $base_url_images = "../public/uploads/";

    protected $paymentimages;
    protected $ridetype;
    protected $captainpic;
    protected $featured_banner_images;
    protected $driver_detail_pic;


    function __construct()
    {

        $this->paymentimages = $this->base_url_images ."payment/";
        $this->ridetype = $this->base_url_images . "Ridetype/";
        $this->captainpic = $this->base_url_images . "captainpic/";
        $this->featured_banner_images = $this->base_url_images . "featured_banner_image/";
        $this->driver_detail_pic = $this->base_url_images . "driver_detail_pic/";

    }


    /**
     * Get the value of success_code
     */
    public function getSuccess_code()
    {
        return $this->success_code;
    }

    /**
     * Set the value of success_code
     *
     * @return  self
     */
    public function setSuccess_code($success_code)
    {
        $this->success_code = $success_code;

        return $this;
    }

    /**
     * Get the value of unknown_code
     */
    public function getUnknown_code()
    {
        return $this->unknown_code;
    }

    /**
     * Set the value of unknown_code
     *
     * @return  self
     */
    public function setUnknown_code($unknown_code)
    {
        $this->unknown_code = $unknown_code;

        return $this;
    }

    /**
     * Get the value of error_code
     */
    public function getError_code()
    {
        return $this->error_code;
    }

    /**
     * Set the value of error_code
     *
     * @return  self
     */
    public function setError_code($error_code)
    {
        $this->error_code = $error_code;

        return $this;
    }


}


?>