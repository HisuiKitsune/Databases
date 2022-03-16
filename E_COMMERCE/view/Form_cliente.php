<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Formulário HTML</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/fEstilo.css">
</head>
<body>  
<?php include_once("../php/Navbar-menu.php"); ?>
        <!-- Cabeçalho com título e subtítulo (ambos com css de id "titulo") -->
        <div>
            <h1 id="titulo">Faça Login</h1>
            <br>
        </div>

        <!-- Início do formulário -->
        <form>

            <fieldset class="grupo">
                <!-- Campo do nome com legenda "nome" e css de classe "campo" -->
                <div class="campo">
                    <label for="nome"><strong>Nome</strong></label>
                    <input type="text" name="nome" id="nome" required>
                </div>

                <!-- Campo do sobrenome com legenda "sobrenome" e css de classe "campo" -->
                <div class="campo">
                    <label for="sobrenome"><strong>Sobrenome</strong></label>
                    <input type="text" name="sobrenome" id="sobrenome" required>
                </div>
            </fieldset> 
        
		<fieldset class="grupo">
            <!-- Campo de email com-->
            <div class="campo">
                <label for="email"><strong>Email</strong></label>
                <input type="email" name="email" id="email" required>
            </div>
			
			<!-- Campo de CPF com-->
			 <div class="campo">
                <label for="email"><strong>CPF</strong></label>
                <input type="email" name="cpf" id="cpf" required>
            </div>
		</fieldset> 
			
		 <fieldset class="grupo">
		     <!-- Campo de CEP com-->
			 <div class="campo">
                <label for="email"><strong>CEP</strong></label>
                <input type="email" name="CEP" id="CEP" required>
            </div>
			
		     <!-- Campo de LGR com-->	
			 <div class="campo">
                <label for="email"><strong>LGR</strong></label>
                <input type="email" name="LGR" id="LGR" required>
            </div>
         </fieldset> 
		 
            <!-- Selecione seu Bairro com multiplas opções para escolha (select option) e css de classe "campo" -->
            <div class="campo">
                <label for="senioridade"><strong>Bairro</strong></label>
                <select id="senioridade" required>
                  <option selected disabled value="">Selecione</option>
				  <option>Bangu</option>
                  <option>Campo Grande</option>
                  <option>Irajá</option>
				  <option>Vila Kennedy</option>
                  <option>Recreio</option>
                  <option>Inhaúma</option>
				  <option>Jacarepagua</option>
                  <option>Leblon</option>
                  <option>Ipanema</option>
				  <option>Copacabana</option>
                  <option>Flamengo</option>
                  <option>Outro</option>
                </select>
            </div>

            <!-- Botão para enviar o formulário -->
            <button class="botao" type="submit" onsubmit="">Concluído</button>            

        </form>

    </body>

</html>
</html>