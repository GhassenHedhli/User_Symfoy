# User_Symfony

Les actions faites:
manipuler security.yaml
créer un entity = User
créer un controller = SecurityController
créer un Form = RegistrationType
Sur templates = login.html.twig / registration.html.twig

Les conditions du Sign Up:
Email doit etre unique c-à-d non exite dans la base de données
le Password doit contenir au minimum 8 caractères et le meme que ConfirmPassword
le ConfirmPassword doit etre le meme que Password

Sur la base de données:
security.yaml=Le Password est crypté par l'algorithme 'bcrypt'

Sur l'interface:
Si je fait Login sur le NavBar s'affiche Logout
Si je fait Logout sur le NavBar s'affiche Login
Pour faire le Sign Up Tapez l'@IP/inscription

Sur SecurityController:
J'ai des functions:
  function registration = pour Ajouter un utilisateur
  function login = pour faire la connexion
  function logout = (Voir security.yaml 'target:ListProd') pour faire la deconnexion
  function delete = pour supprimer utilisateur
  function user = pour lister les utilisateurs
  function detail = pour faire detailler chaque user et faire la supprission
  
  

Read:  security.yaml
       Form =RegistrationType
       Controller =SecurityController
       Entity =User
       templates = templates = login.html.twig / registration.html.twig

