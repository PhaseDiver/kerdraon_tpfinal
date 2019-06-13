<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
{
    #On déclare les types des pokemons avec des constantes
    const TYPE_FIRE = 1;
    const TYPE_PLANT = 2;
    const TYPE_WATER = 3;
    const TYPE_NORMAL= 4;
    const TYPE_FAIRY = 5;
    const TYPE_FIGHT = 6;
      public function getType($type) 
    {
        switch ($type)
        {
            case self::TYPE_FIRE:
                return "Feu";
                break;
            case self::TYPE_WATER:
                return "Eau";
                break;
            case self::TYPE_PLANT:
                return "Plante";
                break;
            case self::TYPE_NORMAL:
                return "Normal";
                break;
             case self::TYPE_FAIRY:
                return "Fée";
                break;
              case self::TYPE_FIGHT:
                return "Combat";
                break;     
            default:
                return false;
                break;
    

        }
    }
      #les atttaque  de ce type feront la motié des degats contre la cible
      /**
     * @param $type
     * @param $type_atk
     * @return bool
     */
     public function isTypeWeakAgainst($type, $type_atk)
    {
        if($type === self::TYPE_FIRE){
            return (self::TYPE_WATER === $type_atk) ? true : false;
        }
        elseif($type === self::TYPE_WATER){
            return (self::TYPE_PLANT === $type_atk) ? true : false;
        }
        elseif($type === self::TYPE_PLANT){
            return (self::TYPE_FIRE === $type_atk) ? true : false;
        }

         elseif($type === self::TYPE_FIGHT){
            return (self::TYPE_FAIRY === $type_atk) ? true : false;
        }   
            return false;
    }
   #les attaque inflige le double des degeats contre la cible
    /**
     * @param $type
     * @param $type_atk
     * @return bool
     */
   public function isTypeStrongAgainst($type, $type_atk)
    {
         switch($type)
         {   
            case self::TYPE_FIRE:
                return self::TYPE_PLANT === $type_atk ? true : false;
                break;
            case self::TYPE_WATER:
                return (self::TYPE_FIRE === $type_atk) ? true : false;
                break;
            case self::TYPE_PLANT:
                return (self::TYPE_WATER === $type_atk) ? true : false;
                break;
           case self::TYPE_FAIRY:
                return (self::TYPE_FIGHT === $type_atk) ? true : false;
                break;
            default:
                return false;
                //on pourrait retourner le type normal? si il y'a aucune modificateur de degat?
                break;
        }
    }
#bandage pour fixer erreur du a l'abasence d'id     
/**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO")
 */
protected $id;
}