<?php
namespace App\DataFixtures;
use App\Entity\Pokemon;
use App\Entity\Type;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
class PokemonsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // /!\ par défaut l'index commence à 0
        $pokemonsData = [
        //  [0,           1,   2,                3]
            ['Bulbizare', 50, Type::TYPE_PLANT, $this->getReference("Tranch'herb")],
            ['Salamèche', 50, Type::TYPE_FIRE, $this->getReference("Flammèche")],
            ['Carapuce', 50, Type::TYPE_WATER, $this->getReference("Pistolet à O")],
            ['Rattatac',15,Type::TYPE_NORMAL, $this->getReference("Charge")],
            ['Mélofée',65,Type::TYPE_FAIRY,$this->getReference("Rayon lune")]
        ];
        foreach($pokemonsData as $pokemonData) {
            $pokemon = new Pokemon();
            $pokemon
                ->setName($pokemonData[0]) // élément 0 du tableau
                ->setHealth($pokemonData[1])
                ->setType($pokemonData[2])
                // doit ajouter l'attaque du pokemon Rattac aux autres pokemons?
                ->addAttack($pokemonData[3])
            ;  
            //enregistre la donné
            $manager->persist($pokemon);
        }
        // commit oou envoie 
        $manager->flush();
    }
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}