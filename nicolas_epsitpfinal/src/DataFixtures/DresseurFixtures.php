<?php
namespace App\DataFixtures;
use App\Entity\Dresseur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class DresseurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach($this->getDresseurData() as [$username, $roles, $pwd]) {
            $dresseur = new Dresseur();
            //chiffre le pot de mot de passe pour qu'il soit pas en clair dans la bdd 
            $chiffrepwd= $this->encoder->encodePassword($dresseur,$pwd);
            $dresseur 
                ->setUsername($username)
                ->setRoles($roles)
                ->setPwd($pwd) 
            ;
            $manager->persist($dresseur);
        
        }
        $manager->flush();
    }
    /**
     * Undocumented function
     *
     * @return array
     */
    private function getDresseurData(): array
    {
        return [
            // DresseurkData = [$username, $roles, $pwd]
           ['admin','ROLE_ADMIN','admin'],
           ['sacha','ROLE_USER','loveOndine']
        ];
    }
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}