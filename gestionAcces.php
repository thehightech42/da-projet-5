<?php

class Maintenance{
    private $_arrayIp;
    private $_status; 

    function __construct( $arrayIp, $status){

        $this->_arrayIp = $arrayIp;
        $this->_status = $status;
        $this->_autorisation = null; 

        if($status == true){
            $this->IpKnown($this->_arrayIp);
        }
        
    }

    private function IpKnown($arrayIp){

        for ($i = 0; $i < count($arrayIp); $i++ ){
            if($_SERVER['REMOTE_ADDR'] == $arrayIp[$i] ){
                $this->_autorisation = true;
                return true;
            }
        }
        $this->_autorisation = false;
        // $this->pageMaintenance();
    }

    public function pageMaintenance(){
        ?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Page de maintenance</title>
            </head>
            <body>
                <div>
                    <p>
                        <p>User IP Address - <?= $_SERVER['REMOTE_ADDR']; ?> </p> 
                        <p>Bonjour et bienvenue sur la page de maintenance de mon projet 5. </br> Le site est actuellement en cours de développement.
                        Si vous souhaitez avoir accès à la version de développement, merci de me faire parvenir votre addresse IP présente au dessus à "contact@antoninpfistner.fr". 
                        <br>
                        Revenez bientôt, le site devrais bientôt être fini !:)</p>
                    </p>
                </div>
            </body>
            </html>
        <?php
    }
    static function ipClient (){
        return $_SERVER['REMOTE_ADDR'];
    }

    public function getAutorisation(){
        return $this->_autorisation;
    }

}

// $ipAccepted = [
//     "82.65.197.173", //Antonin  
//     "2a01:e0a:2c5:1bd0:8839:e8e9:4898:6a17" //Antonin
//     ];
    
// function IpKnown($arrayIp){
//     for ($i = 0; $i < count($arrayIp); $i++ ){
//         if($_SERVER['REMOTE_ADDR'] == $arrayIp[$i] ){
//             return true;
//         }
//     }
//     return false;
// }

