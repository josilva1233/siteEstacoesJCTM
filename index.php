<?php
// includes PHP 
header('Content-Type: text/html; charset=utf-8');
include('conexao.php');
include('sessao.php');
include('title.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
            id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="main.css">

        <!--Sobre a tela de login, verifica se exite senha-->

        <script>
        function show() {
            var senha = document.getElementById("password");
            if (senha.type === "password") {
                senha.type = "text";
            } else {
                senha.type = "password";
            }
        }
        </script>

        <!--Pluqin LGPD-->

        <link rel="stylesheet" type="text/css"
            href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
        <script>
        window.addEventListener("load", function() {
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#000"
                    },
                    "button": {
                        "background": "#FFC601",
                        "text": "#000000",
                        "border": "#FFC601"
                    }
                },
                "position": "bottom-left",
                "content": {
                    "message": "Usamos cookies para garantir que você obtenha a melhor experiência no nosso site.",
                    "dismiss": "Aceito!",
                    "link": "Leia Mais, Sobre LGPD.",
                    "href": "http://www.planalto.gov.br/ccivil_03/_ato2015-2018/2018/lei/l13709.htm"
                }
            })
        });
        </script>
        <!--Pluqin LGPD final-->

    </head>

    <body id="estilo">
        <!-- Tela de Login-->
        <div class="container-fluid" id="login">
            <div class="container">
                <h1 class="text-center  pt-5">ACESSO AS ESTA&#199&#213ES</h1>
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="" method="post">
                                <h3 class="text-center ">Login</h3>
                                <div class="form-group">
                                    <label for="username" class="">User or Usu&#225rio:</label><br>
                                    <input type="text" name="nome" id="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="">Password or Senha:</label>
                                    <input type="password" name="senha" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="ENTRAR">
                                    exibir senha
                                    <input type="checkbox" onclick="show()">
                                </div>
                                <!-- Meu Modal-->
                                <!-- <a class="btn text-light" data-toggle="modal" data-target="#meuModal"
                                    href="http://"><span>Precisa de suporte? clique aqui!</span></a>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="meuModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Conteúdo do modal-->
                <div class="modal-content">
                    <!-- Cabeçalho do modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Abertura chamado Suporte TI JCTM</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Corpo do modal -->
                    <form action="suporte/index" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email or address</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Selecione o Usuario or
                                    User</label><br>
                                <select class="form-select" aria-label="Default select example" type="usuario"
                                    name="usuario" id="exampleFormControlInput1" placeholder="usuario">
                                    <option selected>ECQ001</option>
                                    <option>ECQ002</option>
                                    <option>ECQ003</option>
                                    <option>ECQ004</option>
                                    <option>ECQ005</option>
                                    <option>ECQ007</option>
                                    <option>SINFOMET</option>
                                </select>
                                <!--  <input type="usuario" name="usuario" class="form-control" id="exampleFormControlInput1" placeholder="usuario"> -->
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Digite sua
                                    solicita&#231;&#227;o</label>
                                <textarea name="msg" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <!-- Rodapé do modal-->
                        <div class="modal-footer">
                            <button class="btn btn-primary">Enviar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </body>
    <!-- Init code chat-milvus //-->
    <script
        src=https://chat.api.milvus.com.br/apichat/widget/script/a3c1408855/d1b220e92c32def5fcc0ebb34820160a42272a07b2733236c5923b8194a37c7714a282fe91bfee9b435e76433cf25ce9d1cb49fb7ff390f6766ef24a128bc41c5819f0167e94eef4d7019fabfb989e64999ad206d7d5d3650e7808e908fbf7a2b0656b67f3>
    </script>
    <!-- End code chat-milvus //-->

</html>