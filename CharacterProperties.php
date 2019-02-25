<?php

class CharacterProperties {

    const HEALTH = 'health';
    const STRENGTH = 'strength';
    const DEFENCE = 'defence';
    const SPEED = 'speed';
    const LUCK = 'luck';
    const RAPID_STRIKE = 'rapid_strike';
    const MAGIC_SHIELD = 'magic_shield';

    const PROPERTIES = [self:: HEALTH, self:: STRENGTH, self:: DEFENCE, self:: SPEED, self:: LUCK, self:: RAPID_STRIKE, self:: MAGIC_SHIELD];

    const HERO_PROP = array(
        self:: HEALTH => array('min' => 70,
            'max' => 100,
        ),
        self:: STRENGTH => array('min' => 70,
            'max' => 80,
        ),
        self:: DEFENCE => array('min' => 45,
            'max' => 55,
        ),
        self:: SPEED => array('min' => 40,
            'max' => 50,
        ),
        self:: LUCK => array('min' => 10,
            'max' => 30,
        ),
        self::RAPID_STRIKE => array('min' => 10,
            'max' => 10,
        ),
        self::MAGIC_SHIELD => array('min' => 20,
            'max' => 20,
        ),
        );
    const ENEMY_PROP = array(
        self:: HEALTH => array(
            'min' => 60,
            'max' => 90,
        ),
        self:: STRENGTH => array(
            'min' => 60,
            'max' => 90,
        ),
        self:: DEFENCE => array(
            'min' => 40,
            'max' => 60,
        ),
        self:: SPEED  => array(
            'min' => 40,
            'max' => 60,
        ),
        self:: LUCK => array(
            'min' => 25,
            'max' => 40,
        ),
        self:: RAPID_STRIKE => array(
            'min' => 0,
            'max' => 0,
        ),
        self:: MAGIC_SHIELD => array(
            'min' => 0,
            'max' => 0,
        ),
        );

    public function getHeroProp()
    {
        return self::HERO_PROP;
    }

    public function getEnemyProp()
    {
        return self::ENEMY_PROP;
    }

    public function getHealth() {
        return self::HEALTH;
    }
    public function getStrength()
    {
        return self::STRENGTH;
    }

    public function getDefence()
    {
        return self::DEFENCE;
    }

    public function getSpeed()
    {
        return self::SPEED;
    }

    public function getLuck()
    {
        return self::LUCk;
    }

    public function getRapidStrike()
    {
        return self::RAPID_STRIKE;
    }

    public function getMagicShield()
    {
        return self::MAGIC_SHIELD;
    }      

    public function getProperties() {
        return self::PROPERTIES;
    }


}