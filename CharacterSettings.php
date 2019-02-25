<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'CharacterProperties.php';

class CharacterSettings
{
    private $settings;
    private $characterProperties;

    public function __construct( $type)
    {
        $this->characterProperties = new CharacterProperties();
        $properties = $this->characterProperties->getProperties();

        foreach( $properties as $value) {
            $this->settings[ $value] = $this->getInitialValue($type, $value);
        }
    }

    public function getInitialValue($characterType, $attribute) {

        switch($characterType) {
            case 'Hero':
                $ranges = $this->characterProperties->getHeroProp()[$attribute];
            break;
            case 'Enemy':
                $ranges = $this->characterProperties->getEnemyProp()[$attribute];
            break;
            default:
            break;
        }

       return $this->setvalue($ranges);
    }

    public function setSetting($setting, $value) {
        $this->settings[$setting] = $value;
    }

    public function getSetting($setting)
    {
        return $this->settings[$setting];
    }

    private function setvalue($ranges){

        return rand($ranges['min'], $ranges['max']);

    }
    
}