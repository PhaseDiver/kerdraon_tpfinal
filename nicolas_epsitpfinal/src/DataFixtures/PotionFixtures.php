<?php
namespace App\DataFixtures;
use App\Entity\Potion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
class PotionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach($this->getPotion() as [$name,$maxcapacity,$hpregen,$isEmpty]) {
            $potion = new Potion();
            $potion
                ->setName($name)
                ->setMaxcapacity($maxcapacity)
                ->setHpregen(($hpregen)
                ->setIsEmpty($isEmpty)
            //attention au paranthèse très importante, j'avais une erreur à cause de ça
            )
            ;
            $manager->persist($potion);
            $reference = $this->addReference($name, $potion);
        }
        $manager->flush();
    }
    /**
     * Undocumented function
     *
     * @return array
     */
    private function getPotion(): array
    {
        return [
            // $potion = [$name, $maxcapacity, $hpregen,$isEmpty]
            ['Potion', 50,3,true],
            ['Super Potion ',100,8,false],
            ['Hyper Potion', 250,15,false]
            
        ];
    }
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}