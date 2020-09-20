<?php
    class Login extends Controller{
        public function __construct(){
            $this->modelUser = $this->model('Usuario');
        }

        public function index(){
            $this->view(get_class($this).'/index');
        }

        public function login(){
            session_start();
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $dataUser = $this->modelUser->login($user);
            
            if(password_verify($pass,$dataUser->pass)){
                $_SESSION['usuario']['nombre'] = $dataUser->nameUser;
                $_SESSION['usuario']['idUsuario'] = $dataUser->idUsuario;
                $_SESSION['usuario']['tipo'] = $dataUser->idTipoUsuario;
                $_SESSION['usuario']['idEmpresa'] = $dataUser->idEmpresa;
                if($dataUser->idEmpresa!=NULL){
                    $dataEmpresa = $this->modelUser->getEmpresa($dataUser->idEmpresa);
                    $_SESSION['usuario']['nombreEmpresa'] = $dataEmpresa->razonSocial;
                    $_SESSION['usuario']['rucEmpresa'] = $dataEmpresa->ruc;
                    $_SESSION['usuario']['logo'] = $dataEmpresa->imagen;
                }
                unset($_SESSION['ERRORS']);
                if($dataUser->idTipoUsuario == 1)
                    header("location:../Home");
                else if($dataUser->idTipoUsuario == 2 || $dataUser->idTipoUsuario == 3)
                    header("location:../Home/indexcompany");
                else if($dataUser->idTipoUsuario == 4)
                    header("location:../Inicio");
            }
            else{
                $_SESSION['ERRORS'] = 'Usuario o Contraseña incorrecta';
                header("location:../Login");
            }
        }

        public function logout(){
            session_start();
            unset($_SESSION['usuario']);
            session_destroy();
            header("location:../Login");
        }

        public function logoutPublic(){
            session_start();
            unset($_SESSION['usuario']);
            session_destroy();
            header("location:../Inicio");
        }

    }