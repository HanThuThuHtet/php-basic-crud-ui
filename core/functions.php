<?php

    //die and dump
    function dd($data,$showType = false):void{
        echo "<pre style=' background-color:#1d1d1d ; color:#cdcdcd; padding: 20px ; margin : 10px ; border-radius: 10px ; line-height: 1.2rem;'>";
        if($showType){
            var_dump($data);
        }else{
            print_r($data);
        }
        echo "</pre>";
        die();
    }

    function url(string $path = null): string{
        $url = isset($_SERVER["HTTPS"]) ? "https" : "http";
        $url .= "://";
        $url .= $_SERVER["HTTP_HOST"];
        if(isset($path)){
            $url .= "/";
            $url .= $path;
        }
        return $url;
    }


    function alert(string $message,string $color="success"):string{
        return "<div class=' alert alert-$color'>
                    $message
                </div>";
    }

    //dd(date("j M Y",strtotime('2023-04-13 11:54:20')));
    function showDate(string $timestamp,string $format ="j M Y" ,):string{
        return date($format,strtotime($timestamp));
    }


?>