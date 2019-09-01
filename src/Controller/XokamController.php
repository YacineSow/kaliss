<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Compte;
use App\Entity\Profil;
use App\Entity\Partenaire;
use App\Repository\UserRepository;
use App\Repository\CompteRepository;
use App\Repository\ProfilRepository;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/api")
 */

class XokamController extends AbstractController
{
    /**
     * @Route("/xokam", name="xokam")
     */
    public function index()
    {
        return $this->render('xokam/index.html.twig', [
            'controller_name' => 'XokamController',
        ]);
    }

     /**
     * @Route("/register", name="register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $values = json_decode($request->getContent());
        if(isset($values->username,$values->password)) {
            $user = new User();
            $user->setUsername($values->username);
            $user->setPassword($passwordEncoder->encodePassword($user, $values->password));
            $user->setPrenom($values->prenom);
            $user->setNom($values->nom);
            $user->setMail($values->mail);
            $user->setTelephone($values->telephone);
            $user->setAdresse($values->adresse);
            $user->setCni($values->cni);
            $user->setStatut($values->statut);
             
            $repo=$this->getDoctrine()->getRepository(Partenaire::class);
            $partenaires=$repo->find($values->partenaire);
            $user->setPartenaire($partenaires);
            
            $repos=$this->getDoctrine()->getRepository(Profil::class);
            $profils=$repos->find($values->profil);
            $user->setProfil($profils);
            $role=[];
            if($profils->getLibelle() == "admin"){
              $role=["ROLE_ADMIN"];  
            }
            elseif($profils->getLibelle() == "caissiere"){
                $role=["ROLE_CAISSIERE"];
            }
            elseif($profils->getLibelle() == "user"){
                $role=["ROLE_USER"];
            }
            $user->setRoles($role);

            $repos=$this->getDoctrine()->getRepository(Compte::class);
            $compte=$repos->find($values->compte);
            $user->setCompte($compte);

            $errors = $validator->validate($user);
            if(count($errors)) {
                $errors = $serializer->serialize($errors, 'json');
                return new Response($errors, 500, [
                    'Content-Type' => 'application/json'
                ]);
            }
            $entityManager->persist($user);
            $entityManager->flush();

            $data = [
                'stat' => 201,
                'mess' => 'L\'utilisateur a été créé'
            ];

            return new JsonResponse($data, 201);
        }
        $data = [
            'statu' => 500,
            'messag' => 'Vous devez renseigner les clés username et password'
        ];
        return new JsonResponse($data, 500);
    }

    /**
     * @Route("/addpartuser", name="add", methods={"POST"})
     */

   
     public function addpartuser(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator){
        $random=random_int(100000,999999);
        $values = json_decode($request->getContent());
    

        $part = new Partenaire();
        $part->setEntreprise($values->entreprise);
        $part->setRaisonsocial($values->raisonsocial);
        $part->setNinea($values->ninea);
        $part->setAdresse($values->adresse1);
        $part->setStatut($values->statut1);

        $user = new User();

        $user->setUsername($values->username);
        $user->setPassword($passwordEncoder->encodePassword($user, $values->password));
        $user->setPrenom($values->prenom);
        $user->setNom($values->nom);
        $user->setMail($values->mail);
        $user->setTelephone($values->telephone);
        $user->setAdresse($values->adresse);
        $user->setCni($values->cni);
        $user->setStatut($values->statut);
        //$user->setRoles(['ROLE_ADMIN']);
        $user->setPartenaire($part);

        $repos=$this->getDoctrine()->getRepository(Profil::class);
        $profils=$repos->find($values->profil);
        $user->setProfil($profils);

        $role=[];
        if($profils->getLibelle() == "admin"){
          $role=["ROLE_ADMIN"];  
        }
        $user->setRoles($role);

        $compte = new Compte();

        $compte->setNumcompte($random);
        $compte->setSolde($values->solde);

        $compte->setPartenaire($part);
        $entityManager->persist($user);
        $entityManager->persist($part);
        $entityManager->persist($compte);
        $entityManager->flush();

        $entityManager = $this->getDoctrine()->getManager();

        $data = [
            'statu' => 201,
            'messag' => 'L\'utilisateur a été créé'
        ];

        return new JsonResponse($data, 201);
    }
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
      $this->encoder = $encoder;
    }

    /**
     * @Route("/login_check", name="login", methods={"POST"})
     * @param JWTEncoderInterface $JWTEncoder
     * @throws \Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException
     */
    public function login(Request $request, JWTEncoderInterface  $JWTEncoder)
    { 
   
       $values = json_decode($request->getContent());
        $username   = $values->username;
        $password   = $values->password;
        

            $repo = $this->getDoctrine()->getRepository(User::class);
            $user = $repo-> findOneBy(['username' => $username]);
            if(!$user){
                return $this->json([
                        'messag' => 'Username incorrect'
                    ]);
            }

            $isValid = $this->encoder
            ->isPasswordValid($user, $password);
            if(!$isValid){ 
                return $this->json([
                    'messag' => 'Mot de passe incorect'
                ]);
            }
            if($user->getStatut()!=null && $user->getStatut()=="bloquer"){
                return $this->json([
                    'messag' => 'ACCÈS REFUSÉ vous ne pouvez pas connecter !'
                ]);
            }
            $token = $JWTEncoder->encode([
                'username' => $user->getUsername(),
                'exp' => time() + 86400 // 1 day expiration
            ]);

            return $this->json([
                'token' => $token
            ]);
                
    }

    /**
     * @Route("/profil", name="profil", methods={"POST"})
     */
    public function addprofil(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $profils = $serializer->deserialize($request->getContent(), Profil::class, 'json');
        $entityManager->persist($profils);

        $entityManager->flush();
        $data = [
            'status1' => 201,
            'message1' => 'Le Profil a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }

    /**
     * @Route("/compte", name="compte", methods={"POST"})
     */
    public function addcompte(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $compte = new Compte();
        $random=random_int(100000,999999);
        $values = json_decode($request->getContent());
        $compte->setNumcompte($random);
        $compte->setSolde($values->solde);

        $repo=$this->getDoctrine()->getRepository(Partenaire::class);
        $partenaires=$repo->find($values->partenaire);
        $compte->setPartenaire($partenaires);

        $entityManager->persist($compte);

        $entityManager->flush();
        $data = [
            'statu' => 201,
            'messag' => 'Le compte a bien été ajouté'
        ];
        return new JsonResponse($data, 201);
    }

     /**
     * @Route("/users/bloquer", name="userBlock", methods={"GET","POST"})
     * @Route("/users/debloquer", name="userDeblock", methods={"GET","POST"})
     */

    public function userBloquer(Request $request, UserRepository $userRepo,EntityManagerInterface $entityManager): Response
    {
        $values = json_decode($request->getContent());
        $user=$userRepo->findOneByUsername($values->username);
        
        echo $user->getStatut();

        if($user->getStatut()=="bloquer"){
            $user->setStatut("debloquer");
            $entityManager->flush();
            $data = [
                'status' => 200,
                'message' => 'utilisateur a été débloqué'
            ];
            return new JsonResponse($data);
        }
        
        else{
            $user->setStatut("bloquer");
            $entityManager->flush();
            $data = [
                'status' => 200,
                'message' => 'utilisateur a été bloqué'
            ];
            return new JsonResponse($data);
        }
    }

    
}

